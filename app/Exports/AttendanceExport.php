<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Maatwebsite\Excel\Concerns\{
    FromArray,
    WithHeadings,
    WithStyles
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AttendanceExport implements FromArray, WithHeadings, WithStyles
{
    protected $divisionId;
    protected $shift;
    protected $startDate;
    protected $endDate;
    protected $dates;

    public function __construct($divisionId, $shift, $startDate, $endDate)
    {
        $this->divisionId = $divisionId;
        $this->shift      = $shift;
        $this->startDate  = Carbon::parse($startDate);
        $this->endDate    = Carbon::parse($endDate);
        $this->dates      = CarbonPeriod::create($this->startDate, $this->endDate);
    }

    public function headings(): array
    {
        $headers = ['Nama', 'ID Number'];

        foreach ($this->dates as $date) {
            $headers[] = $date->format('d-m-Y');
        }

        $headers[] = 'Total Masuk';
        $headers[] = 'Total Absen';

        return $headers;
    }

    public function array(): array
    {
        $rows = [];

        $employees = Employee::query();

        // filter division
        if ($this->divisionId !== 'all_division') {
            $employees->where('division_id', $this->divisionId);
        }

        // filter shift
        if ($this->shift !== 'all_shift') {
            $employees->where('shift', $this->shift);
        }

        $employees = $employees->get();

        $totalDays = iterator_count(CarbonPeriod::create($this->startDate, $this->endDate));

        foreach ($employees as $employee) {

            $row = [
                $employee->name,
                $employee->id_number,
            ];

            $totalMasuk = 0;

            foreach ($this->dates as $date) {

                $hadir = Attendance::where('employee_id', $employee->id)
                    ->whereDate('check_in', $date->toDateString())
                    ->exists();

                if ($hadir) {
                    $row[] = 'Hadir';
                    $totalMasuk++;
                } else {
                    $row[] = '-';
                }
            }

            $row[] = $totalMasuk;
            $row[] = $totalDays - $totalMasuk;

            $rows[] = $row;
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $dateStartCol = 3;
        $dateEndCol   = $dateStartCol + count(iterator_to_array($this->dates)) - 1;
        $rowMax       = $sheet->getHighestRow();

        for ($row = 2; $row <= $rowMax; $row++) {
            for ($col = $dateStartCol; $col <= $dateEndCol; $col++) {

                $value = $sheet->getCellByColumnAndRow($col, $row)->getValue();

                $sheet->getStyleByColumnAndRow($col, $row)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => $value !== '-' ? 'C6EFCE' : 'FFC7CE'
                        ]
                    ]
                ]);
            }
        }

        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')
            ->getFont()
            ->setBold(true);
    }
}
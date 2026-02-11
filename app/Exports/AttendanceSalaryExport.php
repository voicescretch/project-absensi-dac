<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Wage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Maatwebsite\Excel\Concerns\{
    FromArray,
    WithHeadings,
    WithStyles
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AttendanceSalaryExport implements FromArray, WithHeadings, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $dates;
    protected $useWages;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = Carbon::parse($startDate);
        $this->endDate   = Carbon::parse($endDate);
        $this->dates     = CarbonPeriod::create($this->startDate, $this->endDate);

        // cek sekali saja
        $this->useWages = Wage::exists();
    }

    public function headings(): array
    {
        $headers = ['Nama', 'ID Number'];

        foreach ($this->dates as $date) {
            $headers[] = $date->format('d-m-Y');
        }

        $headers[] = 'Total Masuk';
        $headers[] = 'Total Absen';

        if ($this->useWages) {
            $headers[] = 'Rata-rata Jam Kerja';
            $headers[] = 'Rata-rata Upah / Jam';
            $headers[] = 'Total Gaji';
        }

        return $headers;
    }

    public function array(): array
    {
        $rows      = [];
        $employees = Employee::all();
        $totalDays = iterator_count(CarbonPeriod::create($this->startDate, $this->endDate));

        foreach ($employees as $employee) {

            $row = [
                $employee->name,
                $employee->id_number,
            ];

            $totalMasuk    = 0;
            $totalHoursSum = 0;
            $hourlyRates   = [];

            // ambil wages sekali per employee
            $wages = collect();

            if ($this->useWages) {
                $wages = Wage::where('employee_id', $employee->id)
                    ->whereBetween('date', [$this->startDate, $this->endDate])
                    ->get()
                    ->keyBy(fn($w) => Carbon::parse($w->date)->toDateString());
            }

            foreach ($this->dates as $date) {

                $dateKey = $date->toDateString();

                $hadir = Attendance::where('employee_id', $employee->id)
                    ->whereDate('check_in', $dateKey)
                    ->exists();

                if (!$hadir) {
                    $row[] = '-';
                    continue;
                }

                $totalMasuk++;

                if ($this->useWages && isset($wages[$dateKey])) {
                    $jam  = $wages[$dateKey]->total_hours;
                    $rate = $wages[$dateKey]->hourly_wage;

                    $totalHoursSum += $jam;
                    $hourlyRates[] = $rate;

                    $row[] = "{$jam}j / " . number_format($rate);
                } else {
                    $row[] = 'Hadir';
                }
            }

            $totalAbsen = $totalDays - $totalMasuk;

            $row[] = $totalMasuk;
            $row[] = $totalAbsen;

            if ($this->useWages) {

                $avgHours = $totalMasuk > 0
                    ? round($totalHoursSum / $totalMasuk, 2)
                    : 0;

                $avgHourly = count($hourlyRates) > 0
                    ? round(array_sum($hourlyRates) / count($hourlyRates))
                    : 0;

                $totalGaji = Wage::where('employee_id', $employee->id)
                    ->whereBetween('date', [$this->startDate, $this->endDate])
                    ->sum('calculated_wages');

                $row[] = $avgHours;
                $row[] = $avgHourly;
                $row[] = $totalGaji;
            }

            $rows[] = $row;
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $dateStartCol = 3;
        $dateEndCol   = $dateStartCol + count(iterator_to_array($this->dates)) - 1;
        $rowMax       = $sheet->getHighestRow();

        // warna presensi
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

        // bold header
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')
            ->getFont()
            ->setBold(true);
    }
}
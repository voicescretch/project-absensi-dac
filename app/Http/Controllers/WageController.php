<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wage;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WageController extends Controller
{
    //
    public function index()
    {
        $title = 'Gaji Karyawan';
        $wages = Wage::with(['employee', 'user'])->paginate(20);

        return view('kiosk.index-wage', compact(['title', 'wages']));
    }

    public function create()
    {
        $title = 'Hitung Gaji Karyawan';
        $divisions = Division::where('name', '<>', 'Kiosk')->orderBy('name')->get();

        return view('kiosk.create-wages', compact(['divisions', 'title']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'shift'       => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
            'max_hours'   => 'required|numeric|min:1',
            'hourly_wage' => 'required|numeric|min:1',
        ], [
            'division_id.required' => 'Divisi tidak boleh kosong',
            'shift.required'       => 'Shift tidak boleh kosong',
            'start_date.required'  => 'Tanggal awal tidak boleh kosong',
            'end_date.required'    => 'Tanggal akhir tidak boleh kosong',
            'max_hours.required'   => 'Jam kerja tidak boleh kosong',
            'max_hours.numeric'    => 'Jam kerja harus angka',
            'max_hours.min'        => 'Jam kerja minimal 1 jam',
            'hourly_wage.required' => 'Gaji per jam tidak boleh kosong',
            'hourly_wage.numeric'  => 'Gaji per jam harus angka',
            'hourly_wage.min'      => 'Gaji per jam minimal 1',
        ]);

        // Konversi tanggal
        $startDate = Carbon::createFromFormat('d F Y', $request->start_date)->startOfDay();
        $endDate   = Carbon::createFromFormat('d F Y', $request->end_date)->endOfDay();

        // Query employee
        $employees = Employee::query();

        if ($request->division_id === 'all_division') {
            $employees->whereHas('division', function ($q) {
                $q->where('name', '<>', 'Kiosk');
            });
        } else {
            $employees->where('division_id', $request->division_id);
        }

        if (in_array($request->shift, ['pagi', 'malam'])) {
            $employees->where('shift', $request->shift);
        }

        $employees = $employees->get();

        // Loop employee
        foreach ($employees as $employee) {

            $attendances = Attendance::where('employee_id', $employee->id)
                ->whereBetween('check_in', [$startDate, $endDate])
                ->whereNotNull('check_out')
                ->get();

            foreach ($attendances as $attendance) {

                $checkIn  = Carbon::parse($attendance->check_in);
                $checkOut = Carbon::parse($attendance->check_out);

                // VALIDASI ANTI ERROR DATA
                if ($checkOut->lessThanOrEqualTo($checkIn)) {
                    continue; // skip data rusak
                }

                // Hitung menit & jam kerja
                $minutes = $checkOut->diffInMinutes($checkIn, true);
                $hours   = round($minutes / 60, 2);

                // Batasi jam kerja jika melebihi max_hours
                $totalHours = min($hours, $request->max_hours);

                // Hitung gaji
                $calculatedWages = round($totalHours * $request->hourly_wage, 2);

                // Simpan / update wages
                Wage::updateOrCreate(
                    [
                        'attendance_id' => $attendance->id, // UNIQUE
                    ],
                    [
                        'employee_id'      => $employee->id,
                        'user_id'          => Auth::id(),
                        'date'             => $checkIn->toDateString(),
                        'total_hours'      => $totalHours,
                        'hourly_wage'      => $request->hourly_wage,
                        'calculated_wages' => $calculatedWages,
                    ]
                );
            }
        }

        return redirect()
            ->route('kiosk.wage.index')
            ->with('success', 'Perhitungan gaji berhasil disimpan');
    }
}
<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class MonthlyAttendanceService
{
    public static function data()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Bulan berjalan
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth   = Carbon::now()->endOfMonth();

        // Total karyawan
        $employeeCount = Employee::count();

        $todayPresent = Attendance::whereDate('check_in', $today)
            ->whereNotNull('check_in')
            ->distinct('employee_id')
            ->count('employee_id');

        $yesterdayPresent = Attendance::whereDate('check_in', $yesterday)
            ->whereNotNull('check_in')
            ->distinct('employee_id')
            ->count('employee_id');

        if ($todayPresent > $yesterdayPresent) {
            $status = 'banyak';
            $diff = $todayPresent - $yesterdayPresent;
        } elseif ($todayPresent < $yesterdayPresent) {
            $status = 'sedikit';
            $diff = $yesterdayPresent - $todayPresent;
        } else {
            $status = 'sama';
            $diff = 0;
        }

        $monthlyPresent = Attendance::whereBetween('check_in', [$startOfMonth, $endOfMonth])
            ->whereNotNull('check_in')
            ->distinct('employee_id')
            ->count('employee_id');

        $monthlyAbsent = max($employeeCount - $monthlyPresent, 0);

        return (object) [
            // text atas
            'today'               => $todayPresent,
            'compaire_yesterday'  => $diff,
            'compaire_status'     => $status,

            // ringkasan bawah
            'employee_count' => $employeeCount,
            'present_count'  => $monthlyPresent,
            'absent_count'   => $monthlyAbsent,
        ];
    }
}

<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendancePercentageService
{
    public static function data()
    {
        $today = Carbon::today();

        $totalEmployee = Employee::count();

        $presentToday = Attendance::whereDate('check_in', $today)
            ->distinct('employee_id')
            ->count('employee_id');

        $absentToday = max($totalEmployee - $presentToday, 0);

        $presentPercent = $totalEmployee > 0
            ? round(($presentToday / $totalEmployee) * 100, 1)
            : 0;

        $absentPercent = 100 - $presentPercent;

        return (object) [
            'total'           => $totalEmployee,
            'present'         => $presentToday,
            'absent'          => $absentToday,
            'present_percent' => $presentPercent,
            'absent_percent'  => $absentPercent,
        ];
    }
}
<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Attendance;

class EmployeeCountService
{
    public static function employeeCounts()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $totalEmployee = Employee::count();

        $todayCount = Attendance::whereDate('check_in', $today)
            ->whereNotNull('check_in')
            ->distinct('employee_id')
            ->count('employee_id');

        $yesterdayCount = Attendance::whereDate('check_in', $yesterday)
            ->whereNotNull('check_in')
            ->distinct('employee_id')
            ->count('employee_id');

        $status = $todayCount > $yesterdayCount ? 'up'
            : ($todayCount < $yesterdayCount ? 'down' : 'same');

        $percentage = $yesterdayCount > 0
            ? round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100, 2)
            : 100;

        return (object) [
            'total_employee' => $totalEmployee,
            'attended'       => $todayCount,
            'status'         => $status,
            'percentage'     => abs($percentage),
        ];
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\EmployeeCountService;
use App\Services\MonthlyAttendanceService;
use App\Services\AttendancePercentageService;
use App\Services\MonthlyAverageAttendanceService;

class DashboardController extends Controller
{
    public function indexKiosk(MonthlyAverageAttendanceService $attendanceService)
    {
        return view('kiosk.dashboard', [
            'title' => 'Dashboard',
            'employee_counts' => EmployeeCountService::employeeCounts(),
            'monthly_attendances' => MonthlyAttendanceService::data(),
            'attendance_percent' => AttendancePercentageService::data(),
            'monthlyPresent' => $attendanceService->monthlyPresent()
        ]);
    }
}
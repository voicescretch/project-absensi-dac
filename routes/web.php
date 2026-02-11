<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WageController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('kiosk.indexKiosk');
    }
    return redirect()->route('showLogin');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
    });
});

Route::middleware('auth')->group(function () {

    Route::prefix('kiosk')->group(function () {

        // Dashboard kiosk
        Route::get('/dashboard', [DashboardController::class, 'indexKiosk'])->name('kiosk.indexKiosk');

        // Division Routes
        Route::get('/division', [DivisionController::class, 'index'])->name('kiosk.division.index');
        Route::post('/kiosk/division', [DivisionController::class, 'store'])->name('kiosk.division.store');
        Route::put('/division/{division}', [DivisionController::class, 'update'])->name('kiosk.division.update');
        Route::delete('/division/{division:id}', [DivisionController::class, 'destroy'])->name('kiosk.division.destroy');

        // Employee Routes
        Route::get('/employee', [EmployeeController::class, 'index'])->name('kiosk.employee.index');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('kiosk.employee.create');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('kiosk.employee.store');
        Route::get('/employee/edit/{employee:id}', [EmployeeController::class, 'edit'])->name('kiosk.employee.edit');
        Route::put('/employee/update/{employee:id}', [EmployeeController::class, 'update'])->name('kiosk.employee.update');
        Route::post('employee/import', [EmployeeController::class, 'import'])->name('kiosk.employee.import');
        Route::delete('/employee/delete/{employee:id}', [EmployeeController::class, 'destroy'])->name('kiosk.employee.destroy');

        Route::get('employee/by-id-number/{id_number}', [EmployeeController::class, 'findByIdNumber']);

        // Attendance
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('kiosk.attendance.index');
        Route::delete('/attendance/delete/{attendance:id}', [AttendanceController::class, 'destroy'])->name('kiosk.attendance.destroy');
        Route::get('/export/attendance', [AttendanceController::class, 'exportAttendance'])->name('exportAttendance');
        Route::get('/export/attendance-salary', [AttendanceController::class, 'exportAttendanceSalary'])->name('exportAttendanceSalary');

        // QR Code
        Route::any('/qr/generate', [AttendanceController::class, 'generate'])->name('qr.generate');
        Route::get('/qr/generate-all', [AttendanceController::class, 'generateAll'])->name('qr.generate.all');

        // Check In Routes
        Route::get('/check-in', [CheckInController::class, 'index'])->name('kiosk.checkIn');
        Route::post('attendance/checkin', [AttendanceController::class, 'checkIn'])->name('kiosk.attendance.check-in');

        // Check Out Routes
        Route::get('/check-out', [CheckOutController::class, 'index'])->name('kiosk.checkOut');
        Route::put('/attendance/checkout', [AttendanceController::class, 'bulkCheckOut'])->name('kiosk.attendance.check-out');

        // Salary Route
        Route::get('/wage', [WageController::class, 'index'])->name('kiosk.wage.index');
        Route::get('/wage/create', [WageController::class, 'create'])->name('kiosk.wage.create');
        Route::post('/wage/store', [WageController::class, 'store'])->name('kiosk.wage.store');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    //
    protected $table = 'wages';

    protected $fillable = [
        'employee_id',
        'user_id',
        'attendance_id',
        'total_hours',
        'date',
        'hourly_wage',
        'calculated_wages'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
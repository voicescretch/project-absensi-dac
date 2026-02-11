<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'division_id',
        'name',
        'id_number',
        'shift',
        'contact',
        'location'
    ];

    protected $casts = [
        'contact' => 'string',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function wage()
    {
        return $this->hasMany(Wage::class, 'employee_id');
    }
}
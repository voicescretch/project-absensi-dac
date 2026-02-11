<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'division_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'division_id');
    }
}
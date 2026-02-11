<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Division
        Division::create([
            'name' => 'Kiosk'
        ]);

        // User::factory(10)->create();
        User::factory()->create([
            'division_id' => 1,
            'name' => 'Kiosk Presensi 1',
            'username' => 'kiosk1a',
            'email' => 'kioskpresensi1@example.com',
            'password' => 'password',
            'address' => 'Perumahan Saphire',
            'location' => 'Gedung A'
        ]);

        // Division Seeder
        $this->call([
            DivisionSeeder::class,
        ]);

        // Employee Seeder
        $this->call([
            EmployeeSeeder::class,
        ]);
    }
}

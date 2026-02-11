<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'name' => 'Rendi Apriliyan',
                'id_number' => 'DAC202501001',
                'division_id' => 2,
                'shift' => 'pagi',
                'contact' => '0812-3456-7890',
                'location' => 'Gedung A',
            ],
            [
                'name' => 'Andi Saputra',
                'id_number' => 'DAC202501002',
                'division_id' => 2,
                'shift' => 'malam',
                'contact' => '0821-4567-8901',
                'location' => 'Gedung B',
            ],
            [
                'name' => 'Budi Santoso',
                'id_number' => 'DAC202501003',
                'division_id' => 2,
                'shift' => 'pagi',
                'contact' => '0831-5678-9012',
                'location' => 'Gedung A',
            ],
            [
                'name' => 'Dewi Lestari',
                'id_number' => 'DAC202501004',
                'division_id' => 2,
                'shift' => 'malam',
                'contact' => '0842-6789-0123',
                'location' => 'Gedung B',
            ],
            [
                'name' => 'Eko Prasetyo',
                'id_number' => 'DAC202501005',
                'division_id' => 2,
                'shift' => 'pagi',
                'contact' => '0853-7890-1234',
                'location' => 'Gedung A',
            ],
            [
                'name' => 'Fitri Handayani',
                'id_number' => 'DAC202501006',
                'division_id' => 2,
                'shift' => 'malam',
                'contact' => '0864-8901-2345',
                'location' => 'Gedung B',
            ],
            [
                'name' => 'Gilang Ramadhan',
                'id_number' => 'DAC202501007',
                'division_id' => 2,
                'shift' => 'pagi',
                'contact' => '0875-9012-3456',
                'location' => 'Gedung A',
            ],
            [
                'name' => 'Hana Putri',
                'id_number' => 'DAC202501008',
                'division_id' => 2,
                'shift' => 'malam',
                'contact' => '0886-0123-4567',
                'location' => 'Gedung B',
            ],
            [
                'name' => 'Indra Wijaya',
                'id_number' => 'DAC202501009',
                'division_id' => 2,
                'shift' => 'pagi',
                'contact' => '0897-1234-5678',
                'location' => 'Gedung A',
            ],
            [
                'name' => 'Joko Susilo',
                'id_number' => 'DAC202501010',
                'division_id' => 2,
                'shift' => 'malam',
                'contact' => '0818-2345-6789',
                'location' => 'Gedung B',
            ],
        ];

        foreach ($employees as $employee) {
            DB::table('employees')->insert([
                ...$employee,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $divisions = [
            'Assembly',
            'Quality Control',
            'Packing',
            'Werehouse',
            'Helper',
        ];

        foreach ($divisions as $division) {
            DB::table('divisions')->insert([
                'name' => $division,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
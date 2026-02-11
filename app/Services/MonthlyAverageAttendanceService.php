<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MonthlyAverageAttendanceService
{
    public function monthlyPresent(): array
    {
        $data = DB::table('attendances')
            ->selectRaw('MONTH(check_in) as month, COUNT(DISTINCT employee_id) as total')
            ->whereYear('check_in', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // isi default 12 bulan = 0
        $monthly = array_fill(0, 12, 0);

        foreach ($data as $row) {
            $monthly[$row->month - 1] = (int) $row->total;
        }

        return $monthly;
    }
}
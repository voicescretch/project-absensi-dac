<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Services\QrCodeService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\AttendanceExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceSalaryExport;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        $title = 'Data Presensi';
        $attendances = Attendance::with(['user', 'employee'])->orderBy('check_in', 'desc')->paginate(20);
        $employees = Employee::get();
        $divisions = Division::whereNot('name', '=', 'Kiosk')->orderBy('name')->get();

        return view('kiosk.index-attendance', compact(['attendances', 'employees', 'divisions', 'title']));
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('kiosk.attendance.index')->with(['success' => 'Data Berhasil Di Hapus']);
    }

    public function exportAttendance(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'shift'       => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
        ]);

        return Excel::download(
            new AttendanceExport(
                $request->division_id,
                $request->shift,
                $request->start_date,
                $request->end_date
            ),
            'attendance.xlsx'
        );
    }

    public function exportAttendanceSalary(Request $request)
    {
        $request->validate([
            'start_date' => 'required|string',
            'end_date'   => 'required|string',
        ]);

        // Corversion format date
        $startDate = Carbon::createFromFormat('d F Y', $request->start_date)->format('Y-m-d');
        $endDate   = Carbon::createFromFormat('d F Y', $request->end_date)->format('Y-m-d');

        // Re-validate
        if ($endDate < $startDate) {
            return back()->withErrors([
                'end_date' => 'Tanggal akhir tidak boleh lebih kecil dari tanggal awal'
            ]);
        }

        return Excel::download(
            new AttendanceSalaryExport($startDate, $endDate),
            "attendance-gaji-{$startDate}-to-{$endDate}.xlsx"
        );
    }


    public function bulkCheckOut(Request $request)
    {
        // Validate input
        $request->validate([
            'id_numbers'   => 'required|array|min:1',
            'id_numbers.*' => 'required|string|exists:employees,id_number',
        ]);

        foreach ($request->id_numbers as $id_number) {
            $employee = Employee::where('id_number', $id_number)->first();

            // Cegah double check-out
            $is_checkout = Attendance::where('employee_id', $employee->id)
                ->where('check_out', '=', null)
                ->exists();

            if (!$is_checkout) {
                continue;
            }

            $attendance = Attendance::where('employee_id', $employee->id)->where('check_out', '=', null)->first();

            $attendance->update([
                'check_out' => Carbon::now()->toDateTimeString(),
            ]);
        }

        return redirect()->back()->with('success', 'Check-out berhasil');
    }


    public function checkIn(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string'
        ]);

        $employee = Employee::where('id_number', $request->id_number)->firstOrFail();

        // Cegah double check-in hari ini
        $exists = Attendance::where('employee_id', $employee->id)
            ->whereDate('check_in', Carbon::today())
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Sudah check-in hari ini'], 409);
        }

        $attendance = Attendance::create([
            'employee_id' => $employee->id,
            'check_in' => now()
        ]);

        return response()->json([
            'id' => $attendance->id,
            'name' => $employee->name,
            'id_number' => $employee->id_number
        ]);
    }

    public function today()
    {
        return Attendance::with('employee')
            ->whereDate('check_in', today())
            ->get()
            ->map(fn($a) => [
                'id' => $a->id,
                'name' => $a->employee->name,
                'id_number' => $a->employee->id_number
            ]);
    }

    public function destroyAttendance(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(['success' => true]);
    }

    public function generate(Request $request, QrCodeService $qrService)
    {
        $request->validate([
            'mode' => 'required|in:employee,division',
            'employees' => 'array',
            'employees.*' => 'exists:employees,id',
            'divisions' => 'array',
            'divisions.*' => 'string',
        ]);

        $query = Employee::query()->with('division')->whereDoesntHave('division', function ($q) {
            $q->where('name', 'Kiosk');
        });

        if ($request->mode === 'employee') {
            if (empty($request->employees)) {
                abort(400, 'Pilih minimal 1 karyawan');
            }
            $query->whereIn('id', $request->employees);
        }

        if ($request->mode === 'division') {
            if (empty($request->divisions)) {
                abort(400, 'Pilih minimal 1 divisi');
            }
            $query->whereIn('division_id', $request->divisions);
        }

        $employees = $query->get();

        if ($employees->isEmpty()) {
            abort(404, 'Data tidak ditemukan');
        }

        return $this->generatePdf($employees, $qrService);
    }

    public function generateAll(QrCodeService $qrService)
    {
        $employees = Employee::with('division')->whereHas('division', function ($q) {
            $q->where('name', '!=', 'Kiosk');
        })->get();
        return $this->generatePdf($employees, $qrService);
    }

    private function generatePdf($employees, QrCodeService $qrService)
    {
        $qrData = $employees->map(function ($employee) use ($qrService) {
            return [
                'name'     => $employee->name,
                'id_number' => $employee->id_number,
                'division' => $employee->division->name,
                'qr'       => $qrService->make($employee->id_number),
            ];
        });

        $pdf = Pdf::loadView('pdf.qr-bulk', [
            'employees' => $qrData
        ])
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

        return $pdf->download(
            'qremployees-' . Carbon::now()->format('Y-m-d_H-i-s') . '.pdf'
        );
    }
}
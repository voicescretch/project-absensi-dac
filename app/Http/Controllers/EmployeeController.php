<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $title = 'Data Karyawan';
        $employees = Employee::with('division')->paginate(20);

        return view('kiosk.index-employee', compact(['employees', 'title']));
    }

    public function create()
    {
        $title = 'Tambah Karyawan';
        $divisions = Division::where('name', '<>', 'Kiosk')->get();

        return view('kiosk.create-employee', compact(['title', 'divisions']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:225',
            'id_number' => 'required|string',
            'shift' => 'required|in:pagi,malam',
            'contact' => 'required|string',
            'location' => 'required|string',
        ], [
            'division_id.required' => 'Divisi tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'id_number.required' => 'Nomor ID tidak boleh kosong',
            'shift.required' => 'Shift tidak boleh kosong',
            'shift.in' => 'Hanya ada shift pagi dan malam',
            'contact.required' => 'Nomor Telepon tidak boleh kosong',
            'location.required' => 'Lokasi tidak boleh kosong',
        ]);

        Employee::create([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'id_number' => $request->id_number,
            'shift' => $request->shift,
            'contact' => $request->contact,
            'location' => $request->location
        ]);

        return redirect()->route('kiosk.employee.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit(Employee $employee)
    {
        $divisions = Division::where('name', '<>', 'Kiosk')->get();
        return view('kiosk.edit-employee', ['title' => 'Edit Karyawan', 'employee' => $employee, 'divisions' => $divisions]);
    }

    public function update(Request $request, Employee $employee)
    {
        $edit_employee = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:225',
            'id_number' => 'required|string',
            'shift' => 'required|in:pagi,malam',
            'contact' => 'required|string',
            'location' => 'required|string',
        ]);
        $employee->update($edit_employee);
        return redirect()->route('kiosk.employee.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('kiosk.employee.index')->with(['success' => 'Data Berhasil Di Hapus']);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx'
        ]);

        Excel::import(new EmployeeImport, $request->file('file'));

        return redirect()
            ->back()
            ->with('success', 'Data karyawan berhasil diimport');
    }

    public function findByIdNumber($id_number)
    {
        $id_number = trim($id_number);

        $employee = Employee::whereRaw('TRIM(id_number) = ?', [$id_number])->first();

        if (!$employee) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }

        return response()->json([
            'id_number' => $employee->id_number,
            'name' => $employee->name,
        ], 200);
    }
}
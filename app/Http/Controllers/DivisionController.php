<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    // Index
    public function index()
    {
        $title = 'Data Divisi';
        $divisions = Division::where('name', '<>', 'Kiosk')->paginate(20);

        return view('kiosk.index-division', compact(['divisions', 'title']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Division::create($validated);

        return redirect()->back()->with('success', 'Divisi berhasil ditambahkan');
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $division->update([
            'name' => $validated['name'],
        ]);

        return redirect()->back()->with('success', 'Divisi berhasil diperbarui');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('kiosk.division.index')->with(['message' => 'Data Berhasil Di Hapus']);
    }
}
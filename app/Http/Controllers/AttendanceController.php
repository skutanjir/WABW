<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(5);
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|string|max:20',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index');
    }

    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|string|max:20',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());
        return redirect()->route('attendance.index');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendance.index');
    }
}
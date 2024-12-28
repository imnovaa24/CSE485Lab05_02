<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('department')->get(); // Eager load department
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('staff.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'academic_rank' => 'nullable|max:255',
            'degree' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Staff::create($validatedData);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        $departments = Department::all();
        return view('staff.edit', compact('staff', 'departments'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'academic_rank' => 'nullable|max:255',
            'degree' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $staff->update($validatedData);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }

    public function editMyProfile()
    {
        $user = Auth::user();
        $staff = $user->staff;
        // dd($staff); // Để debug xem thử $staff có dữ liệu không
        if (!$staff) {
            abort(403, 'Bạn chưa được gán với thông tin nhân viên nào. Vui lòng liên hệ quản trị viên.');
        }

        return view('staff.editMyProfile', compact('staff'));
    }

    public function updateMyProfile(Request $request)
    {
        $user = Auth::user();
        $staff = $user->staff;

        if (!$staff) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255|unique:staff,email,'.$staff->id,
        ]);

        $staff->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Your profile updated successfully!');
    }
}

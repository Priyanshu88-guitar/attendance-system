<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
    $students = \App\Models\Student::all();
    return view('students.index', compact('students'));
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'enrollment_no' => 'required|unique:students',
        'branch' => 'required'
    ]);
    \App\Models\Student::create($request->all());
    return redirect()->route('students.index')->with('success', 'Student added!');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Transaction;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('students/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create([
            'student_name' => addslashes($request->student_name),
            'student_class' => $request->student_class,
            'student_nisn' => $request->student_nisn,
            'date_of_birth' => $request->date_of_birth,
            'student_gender' => $request->student_gender,
            'saving_balance' => 0
        ]);
        return redirect()->to('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $student_id)
    {
        $student = Student::find($student_id);

        $transaction_lists = Transaction::where('student_id', $student_id)->get();

        return view('students.show', compact('student', 'transaction_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Transaction;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    public function import(){
        return view('students/import');
    }

    public function importStore(Request $request){
        $this->validate($request, [
            'spreadsheet' => 'required|file|mimes:xlsx,xls'
        ]);
        $importFile = $request->file('spreadsheet');

        $reader = IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load($importFile);
        $spreadsheet->setActiveSheetIndex(1);
        $cellValue = $spreadsheet->getActiveSheet()->rangeToArray('L5:R53', NULL, TRUE, TRUE, TRUE);
        $count = 0;
        foreach ($cellValue as $data) {
            $birthdate = $data['P'];
            $birthdate = str_replace('/', '-', $birthdate);
            Student::create([
                'student_name' => addslashes($data['N']),
                'class' => $data['R'],
                'nisn' => $data['L'],
                'birthdate' => date("Y-m-d", strtotime($birthdate)),
                'gender' => $data['Q']
            ]);
            $count++;
        }
        return redirect()->route('student.index')->with('message', 'Berhasil import data sejumlah : ' . $count);
    }
}

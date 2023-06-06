<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Student;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('transactions/add', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::find($request->student_id);

        if($request->transaction_type == 'Deposit'){
            // Add the balance
            $student->saving_balance += $request->transaction_amount;  
            $student->save();
        } elseif($request->transaction_type == 'Withdraw'){
            // Check if the required amount is available on the db
            if($request->transaction_amount > $student->saving_balance){
                return redirect()->back()->with('status', 'Balance on student saving account is insufficient');
            }
            
            // Substract the balance
            $student->saving_balance -= $request->transaction_amount;
            $student->save();
        }

        Transaction::create([
            'student_id' => $request->student_id,
            'transaction_type' => $request->transaction_type,
            'transaction_amount' => $request->transaction_amount,
            'transaction_date'=> date('Y/m/d'),
        ]);
        return redirect()->to('dashboard')->with('status', 'Transaction success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

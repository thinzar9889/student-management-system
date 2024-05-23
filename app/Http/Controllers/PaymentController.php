<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;
class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', [
            'payments' => $payments
        ]);
    }
    public function create()
    {
        $enrollments= Enrollment::pluck('enroll_no','id');
        return view('payments.create',compact('enrollments'));
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Payment::create($input);
        return redirect(route('payments.index'))->with('flash_message', 'Payment Addedd!');  
    }
    public function show($id)
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }
    public function edit($id)
    {
        $payments = Payment::find($id);
        $enrollments = Enrollment::select('id', 'enroll_no')->get();
        return view('payments.edit', [
            'payments' => $payments,
            'enrollments' => $enrollments
        ]);
    }
    public function update(Request $request,$id)
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect(route('payments.index'))->with('flash_message', 'Payment Updated!');  
    }
    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect(route('payments.index'))->with('flash_message', 'Payment deleted!');
    }



}

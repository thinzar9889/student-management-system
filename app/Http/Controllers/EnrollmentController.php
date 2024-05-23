<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', [
            'enrollments' => $enrollments
        ]);
    }
    public function create()
    {
        return view('enrollments.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Enrollment::create($input);
        return redirect(route('enrollments.index'))->with('flash_message', 'Enrollment Addedd!');  
    }
    public function show($id)
    {
        $enrollment = Enrollment::find($id);
        return view('enrollments.show')->with('enrollment', $enrollment);
    }
    public function edit($id)
    {
        $enrollment= Enrollment::find($id);
        return view('enrollments.edit')->with('enrollment', $enrollment);
    }
    public function update(Request $request,$id)
    {
        $enrollment = Enrollment::find($id);
        $input = $request->all();
        $enrollment->update($input);
        return redirect(route('enrollments.index'))->with('flash_message', 'Enrollment Updated!');  
    }
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return redirect(route('enrollments.index'))->with('flash_message', 'Enrollment deleted!');
    }


}

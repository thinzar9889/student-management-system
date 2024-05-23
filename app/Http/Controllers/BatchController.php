<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact("batches"));
    }
    public function create()
    {   
        $courses = Course::pluck('name','id');
        return view('batches.create',compact('courses'));
        //return view('batches.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Batch::create($input);
        return redirect(route('batches.index'))->with('flash_message', 'Batch Addedd!');  
    }
    public function show($id)
    {
        $batch = Batch::find($id);
        return view('batches.show')->with('batch', $batch);
    }
    public function edit($id)
    {
        $batch= Batch::find($id);
        return view('batches.edit')->with('batch', $batch);
    }
    public function update(Request $request,$id)
    {
        $batch = Batch::find($id);
        $input = $request->all();
        $batch->update($input);
        return redirect(route('batches.index'))->with('flash_message', 'Batch Updated!');  
    }
    public function destroy($id)
    {
        Batch::destroy($id);
        return redirect(route('batches.index'))->with('flash_message', 'Batch deleted!');
    }
}
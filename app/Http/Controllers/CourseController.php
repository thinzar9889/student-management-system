<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', [
            'courses' => $courses
        ]);
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Course::create($input);
        return redirect(route('courses.index'))->with('flash_message', 'Course Addedd!');  
    }
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show')->with('course', $course);
    }
    public function edit($id)
    {
        $course= Course::find($id);
        return view('courses.edit')->with('course', $course);
    }
    public function update(Request $request,$id)
    {
        $course = Course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect(route('courses.index'))->with('flash_message', 'Course Updated!');  
    }
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect(route('courses.index'))->with('flash_message', 'Course deleted!');
    }

}

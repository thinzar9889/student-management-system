@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ route('courses.update', $course->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT") 
        <input type="hidden" name="id" id="id" value="{{$course->id}}" id="id" />
        <label>Name</label></br><br>
        <input type="text" name="name" id="name" value="{{$course->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="syllabus" id="syllabus" value="{{$course->syllabus}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="duration" id="duration" value="{{$course->duration}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
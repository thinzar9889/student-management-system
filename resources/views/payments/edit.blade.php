@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payment Page</div>
  <div class="card-body">
      
      <form action="{{ route('payments.update', $payments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT") 
        <input type="hidden" name="id" id="id" value="{{$payments->id}}" id="id" />
        <label>Enrollment No</label></br><br>
        
        <select name="enrollment_id" id="enrollment_id" class="form-control">
          @foreach($enrollments as $id => $enrollment)
            <option value="{{ $enrollment->id }}">{{ $enrollment->enroll_no}}</option>
          @endforeach
        </select>
    
        <label>Paid Date</label></br>
        <input type="text" name="paid_date" id="paid_date" value="{{$payments->paid_date}}" class="form-control"></br>
        <label>Amount</label></br>
        <input type="text" name="amount" id="amount" value="{{$payments->amount}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
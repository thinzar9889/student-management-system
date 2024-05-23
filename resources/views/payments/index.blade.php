 @extends('layout')
@section('content')
<div class="container">
    <div class="card">
                    <div class="card-header">
                        <h2>Payment Application</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm" title="Add New Payment">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Enrollment No</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment-> enrollment->enroll_no}}</td>
                                        <td>{{ $payment->paid_date}}</td>
                                        <td>{{ $payment->amount}}</td>
 
                                        <td>
                                            <a href="{{ route('payments.show',$payment->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('payments.edit', $payment->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('payments.destroy', $payment->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}  
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>   
                                    </tr>
                                @endforeach     
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
</div>
 @endsection
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Orders</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Orders Details</th>
                {{--<th>Customer-Name</th>--}}
                {{--<th>Employee-Name</th>--}}
                <th>Total Amount</th>
                @if(Auth::check() || Auth::guard('employee')->user()->role->name == 'Manager')
                <th>Delete</th>
                    @endif
            </tr>
            </thead>
            <tbody>
            
                @foreach($orders as $order)
                    <tr>
                        <td><a href="#">Orders details</a></td>
                        {{--<td>{{$order->customer->Store_Name}}</td>--}}
                        {{--<td>{{$order->employee->name}}</td>--}}
                        <td>{{$order->total_amount}}</td>
                        <td>
                          <div class="form-group">
                              @if(Auth::check() || Auth::guard('employee')->user()->role->name == 'Manager')
                          {!! Form::open(['method'=>'DELETE','action'=>['OrdersController@destroy',$order->id]]) !!}
                          {!! Form::submit('Delete',['class'=>'form-control btn btn-danger btn-sm']) !!}
                                @endif
                         {!! Form::close() !!}


                          </div>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
@endsection
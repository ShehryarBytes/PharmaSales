@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Order Details</h1>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Name</th>
                <th>price</th>
                <th>qty</th>
                <th>delete Item</th>
                </thead>
                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->qty}}</td>
                    <!-- <form method="PUT" action="{{ route('cart.update',['id'=>$cartItem->rowId])}}">

               <input type="text" name="qty" value="{{$cartItem->qty}}">
               <input type="submit" value="ok" class="btn btn-default btn-xs">
              </form></td>-->
                        <td><a href="{{route('cart.show',['id'=>$cartItem->rowId])}}" class="button">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6">
                    <h3>Totals</h3>
                    <p>
                    <h4>Tax</h4><span class="badge">${{Cart::tax()}}</span>
                    <h4>SubTotal</h4><span class="badge">${{Cart::subtotal()}}</span>
                    <h4>Grand Total</h4><span class="badge">${{Cart::total()}}</span>
                    </p>
                </div>
                <div class="col-sm-6">
                    <h4>No of Products</h4>
                    <p>
                    <h5>Items</h5><span class="badge">{{Cart::count()}}<br></span>
                    </p>

                </div>
            </div>

        </div>
        <div class="well">
            {!! Form::open(['method' => 'POST','action' => 'OrdersController@store']) !!}

            <div class="form-group">
                {!! Form::label('Select Customer', 'Select Customer') !!}
                {!! Form::select('customer_id', $customer , null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {{ Form::hidden('employee_id',Auth::guard('employee')->user()->id) }}
            </div>
            <div class="form-group">
                {{ Form::hidden('delivered',1) }}
            </div>
            <div class="form-group">
                {!! Form::label('Total Amount', 'Total Amount') !!}
                {{ Form::number('total_amount', Cart::total()),['class' => 'form-control']}}
            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}

            @include('includes.form_errors')

        </div>

@endsection

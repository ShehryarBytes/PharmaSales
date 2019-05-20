@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="page-header">
        <h1>Products</h1>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Product Name</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Expiry Date</th>
            <th>Mfg: Date</th>
            <th>Bonus</th>
            <th>Tax</th>
            <th>Batch</th>
            <th>Total Amount</th>
            @if(Auth::check() || Auth::guard('employee')->user()->role->name == 'manager')
            <th>Edit</th>
            <th>Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @if($data)
            @foreach($data as $product)
        <tr>
            <td>{{$product->Product_Name}}</td>
            <td>{{$product->Cost}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->Exp_date}}</td>
            <td>{{$product->Mfg_date}}</td>
            <td>{{$product->bonus}}</td>
            <td>{{$product->tax}}</td>
            <td>{{$product->batch}}</td>
            <td>{{$product->T_amount}}</td>
            @if(Auth::check() || Auth::guard('employee')->user()->role->name == 'Manager')
            <td><a href="{{ URL::to('products/'.$product->id.'/edit')}}"><button class="btn btn-success">Edit</button></a></td>
            <td>{!! Form::open(['method' => 'DELETE',
                                 'action' => ['ProductsController@destroy',$product->id]]) !!}
                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
                @endif
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@endsection

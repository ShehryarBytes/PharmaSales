@extends('layouts.admin')

@section('content')
<h1>Products</h1>

<div class="container-fluid">
    <table class="table">
        <thead>
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
            <td>{{$product->Tax}}</td>
            <td>{{$product->batch}}</td>
            <td>{{$product->T_amount}}</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@endsection

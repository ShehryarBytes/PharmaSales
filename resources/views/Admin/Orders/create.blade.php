@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('cart.index')}}">
                        <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                        </i>
                        CART
                        <span class="alert badge">
                                {{Cart::count()}}
                            </span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Cost</th>
                <th>tax</th>
                <th>Add to Order</th>
            </tr>
            </thead>
            <tbody>
            @if($product)
                @foreach($product as $product)
                    <tr>
                        <td>{{$product->Product_Name}}</td>
                        <td>{{$product->Cost}}</td>
                        <td>{{$product->tax}}</td>
                        <td><a class="fa fa-cart-plus" href="{{ route('cart.edit',['id'=>$product->id])}}" class="button expanded add-to-cart">
                                Add to Cart
                            </a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12" align="center">
                <a href="{{ URL::to('orders/show') }}"><button class="btn btn-success" type="button">Proceed Order</button></a>
            </div>

        </div>
    </div>

@endsection

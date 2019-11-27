@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Enterprise Profile</h1>
        </div>
<h3 class="text-center">Cart items</h3>
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
        <tr>
            <td>
                Tax: ${{Cart::tax()}}<br>
                SubTotal ${{Cart::subtotal()}}<br>
                Grand Total: ${{Cart::total()}}
            </td>
            <td>Items {{Cart::count()}}</td>
        </tr>

    {{--<a href="{{ route('checkout')}}" class="button">Checkout</a>--}}
        </tbody>
    </table>
</div>
    </div>

@endsection
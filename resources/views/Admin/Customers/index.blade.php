@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Medical Stores</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Category Id</th>
                <th>Area Id</th>
                <th>Store Name</th>
                <th>Owner Name</th>
                <th>Customer License No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th><i class="fa fa-map-marker"></i>Location</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($customers)
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->category->name}}</td>
                        <td>{{$customer->area->name}}</td>
                        <td>{{$customer->Store_Name}}</td>
                        <td>{{$customer->Owner_Name}}</td>
                        <td>{{$customer->C_License_no}}</td>
                        <td>{{$customer->Email}}</td>
                        <td>{{$customer->Address}}</td>
                        <td>{{$customer->Contact}}</td>
                        <td><a href="{{url('gmaps')}}" class="fa fa-map-marker">Map</a></td>

                        <td><button type="submit" name="update" value="Edit" class="btn btn-info btn-sm" onclick="window.location='{{url("customers/$customer->id/edit") }}'">Update</button></td>

                        <td>
                            <div class="form-group">

                                {!! Form::open(['method'=>'DELETE','action'=>['CustomersController@destroy',$customer->id]]) !!}

                                {!! Form::submit('Delete',['class'=>'form-control btn btn-danger btn-sm']) !!}

                                {!! Form::close() !!}


                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection

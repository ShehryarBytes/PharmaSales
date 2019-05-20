@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Employees</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Area Name</th>
                <th>Area Code</th>
                <th>No Of Stores</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($areas)
                @foreach($areas as $area)
                    <tr>
                        <td>{{$area->name}}</td>
                        <td>{{$area->code}}</td>
                        <td>{{$area->no_of_stores}}</td>
                        <td><a href="{{ URL::to('areas/'.$area->id).'/edit' }}"><button type="submit" name="update" value="Edit" class="btn btn-info btn-sm">Update</button></a></td>

                        <td>
                            <div class="form-group">

                                {!! Form::open(['method'=>'DELETE','action'=>['AreasController@destroy',$area->id]]) !!}

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

@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <h1>Employees</h1>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>CNIC</th>
                <th>Adress</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($data)
                @foreach($data as $employee)
                    <tr>
                        <td><a href="{{ URL::to('employees/'.$employee->id)}}">{{$employee->name}}</a></td>
                        <td>{{$employee->role->name}}</td>
                        <td>{{$employee->CNIC}}</td>
                        <td>{{$employee->adress}}</td>
                        <td>{{$employee->email}}</td>
                        <td><a href="{{ URL::to('employees/'.$employee->id).'/edit'}}"><button class="btn btn-success">Edit</button></a></td>
                        <td>{!! Form::open(['method' => 'DELETE',
                                 'action' => ['EmployeesController@destroy',$employee->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger'] ) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
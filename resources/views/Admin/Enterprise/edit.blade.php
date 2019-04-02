@extends('layouts.admin')

@section('content')

    <h1>Edit Employee</h1>

    <div class="row">
        <div class="col-sm-10">
            <h1>User name</h1></div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped">
            <tbody>
            <td colspan="1">
                {!! Form::model($employee,['method' => 'PATCH','action' => ['EmployeesController@update',$employee->id], 'files'=>true]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Employee Name', 'Employee Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::hidden('user_id', $id) }}
                </div>
                <div class="form-group">
                    {!! Form::label('Role', 'Role') !!}
                    {!! Form::select('role_id',array('Select Role',$role), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('CNIC', 'CNIC') !!}
                    {!! Form::number('CNIC', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Adress', 'Adress') !!}
                    {!! Form::text('adress', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Contact', 'Contact') !!}
                    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Gender', 'Gender') !!}
                    {!! Form::select('gender',array('Select Gender',$gender), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Qualification', 'Qualification') !!}
                    {!! Form::text('qualification', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Salary', 'Salary') !!}
                    {!! Form::number('Salary', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('D.O.B', 'D.O.B') !!}
                    {!! Form::date('DOB', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Picture', 'Picture') !!}
                    {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}
            </td>
            </tbody>
        </table>

        @include('includes.form_errors')

    </div>


@endsection

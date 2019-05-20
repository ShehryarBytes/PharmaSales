@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Add Medical Store</h1>
        </div>

        <div class="well">
                {!! Form::open(['method' => 'POST','action' => 'CustomersController@store']) !!}
                    {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Choose Category', 'Choose Category') !!}
                    {!! Form::select('category_id',['0'=>'Select Catagory',$category] , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Choose Area', 'Choose Area') !!}
                    {!! Form::select('area_id', ['0'=>'Select Area',$area] , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Store Name', 'Store Name') !!}
                    {!! Form::text('Store_Name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::hidden('user_id', $id) }}
                </div>


                <div class="form-group">
                    {!! Form::label('Owner Name', 'Owner Name') !!}
                    {!! Form::text('Owner_Name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Customer License No', 'Customer License No') !!}
                    {!! Form::text('C_License_no', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email', 'Email') !!}
                    {!! Form::email('Email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Address', 'Address') !!}
                    {!! Form::text('Address', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Contact', 'Contact') !!}
                    {!! Form::text('Contact', null, ['class' => 'form-control']) !!}
                </div>



                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


        @include('includes.form_errors')

        </div>
    </div>

@endsection
@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Edit Product</h1>
        </div>

        <div class="well">
                {!! Form::model($customer,['method' => 'PATCH','action' => ['CustomersController@update',$customer->id]]) !!}

                    {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('Category Id', 'Category Id') !!}
                    {!! Form::select('category_id',$category, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Choose Area', 'Choose Area') !!}
                    {!! Form::select('area_id',$area, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Store Name', 'Store Name') !!}
                    {!! Form::text('Store_Name', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('Owner Name', 'Owner Name') !!}
                    {!! Form::text('Owner_Name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Customer License No', 'Customer License No') !!}
                    {!! Form::number('C_License_no', null, ['class' => 'form-control']) !!}
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
                    {!! Form::number('Contact', null, ['class' => 'form-control']) !!}
                </div>



                {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


        @include('includes.form_errors')

    </div>
    </div>

@endsection
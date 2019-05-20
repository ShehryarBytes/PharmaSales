@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Edit Company</h1>
        </div>

        <div class="well">
                {!! Form::open(['method' => 'POST','action' => 'CompaniesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('Company Email', 'Company Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Company Name', 'Company Name') !!}
                    {!! Form::text('Company_Name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::hidden('user_id', $id) }}
                </div>


                <div class="form-group">
                    {!! Form::label('Company License No', 'Company License No') !!}
                    {!! Form::text('Comany_Lisence_no', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Company Contact No', 'Company Contact No') !!}
                    {!! Form::text('C_contact', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Company Address', 'Company Address') !!}
                    {!! Form::text('C_adress', null, ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


        @include('includes.form_errors')

    </div>
    </div>

@endsection
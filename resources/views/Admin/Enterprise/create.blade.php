@extends('layouts.admin')

@section('content')

    <h1>Account Details</h1>

    <div class="container">
        <table class="table table-striped">
            <tbody>
            <td colspan="1">
                {!! Form::open(['method' => 'POST','action' => 'EnterprisesController@store', 'files'=>true]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Enterprise Name', 'Enterprise_Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Owner Name', 'Owner_Name') !!}
                    {!! Form::text('owner_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::hidden('user_id', $id) }}
                </div>
                <div class="form-group">
                    {!! Form::label('District ', 'District') !!}
                    {!! Form::select('disttrict',array('Select District','Mardan'=>'Mardan','Peshawer'=>'Peshawer','Kohat'=>'Kohat','Swabi'=>'Swabi'), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Adress', 'Adress') !!}
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('License No', 'License') !!}
                    {!! Form::text('license', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Phone', 'Phone') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Mobile', 'Mobile') !!}
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Logo/Picture','Logo') !!}
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
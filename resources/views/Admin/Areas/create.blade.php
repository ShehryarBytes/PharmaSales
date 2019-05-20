@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Add Area</h1>
        </div>

        <div class="well">
                {!! Form::open(['method' => 'POST','action' => 'AreasController@store']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Area Name', 'Area Name') !!}
                    {!! Form::text('name' , null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Area Code', 'Area Code') !!}
                    {!! Form::number('code', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {{ Form::hidden('user_id', $id) }}
                </div>


                <div class="form-group">
                    {!! Form::label('No Of Stores', 'No Of Stores') !!}
                    {!! Form::text('no_of_stores', null, ['class' => 'form-control']) !!}
                </div>



                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


        @include('includes.form_errors')

    </div>
    </div>

@endsection
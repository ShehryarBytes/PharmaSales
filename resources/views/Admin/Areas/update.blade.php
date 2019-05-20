@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Edit Product</h1>
        </div>

        <div class="well">
                {!! Form::model($area,['method' => 'PATCH','action' => ['AreasController@update',$area->id]]) !!}

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
                    {!! Form::label('No Of Stores', 'No Of Stores') !!}
                    {!! Form::text('no_of_stores', null, ['class' => 'form-control']) !!}
                </div>





                {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


        @include('includes.form_errors')

    </div>

    </div>

@endsection
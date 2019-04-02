@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="page-header">
            <h1>Edit Product</h1>
        </div>

        <div class="well">
            {!! Form::model($product,['method' => 'PATCH','action' => ['ProductsController@update',$product->id]]) !!}
            <legend class="profile-username">{{$product->name}}</legend>
            <div class="form-group">
                {!! Form::label('Product Name', 'Product Name') !!}
                {!! Form::text('Product_Name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Batch No', 'Batch No') !!}
                {!! Form::text('batch', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Quantity', 'Quantity') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Tax', 'Tax') !!}
                {!! Form::number('Tax', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('KG', 'KG') !!}
                {!! Form::number('KG', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Bonus', 'Bonus') !!}
                {!! Form::number('Bonus', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Exp_Date', 'Exp_Date') !!}
                {!! Form::date('Exp_Date', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Mfg_Date', 'Mfg_Date') !!}
                {!! Form::date('Mfg_Date', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Cost', 'Cost') !!}
                {!! Form::number('Cost', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Total Amount', 'Total Amount') !!}
                {!! Form::number('T_amount', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
        </div>

        @include('includes.form_errors')

    </div>


@endsection

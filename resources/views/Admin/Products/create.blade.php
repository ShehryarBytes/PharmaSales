@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>Add Products</h1>
        </div>

        <div class="well">
            {!! Form::open(['method' => 'POST','action' => 'ProductsController@store']) !!}

            <div class="form-group">
                {!! Form::label('Product Name', 'Product Name') !!}
                {!! Form::text('Product_Name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Batch No', 'Batch No') !!}
                {!! Form::text('batch', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {{ Form::hidden('user_id', $id) }}
            </div>

            <div class="form-group">
                {!! Form::label('Quantity', 'Quantity') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control','id'=>'quantity']) !!}
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
                {!! Form::label('Unit Price', 'Unit_Price') !!}
                {!! Form::number('Cost', null, ['class' => 'form-control','id' => 'u-price','onkeyup'=>'sum();']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Total Amount', 'Total Amount') !!}
                {!! Form::number('T_amount', null, ['class' => 'form-control','id'=>'total']) !!}
            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}

    @include('includes.form_errors')
            <script type="text/javascript">

                function sum() {

                    let txtFirstNumberValue = document.getElementById('quantity').value;
                    let txtSecondNumberValue = document.getElementById('u-price').value;

                    if (txtFirstNumberValue == 0)
                        txtFirstNumberValue = 0;
                    if (txtSecondNumberValue == 0)
                        txtSecondNumberValue = 0;

                    let result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                        document.getElementById('total').value = result;
                }


            </script>

</div>

@endsection

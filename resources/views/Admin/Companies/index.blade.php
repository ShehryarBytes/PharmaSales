@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Registered Companies</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Company Id</th>
                <th>Company Email</th>
                <th>Company Name</th>
                <th>Company License No</th>
                <th>Company Contact No</th>
                <th>Company Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($companies)
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->Company_Name}}</td>
                        <td>{{$company->Comany_Lisence_no}}</td>
                        <td>{{$company->C_contact}}</td>
                        <td>{{$company->C_adress}}</td>
                        <td><a href="{{ URL::to('companies/'.$company->id).'/edit' }}"><button type="submit" name="update" value="Update" class="btn btn-info btn-sm">Update</button></a></td>

                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['CompaniesController@destroy',$company->id]]) !!}

                            {!! Form::submit('Delete',['class'=>'form-control btn btn-danger btn-sm']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection

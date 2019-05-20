@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Employee Profile</h1>
        </div>
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="{{URL::to('images/'.$user->photo->file)}}" alt="" class="img-rounded img-responsive" />
                    <i class="fa fa-hand-grab-o">{{$user->role->name}}</i><h3>{{$user->name}}</h3>
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4>{{$user->name}}</h4>
                    <small><cite title="{{$user->adress}}">
                            <label>Adress</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->adress}}</span></cite></small>
                    <p>
                        <label>Email</label>&nbsp;<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->email}}</span>
                        <br/>
                        <label>Role</label>&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->role->name}}</span>
                        <br/>
                        <label>Gender</label>&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->gender}}</span>
                        <br/>
                        <label>DOB</label>&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->DOB}}</span>
                        <br/>
                        <label>Salary</label>&nbsp;<i class="fa fa-dollar"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->Salary}}</span>
                        <br/>
                        <label>Qualification</label>&nbsp;<i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->qualification}}</span>
                        <br/>
                        <label>Joining date</label>&nbsp;<i class="fa fa-calendar-times-o"></i>&nbsp;&nbsp;&nbsp;<span>{{$user->created_at}}</span></p>
                    <!-- Split button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">
                            Social</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span><span class="sr-only">Social</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                            <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Github</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
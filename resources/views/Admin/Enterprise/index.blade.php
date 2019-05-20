@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1>Enterprise Profile</h1>
        </div>
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="{{URL::to('images/'.$data->photo->file)}}" alt="" class="img-rounded img-responsive" />
                    <i class="fa fa-user-md">Owner</i><h3>{{$data->owner_name}}</h3>
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4>{{$data->name}}</h4>
                    <small><cite title="San Francisco, USA">{{$data->location}} <i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                    <p>
                        <i class="glyphicon glyphicon-envelope"></i>{{$data->email}}
                        <br/>
                        <i class="glyphicon glyphicon-globe"></i><a href="#">www.pharmasales.com</a>
                        <br />
                        <i class="glyphicon glyphicon-gift"></i>{{$data->created_at}}</p>
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
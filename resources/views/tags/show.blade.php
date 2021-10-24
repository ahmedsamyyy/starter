@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Show Post</h1>
            <a class="btn btn success" href="{{route('post')}}">allposts</a>
          </div>
      </div>
     
      <div class="col">
            <div class="form-group">
                <div class="card" style="width: 18rem;">
                    <img src="{{URL::asset($posts->photo)}}" class="card-img-top" alt="{{$posts->photo}}">
                    <div class="card-body">
                      <h5 class="card-title">{{$posts->title}}</h5>
                      <p class="card-text">S{{$posts->content}}</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
      </div>
    </div>
  </div>
@endsection
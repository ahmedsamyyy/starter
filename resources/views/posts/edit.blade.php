@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">ُEdite Post</h1>
          </div>
      </div>
     
      <div class="col">
          @if (count($errors) > 0)
          <ul>
              @foreach ($errors->all() as $item)
                  <li>
                      {{$item}}
                  </li>
              @endforeach
          </ul>
              
          @endif
        <form action="{{route('post.update',['id'=>$posts->id])}}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">title</label>
              <input type="text" name="title" value="{{$posts->id}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">content</label>
              <textarea class="form-control" name="content" rows="3">{{$posts->id}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">photo</label>
                <input type="file"  name="photo" value="{{$posts->id}}" class="form-control">
              </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">Update</button>
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection
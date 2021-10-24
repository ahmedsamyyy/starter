@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">CreatePost</h1>
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
        <form action="{{route('post.store')}}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">title</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              @foreach ($tags as $item)
              <input type="checkbox" name="tags[]" value="{{$item->id}}">
              <label for="">{{$item->tags}}</label>
              
              @endforeach
              
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">content</label>
              <textarea class="form-control" name="content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">photo</label>
                <input type="file"  name="photo" class="form-control">
              </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">save</button>
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection
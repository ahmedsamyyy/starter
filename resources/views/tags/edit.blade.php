@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Edit Post</h1>
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
        <form action="{{route('tag.edit',['id'=>$tags->id])}}" method='POST'>
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Name</label>
              <input type="text" name="tag" value="{{$tags->id}}" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">edit</button>
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection
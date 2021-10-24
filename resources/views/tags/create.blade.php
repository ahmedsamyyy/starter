@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">CreateTag</h1>

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
        <form action="{{route('tag.store')}}" method='POST'>
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Tags</label>
              <input type="text" name="tags" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">save</button>
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection
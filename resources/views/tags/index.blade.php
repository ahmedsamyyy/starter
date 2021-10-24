@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
              <div class="jumbotron">
                  <h1 class="display-4">Tag ALL</h1>
                  <a class="btn btn success" href="{{route('tag.create')}}">tag</a>
                </div>
      </div>
    <div class="row">
        @if ($tags->count() > 0)
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$item->tags}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('tag.edit',['id'=>$item->id])}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('tag.destroy',['id'=>$item->id])}}">Delete></i></a>
                        </td>
                      </tr>
                    @endforeach
                
                </tbody>
              </table>
              </table>
          </div>
        @else
        <div class="alert alert-primary" role="alert">
           No Any tags
          </div>
        @endif
    </div>
  </div>
@endsection

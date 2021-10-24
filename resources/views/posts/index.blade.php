@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
              <div class="jumbotron">
                  <h1 class="display-4">Post ALL</h1>
                </div>
      </div>
    <div class="row">
        @if ($posts->count() > 0)
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->user->name}}</td>
                        <td><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="100" height="100"></td>
                        <td>
                          <a class="btn btn-warning" href="{{route('post.show',['slug'=>$item->slug])}}">Show</a>
                            
                          <a class="btn btn-success" href="post/edit/{{$item->id}})">EDIT</a>
                          <a class="btn btn-danger" href="{{route('post.destroy',$item->id)}}">DELETE</a>
                        </td>
                      </tr>
                    @endforeach
                
                </tbody>
              </table>
              </table>
          </div>
        @else
        <div class="alert alert-primary" role="alert">
           No Any Posts
          </div>
        @endif
    </div>
  </div>
@endsection

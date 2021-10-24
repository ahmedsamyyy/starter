@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
              <div class="jumbotron">
                  <h1 class="display-4">students ALL</h1>
                </div>
      </div>
    <div class="row">
        @if ($car->count() > 0)
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($car as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$item->name}}</td>
                        <td><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="100" height="100"></td>
                        <td>
                            
                          <a class="btn btn-success" href="cars/edit/{{$item->id}})">EDIT</a>
                          <a class="btn btn-danger" href="{{route('cars.destroy',$item->id)}}">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                
                </tbody>
              </table>
              </table>
          </div>
        @else
        <div class="alert alert-primary" role="alert">
           No Any Cars
          </div>
        @endif
    </div>
  </div>
@endsection

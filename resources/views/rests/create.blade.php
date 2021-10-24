@extends('layouts.app')
@section('content')

<div class='container'>
<form action="{{route('rests.store')}}"method="POST">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Cars</label>
    <input type="text" name='name' class="form-control" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">photo</label>
    <input type="file"  name="photo" class="form-control">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-danger">Save</button>
</div>
</form>
</div
@endsection
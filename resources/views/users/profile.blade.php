@extends('layouts.app')

@section('content')
<div class='container'style='padding-top:3%'>
<form action="{{route('profile.update')}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">facebook</label>
    <input type="text" name="facebook" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control">
      <option value="male">male</option>
      <option value="female" >female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">bio</label>
    <textarea class="form-control" name="bio" rows="3"></textarea>
  </div>
  <div class="form-group">
    <button class="btn btn-success" type="submit">save</button>
  </div>
</form>
</div>
</form>
@endsection
@extends('layouts.app')

@section('content')
<form class="" action="/editarPerfil/{{$user->id}}" method="post">
@csrf
@method('patch')
<div class="row">
  <div class="col-md-4 offset-md-4">
    <input type="text" class="form-control form-header-input" id="name" name="name" value="{{$user->name}}">
  </div>
</div>
<div class="row">
  <div class="col-md-4 offset-md-4">
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
</div>
<div class="row">
  <div class="col-md-4 offset-md-4">
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
</div>

</form>
@endsection

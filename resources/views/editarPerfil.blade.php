@extends('layouts.app')

@section('content')
<form class="" action="/editarPerfil/{{$user->id}}" method="post" style="margin-top:50px;">
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
    <input type="gender" class="form-control" id="email" name="email" value="{{$user->gender}}"  disabled="disabled">
  </div>
</div>
@if (auth()->check() && auth()->user()->isAdmin())
  <select class="" name="">
    @forelse ($roles as $role)
      <option value="{{$role}}">{{$role}}</option>
    @empty
      <option value="">No hay opciones disponibles</option>
    @endforelse
  </select>
@else
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <input type="gender" class="form-control" id="email" name="email" value="{{$user->role}}"  disabled="disabled">
    </div>
  </div>
@endif
<div class="row">
  <div class="col-md-4 offset-md-4">
    <input type="file" name="avatarUrl" id="avatarUrl" >
  </div>
</div>
<div class="row">
  <div class="col-md-4 offset-md-4 form-footer-input">
    <button type="submit" class="btn btn-primary custom-btn">Guardar</button>
  </div>
</div>
</form>
@endsection

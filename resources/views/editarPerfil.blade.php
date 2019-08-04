@extends('layouts.app')

@section('content')
  <div class="row">
    <div style="margin-top:50px" class="col-md-4 offset-md-4">
        <a href="/cartHistory/{{$user->id}}">Historial de compra</a>
    </div>
  </div>
  <h1>Cambie su contraseña</h1>
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <form action="/passwordChange/{{$user->id}}, " method="get">
        @csrf
        <button>Cambiar contraseña</button>
      </form>
    </div>
  </div>
  <h1>Edite su perfil</h1>
  <form class="" action="/editarPerfil/{{$user->id}}" method="post">
    @csrf
    @method('patch')
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="text" class="form-control form-header-input {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{$user->name}}">
      </div>
    </div>
    @error('name')
      <div class="row">
        <div class="col-md-4 offset-md-4">
          {{$message}}
        </div>
      </div>
    @enderror
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{$user->email}}">
      </div>
    </div>
    @error('email')
      <div class="row">
        <div class="col-md-4 offset-md-4">
          {{$message}}
        </div>
      </div>
    @enderror
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="gender" class="form-control" id="email" name="gender" value="{{$user->gender}}"  disabled="disabled">
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

    @endif
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input class="{{ $errors->has('avatarUrl') ? 'is-invalid' : '' }}" type="file" name="avatarUrl" id="avatarUrl" >
      </div>
    </div>
    @error('avatarUrl')
      <div class="row">
        <div class="col-md-4 offset-md-4">
          {{$message}}
        </div>
      </div>
    @enderror
    <div class="row">
      <div class="col-md-4 offset-md-4 form-footer-input">
        <button type="submit" class="btn btn-primary custom-btn">Guardar</button>
      </div>
    </div>
  </form>
@endsection

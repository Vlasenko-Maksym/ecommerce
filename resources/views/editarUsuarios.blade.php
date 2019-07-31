@extends('layouts.app')

@section('content')
  <h2>Edición de usuarios</h2>
  <div class="container">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>E-mail</th>
          <th>Tipo de usuario</th>
          <th>Estado</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($userslist as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><select class="" name="">
              @forelse ($roles as $role)
                {{-- @dd($roles); --}}
                <option value="{{$role}}">{{$role}}</option>
              @empty
                <option value="">No hay opciones disponibles</option>
              @endforelse
            </select></td>
            <td>
              @if($user->deleted_at == null)
              <form class="" action="/editarUsuarios/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <button>Borrar</button>
              </form>
            @else
              <form class="" action="/editarUsuarios/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <button>Habilitar</button>
              </form>
            @endif
            </td>
            <td>
            <form class="" action="/editarPerfil/{{$user->id}}" method="get" enctype="mutlipart/form-data">
              @csrf
              <button>Editar Perfil</button>
            </form>
            </td>
          </tr>
        @empty
          <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection

@extends('layouts.app')

@section('content')
  <h2>Edición de usuarios</h2>
  <div class="container">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Tipo de usuario</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($userslist as $user)
          <tr>
            <td>{{}}</td>
            <td>{{}}</td>
            <td>form</td>
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

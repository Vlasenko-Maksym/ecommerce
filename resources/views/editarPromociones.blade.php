@extends('layouts.app')
@section('content')
  <h2>Edición de promociones</h2>
  <div class="container">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Porcentaje</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($promotions as $promotion)
          <tr>
            <td>{{$promotion->name}}</td>
            <td>{{$promotion->description}}</td>
            <td>{{$promotion->percentage}}</td>
            <td>
              @if($promotion->deleted_at == null)
              <form class="" action="/editarPromociones/{{$promotion->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <button>Borrar</button>
              </form>
            @else
              <form class="" action="/editarPromociones/{{$promotion->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <button>Habilitar</button>
              </form>
            @endif
            </td>
          </tr>

        @empty

        @endforelse
      </tbody>
    </table>

  </div>
@endsection

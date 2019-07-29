@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="" action="/agregarMarca" method="post">
      @csrf
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="text" class="form-control form-header-input" id="name" name="name" placeholder="Ingrese la marca...">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="file" name="logoUrl" id="logoUrl" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <select class="form-control" name="statusId" id="statusId">
            @forelse ($statuses as $status)
            <option value="{{$status->id}}">{{$status->name}}</option>
            @empty
            <option>No hay estados disponibles</option>
            @endforelse
          </select>
          {{-- No puedo visualizar los nombres de los estados, porque?--}}
        </div>
      </div>
    {{-- como hago para que un campo select del formulario, no envíe un valor por el formulario y que al marcalo pueda activar por javascript una clase?? --}}
      <div class="row">
        <div class="col-md-4 offset-md-4 form-footer-input">
          <button type="submit" class="btn btn-primary custom-btn">Guardar marca</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top:50px;">
    <form class="" action="/agregarPromocion" method="post">
      @csrf
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="text" class="form-control form-header-input" id="name" name="name" placeholder="Ingrese el nombre de la promoción">
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <textarea class="form-control" id="promotion-description-input" name="description" rows="3"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Ingrese el porcentaje de descuento">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-4 form-footer-input">
            <button type="submit" class="btn btn-primary custom-btn">Guardar promoción</button>
          </div>
        </div>
      </form>
      {{-- <h2>Promociones disponibles</h2>
      <p>Estas son todas las promociones disponibles al momento</p>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Porcentaje</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($promotions as $promotion)
            <tr>
              <td>{{$promotion->name}}</td>
              <td>{{$promotion->percentage}}</td>
              <td>{{$promotion->description}}</td>
            </tr>
          @empty
            <tr>
              <td>-</td>
              <td>-</td>
              <td>-</td>
            </tr>
          @endforelse
        </tbody>
      </table> --}}
    </div>
  @endsection

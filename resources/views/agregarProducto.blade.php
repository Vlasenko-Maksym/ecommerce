@extends('layouts.app')

@section('content')
  <div class="container-fluid addproduct-form-container">
    <form class="addproduct" action="/agregarProducto" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="text" class="form-control form-header-input" id="name" name="name" placeholder="Ingrese el nombre del producto...">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese el precio...">
        </div>
      </div>
      <div class="row">
        <div class="form-check form-check-inline col-md-4 offset-md-4">
          <input class="form-check-input" type="radio" name="category" id="category1" value="MASCULINO">
          <label class="form-check-label" for="inlineRadio1">Masculino</label>
        </div>
        <div class="form-check form-check-inline col-md-4 offset-md-4">
          <input class="form-check-input" type="radio" name="category" id="category2" value="FEMENINO">
          <label class="form-check-label" for="inlineRadio2">Femenino</label>
        </div>
        <div class="form-check form-check-inline col-md-4 offset-md-4">
          <input class="form-check-input" type="radio" name="category" id="category3" value="UNISEX">
          <label class="form-check-label" for="inlineRadio3">Unisex</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese cantidad disponible...">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <select class="form-control" name="promotionId" id="promotionId" placeholder="Seleccione promoción...">
            @forelse ($promotions as $promotion)
            <option value="{{$promotion->id}}">{{$promotion->name}}</option>
            @empty
            <option>No hay promociones creadas</option>
            @endforelse
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <select class="form-control" name="brandId" id="brandId" placeholder="Seleccione marca...">
            @forelse ($brands as $brand)
            <option value="{{$brands->id}}">{{$brands->name}}</option>
            @empty
            <option>No hay marcas disponibles</option>
            @endforelse
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-4">
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="file" name="logoUrl" id="logoUrl" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4 form-footer-input">
          <button type="submit" class="btn btn-primary custom-btn">Guardar producto</button>
        </div>
      </div>
    </form>
  </div>


  {{-- /*si no tengo marcas cargas, me tira errores si quiero guardar un producto, como lo soluciono?? El problema es que no puedo guardar un producto si no tengo creadas marcas y promociones.*/ --}}
@endsection

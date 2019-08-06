@extends('layouts.app')
@section('content')

<br>
<br>
<div class="container-fluid addproduct-form-container">
  <form class="addproduct" action="/editarProducto/{{$product->id}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="text" class="form-control form-header-input {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{$product->name}}">
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('name')
            {{$message}}
          @enderror
        </div>
      </div>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" value="{{$product->price}}">
      </div>
    </div>
    <div class="row">
       <div class="col-md-4 offset-md-4">
         @error('price')
           {{$message}}
         @enderror
       </div>
     </div>

    <div class="row">
      <div class="form-check form-check-inline col-md-4 offset-md-4 {{ $errors->has('category') ? 'is-invalid' : '' }}">
        @if($product->category=="MASCULINO")
            <input class="form-check-input" type="radio" name="category" id="category1" value="MASCULINO" checked>
        @else
            <input class="form-check-input" type="radio" name="category" id="category1" value="MASCULINO">
        @endif
        <label class="form-check-label" for="inlineRadio1">Masculino</label>
      </div>
      <div class="form-check form-check-inline col-md-4 offset-md-4">
        @if($product->category=="FEMENINO")
            <input class="form-check-input" type="radio" name="category" id="category1" value="FEMENINO" checked>
        @else
            <input class="form-check-input" type="radio" name="category" id="category1" value="FEMENINO">
        @endif
        <label class="form-check-label" for="inlineRadio2">Femenino</label>
      </div>
      <div class="form-check form-check-inline col-md-4 offset-md-4">
        @if($product->category=="UNISEX")
            <input class="form-check-input" type="radio" name="category" id="category1" value="UNISEX" checked>
        @else
            <input class="form-check-input" type="radio" name="category" id="category1" value="UNISEX">
        @endif
        <label class="form-check-label" for="inlineRadio3">Unisex</label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        @error('category')
          {{$message}}
        @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" id="stock" name="stock" value="{{$product->stock}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        @error('stock')
          {{$message}}
        @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <select class="form-control {{ $errors->has('promotionId') ? 'is-invalid' : '' }}" name="promotionId" id="promotionId" value="{{$product->promotion}}">
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
         @error('promotionId')
           {{$message}}
         @enderror
       </div>
     </div>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <select class="form-control {{ $errors->has('brandId') ? 'is-invalid' : '' }}" name="brandId" id="brandId" value="{{$product->brand}}">
          @forelse ($brands as $brand)
          <option value="{{$brand->id}}">{{$brand->name}}</option>
          @empty
          <option>No hay marcas disponibles</option>
          @endforelse
        </select>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('brandId')
            {{$message}}
          @enderror
        </div>
      </div>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="3">{{$product->description}}</textarea>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('description')
            {{$message}}
          @enderror
        </div>
      </div>

    <div class="row">
      <div class="col-md-4 offset-md-4 {{ $errors->has('logoUrl') ? 'is-invalid' : '' }}">
        <input type="file" name="logoUrl" id="logoUrl" >
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('logoUrl')
            {{$message}}
          @enderror
        </div>
      </div>
    <div class="row">
      <div class="col-md-4 offset-md-4 form-footer-input">
        <input type="button" onclick="location.href = '/editarProductos';"  name="" value="Cancelar">
        <input type="reset" name="" value="Resetear">
        <button type="submit" class="btn btn-primary custom-btn">Guardar</button>
      </div>
    </div>
  </form>
</div>













@endsection

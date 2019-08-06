@extends('layouts.app')

@section('content')

<div class="wrapper">
  <div class="row">
      @foreach ($brands as $brand)
      <div class="catBrName col-12">
        <h1>{{$brand->name}}</h1>
      </div>
        @foreach ($products as $product)
          @if ($brand->id == $product->brandId)
          <div class="row prodFila">
            <div class="descProd col-4">
              <p>
                <h2>{{$product->name}}</h2>
                {{$product->description}}
              </p>
            </div>
            <div class="prodCont col-4">
              <img class="imgProdTod" src="/imagenes/product/{{$product->logoUrl}}" alt="{{$product->name}}">
              <p>u$s {{$product->price}}</p>
              <button class="btn btn-primary">Agregar al carrito</button>
              <button class="btn btn-primary">Comprar</button>
            </div>
          </div>
          @endif
        @endforeach
      @endforeach
  </div>
</div>


@endsection
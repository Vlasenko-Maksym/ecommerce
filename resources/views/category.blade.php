@extends('layouts.app')

@section('content')

  @forelse ($products as $producto)
    <br>
    <br>
    <br>
    <p>Nombre: {{$producto->name}}</p>
    <p>Descripción: {{$producto->description}}</p>
    <p>Precio: {{$producto->price}}</p>
    <img src="/storage/products/{{ $producto->logoUrl}}" alt="">
    <p>
      <form class="" action="/cart" method="post">
      @csrf
      <input type="number" name="quantity" value="" placeholder="Cantidad">
      {{$errors->first('quantity')}}
      <input type="hidden" name="id" value="{{$producto->id}}">
      <p></p>
      <button type="submit">Agregar al carrito</button>
    </form>
  </p>
<p>
<form class="" action="/paymentFlow" method="get">
  <button>Comprar ahora</button>
</form>
</p>
@empty
  <p style="margin-top:50px;">No hay productos para esta marca.</p>
@endforelse

@endsection

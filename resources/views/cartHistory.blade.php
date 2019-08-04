@extends('layouts.app')

@section('content')
  <h2>Historial de compra</h2>

@forelse ($carts as $cart)
  <div class="container">
    <table class="table table-condensed">
      <caption>{{$cart[0]->cartNumber}}</caption>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Estado</th>
          <th>Precio unitario</th>
          <th>Subtotal</th>
          <th>Total</th>
        </tr>
      </thead>
      <tfoot>
          <tr>
            <td colspan="5">Total</td>
            <td>{{118}}</td>
          </tr>
        </tfoot>
      <tbody>
        @foreach ($cart as $item)
          <tr>
            <td>{{$item->cartNumber}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        @endforeach
@empty

@endforelse

@endsection

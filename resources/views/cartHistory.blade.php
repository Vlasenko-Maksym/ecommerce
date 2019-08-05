@extends('layouts.app')

@section('content')
@php
$total=0;
@endphp
  <h1 style="margin-top:50px">Mis carritos</h1>
  @forelse ($carts as $cart)
    <div class="container">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th colspan="5" scope="colgroup">Orden de compra #: {{$cart[0]->cartNumber}}</th>
          </tr>
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Precio unitario</th>
            <th>Total</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="4">Total</td>
            <td>
              {{1}}
            </td>
          </tr>
        </tfoot>
        @foreach ($cart as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>@if ($item->status == 1)
              {{"Pagado"}}
            @endif</td>
            <td>{{$item->price}}</td>
            <td>{{$item->price * $item->quantity}}</td>
          </tr>
        @endforeach
      @empty
        <p>No tiene historial de carritos</p>
      </table>
    </div>
    <br>
  @endforelse



@endsection

@extends('layouts.app')

@section('content')
  <h1 style="margin-top:50px;" >Resumen de compra</h1>
    <section>
      <article>
        <ul>
          @forelse ($carts as $item)
              <li>Producto: {{$item->name}} | Cantidad: {{$item->quantity}} | Precio: {{$item->price}} | Sub-total: {{$item->price * $item->quantity}} <a href="/delete/{{$item->id}}">Eliminar</a></li>
          @empty
            <p>Su carrito está vacío.</p>
          @endforelse
        </ul>
      </article>
      <p>Total: {{$purchaseTotal}}</p>
    </section>
    <form class="" action="/paymentFlow" method="get">
      @csrf
      <button type="submit">Comprar</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h1 class="card-title"style="margin-top:50px;" >Resumen de compra</h1>
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
        <button class="btn btn-primary"type="submit">Comprar</button>
      </form>
  </div>

</div>

@endsection

@extends('layouts.app')

@section('content')
<br><br>
  <div class="containerCategory" style="background-image:url('/{{$brands[$id]->wallpaper}}')">
    <div class="row justify-content-center">
      <div class="nBrand">
        {{-- {{dd($brands[$id-1]->name)}} --}}
        <h1>{{$brands[$id-1]->name}}</h1>
      </div>
    </div>
    <div class="row filProd">
      <div class="colProd col-6">
        @foreach ($products as $producto)
          <nav class="menuMod">
            <ul>
              <li><a href="/brand/{{$id}}/{{$producto->id}}"><button type="button" class="btn btn-outline-secondary btnMenuMod">{{$producto->name}}</button></a></li>
            </ul>
          </nav>
        @endforeach
      </div>
    </div>
    <div class="row rModelo">
      <div class="col-4 imProd">
        <img style="width:300px;" src="/storage/products/{{$item->logoUrl}}" alt="{{$item->name}}">
      </div>
      <div class="col-4 descProd">
        <p style="font-size:20px;">{{$item->description}}</p>
        <form action="/cart" method="POST">
          @csrf
          <input value="{{$item->id}}" name="prod" type="hidden">
          <h3>u$s {{$item->price}}</h3>
          <input type="number" name="quantity" value="" placeholder="Cantidad">
          {{$errors->first('quantity')}}
          <input type="hidden" name="id" value="{{$item->id}}">
          <button class="btn btn-primary" type="submit">Agregar al carrito</button>
        </form>
        <br>
        <form class="" action="/paymentFlow" method="get">
          <button class="btn btn-primary">Comprar</button>
        </form>
      </div>
    </div>
</div>
@endsection

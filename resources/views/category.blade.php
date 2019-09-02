@extends('layouts.app')

@section('content')

  <div class="containerCategory" style="background-image:url('/{{$brands[$id]->wallpaper}}')">

    <div class="row filProd">
      <div class="colProd col-12">
        <nav class="menuMod">
          <ul>
            <li style="float:left;margin:0 15px; font-size:30px;">{{strtoupper ($brands[$id-1]->name)}}</li>
          @foreach ($products as $producto)
              <li style="float:left;margin:0 1px;"><a href="/brand/{{$id}}/{{$producto->id}}"><button type="button" class="btn btn-dark btnMenuMod">{{$producto->name}}</button></a></li>
          @endforeach
      </ul>
    </nav>
      </div>
    </div>
    <div class="row rModelo">
      <div class="col-4 imProd">
        <img style="width:300px;" src="/storage/products/{{$item->logoUrl}}" alt="{{$item->name}}">
      </div>
      <div class=" card col-4 descProd">
        <p style="font-size:25px;">{{$item->name}}</p>
        <p style="font-size:25px;">{{$item->description}}</p>
        <form action="/cart" method="POST">
          @csrf
          <input value="{{$item->id}}" name="prod" type="hidden">
          <h3>u$s {{$item->price}}</h3>
          <input type="number" name="quantity" value="" placeholder="Cantidad">
          {{$errors->first('quantity')}}
          <input type="hidden" name="id" value="{{$item->id}}">
          <button class="btn btn-dark btnMenuMod" type="submit">Agregar al carrito</button>
        </form>
        <br>
        <form class="" action="/paymentFlow" method="get">
          <button class="btn btn-dark btnMenuMod">Comprar</button>
        </form>
      </div>
    </div>
</div>
@endsection

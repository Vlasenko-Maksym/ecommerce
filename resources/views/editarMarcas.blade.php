@extends('layouts.app')
@section('content')
<div class="row justify-content-center" style="margin-top:70px;"> 
    <div class="ContBrand col-4" >
    <ul>
      @foreach($brandsEdit as $brand)
      <li>
        <label for="LogoProducto">  <img src="{{$brand->logoUrl}}" class="imgBrandEdit" alt=""></label>
        @if($brand->deleted_at==NULL)
        <a href="/eliminarMarca/{{$brand->id}}" ><img src="https://img.icons8.com/color/48/000000/switch-on--v2.png"></a> Habilitada
        @else
        <a href="/habilitarMarca/{{$brand->id}}" ><img src="https://img.icons8.com/color/48/000000/switch-off--v2.png"></a> Deshabilitada
        @endif
      </li>
      @endforeach
    </ul>
  </div>
  </div>



@endsection

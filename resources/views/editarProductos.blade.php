@extends('layouts.app')
@section('content')

<div class="row justify-content-center contlistprod" style="margin: 50px auto 50px auto;">
  <table class="table">
<th>
  <tr>
    <th scope="col"></td>
    <th scope="col">#</td>
    <th scope="col">NOMBRE</td>
    <th scope="col">PRECIO</td>
    <th scope="col">STOCK</td>
    <th scope="col">CATEGORIA</td>
    <th scope="col">MARCA</td>
    <th scope="col">OPCIONES</td>
  </tr>
  </th>
  <tbody>

  @foreach($products as $product)
    <tr>
      <td><img class="logoProdEdit"src="/storage/products/{{$product->logoUrl}}" alt=""></td>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->stock}}</td>
      <td>{{$product->category}}</td>
      <td>{{$product->brandId}}</td>
      <td>@if($product->deleted_at==NULL)

         <a href="/eliminarProducto/{{$product->id}}" ><img src="https://img.icons8.com/color/48/000000/switch-on--v2.png"></a> Habilitado<BR>
         <a href="/editarProductos/{{$product->id}}" ><img style="padding-left:6px;"class="imgEditarProd"src="https://img.icons8.com/metro/52/000000/edit-property.png"></a> Editar
      @else
          <a href="/habilitarProducto/{{$product->id}}" ><img src="https://img.icons8.com/color/48/000000/switch-off--v2.png"></a> Deshabilitado
      @endif
      </td>
    </tr>
@endforeach
<tbody>
</table>
</div>



@endsection

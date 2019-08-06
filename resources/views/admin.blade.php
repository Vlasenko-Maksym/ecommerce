@extends('layouts.app')

@section('content')


<div class="row justify-content-center" style="margin:70px 0 50px 0;">
  <div class="col-6 ">
    <h1>ADMIN BACKOFFICE</h1>
    <div class="row">
      <div class="col-3">
        <p>
          <a class="badge badge-info" href="/agregarMarca">Agregar marcas</a>
        </p>
        <p>
          <a class="badge badge-info" href="/agregarProducto">Agregar productos</a>
        </p>
        <p>
          <a class="badge badge-info" href="/editarProductos">Editar Productos</a>
        </p>
      </div>
      <div class="col-3">
        <p>
          <a class="badge badge-info" href="/editarMarcas">Editar Marcas</a>
        </p>
        <p>
          <a class="badge badge-info" href="/agregarPromocion">Agregar Promociones</a>
        </p>
        <p>
          <a class="badge badge-info" href="/editarUsuarios">Agregar usuarios</a>
        </p>
      </div>
    </div>


  </div>

</div>

@endsection

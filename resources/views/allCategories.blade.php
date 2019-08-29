@extends('layouts.app')

@section('content')

<br>
<div class="containerBuscador col" >
  <div class="row barraBuscador">


          <input class="form-control mr-sm-2 col-2" id="buscador" type="search" placeholder="Buscar por nombre" aria-label="Search">
          <input class="form-control mr-sm-2 col-1"  id="precioMin" placeholder="Precio minimo">
          <input class="form-control mr-sm-2 col-1"  id="precioMax" placeholder="Precio maximo">
          <select class="form-control  col-1" id="genero">
             <option>Genero</option>
             <option value="Femenino">Femenino</option>
             <option value="Masculino">Masculino</option>
          </select>
          <div class="col-1">
          </div>
          <div class="col-6 row ">
            <ul class="d-flex align-items-center justify-content-arround " style="margin:0;">
              @foreach ($brands as $brand)
              @if($brand->id !== 6)
                <li style="font-size:18px;padding:0 5px;">
                  <input class="checkBrand" type="checkbox" value="{{$brand->name}}" id="{{$brand->name}}Check" checked>
                  <label class="form-check-label " style="padding:0 10px;"for="{{$brand->name}}Check">
                    {{$brand->name}}&nbsp;
                  </label>
                </li>
              @endif
              @endforeach
            </ul>
          </div>
      </div>
      <div class="allCategoriesProducts row justify-content-arround" id="tablaProductos" style="margin:0 auto;">
        <h1 class="justify-content-center col-12 noSeEncuentranResultados" id="NoSeEncuentranResultados">Ups! No se encuentran resultados para tu busqueda.</h1>
        @foreach ($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 productoCardCont" id='id-{{$product->id}}' style="margin:0;">
          <div class=" cardnew row justify-content-center aling-items-center"  name="tarjProductos" >
            <img class="imgCardProd col-7 " src='/storage/products/{{$product->logoUrl}}' alt='{{$product->name}}' />
            <div class="col-12 nameCardProd" style="font-size:15px">
              {{substr($product->name, 0, 23)}}
            </div>
            <div class="col-12 precioCardProd">
                ${{round($product->price)}}
            </div>
            <div class="row col-12 precioCardVerProd" style="background-color:white;">
              @foreach ($brands as $brand)
                @if($brand->id == $product->brandId)
                  <img class=" col-6 align-self-center brandImgProd"  id='imgBrandAllCategories'src='/{{$brand->logoUrl}}' alt='{{$brand->name}}' />
                @endif
              @endforeach
              <div class="col-6 verMasCardProd justify-content-center align-items-center">
                <a href="/brand/{{$product->brandId}}/{{$product->id}}" >Ver más</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  <br>
</div>


@endsection
@section('scriptProductos')
<script>


  //buscar addEventListener

  buscador= document.getElementById("buscador");
  precioMin= document.getElementById("precioMin");
  precioMax= document.getElementById("precioMax");
  genero= document.getElementById('genero');
  CartierCheck=document.getElementById('CartierCheck');
  RolexCheck=document.getElementById('RolexCheck');
  IWCCheck=document.getElementById('IWC SchaffhausenCheck');
  PatekCheck=document.getElementById('PatekCheck');
  OmegaCheck=document.getElementById('OmegaCheck');
  tablaProductos= document.getElementById('tablaProductos');
  tarjProductos=tablaProductos.getElementsByTagName('div');
  NoSeEncuentranResultados = document.getElementById('NoSeEncuentranResultados');
  filtrarBtn =document.getElementById('filtrar');
  productoCardCont = document.getElementsByClassName('productoCardCont');
  var arrayJS=<?php echo json_encode($products);?>;

  window.onload = function(){

    filtrar(arrayJS);
  };

  function filtrar(arrayJS){
    console.log('filtrar');
    var lista=[];

    //filtrar por genero
    var filtroGenList =[];
    for (var i = 0; i < arrayJS.length; i++) {
      if (arrayJS[i].category!=='FEMENINO' && genero.value=='Femenino') {
        filtroGenList.push(arrayJS[i].id);
      }else if (arrayJS[i].category!=='MASCULINO' && genero.value=='Masculino') {
        filtroGenList.push(arrayJS[i].id);
      }
    }
    //filtrar por genero fin
    //filtrar por marcas
      var filtroBrandList=[];
      var brandsCheked=[];
      if (!CartierCheck.checked) {
       brandsCheked.push(1);
      }
      if (!RolexCheck.checked) {
        brandsCheked.push(5);
      }
      if (!IWCCheck.checked) {
        brandsCheked.push(2);
      }
      if (!PatekCheck.checked) {
        brandsCheked.push(4);
      }
      if (!OmegaCheck.checked) {
        brandsCheked.push(3);
      }
      for (var i = 0; i < arrayJS.length; i++) {
        for (var b = 0; b < brandsCheked.length; b++) {
          if (arrayJS[i].brandId == brandsCheked[b]) {
            filtroBrandList.push(arrayJS[i].id);
          }
        }
      }
      //filtrar por marcas fin
      //filtrar por precio
      var filtroPriceList = [];
      if (precioMin.value.length!==0 && precioMax.value.length!==0) {
        for (var i = 0; i < arrayJS.length; i++) {
          var redondeado = Math.round(arrayJS[i].price);
          if (redondeado<precioMin.value || redondeado>precioMax.value) {
            filtroPriceList.push(arrayJS[i].id);
          }
        }
      }else if (precioMin.value.length!==0) {
        for (var i = 0; i < arrayJS.length; i++) {
          var redondeado = Math.round(arrayJS[i].price);
          if (redondeado<precioMin.value) {
            filtroPriceList.push(arrayJS[i].id);
          }
        }
      }else if (precioMax.value.length!==0) {
        for (var i = 0; i < arrayJS.length; i++) {
          var redondeado = Math.round(arrayJS[i].price);
          if (redondeado>precioMax.value) {
            filtroPriceList.push(arrayJS[i].id);
          }
        }
      }
      //filtrar por precio fin
      //filtrar por nombre
      var filtroNameList=[];
      var nombreABuscar = buscador.value.toLowerCase();
      if (nombreABuscar.length!==0) {
        for (var i = 0; i < arrayJS.length; i++) {
          name= arrayJS[i].name.toLowerCase();
          if (!name.includes(nombreABuscar)) {
            filtroNameList.push(arrayJS[i].id);
          }
        }
      }
      //filtrar por nombre fin


      //Unificamos busquedas

    lista = filtroGenList.concat(filtroBrandList, filtroPriceList, filtroNameList);

    cargarDatos(lista);
  }

  function cargarDatos(lista){
    var eliminados=0;
      productoCardCont = document.getElementsByClassName('productoCardCont');
    for (i = 0; i < tarjProductos.length; i++) {

        tarjProductos[i].style.display = "flex";

    }
    if (lista.length>0) {
      for (var listaI = 0; listaI < lista.length; listaI++) {
        productoId= document.getElementById("id-"+lista[listaI]);
        productoId.style.display="none";
      }
    }
      for (i = 0; i < tarjProductos.length; i++) {
        if (tarjProductos[i].style.display=="none") {
         eliminados = eliminados + 1;
        }
    }
    if (eliminados==productoCardCont.length) {
      NoSeEncuentranResultados.style.display="flex";
    }else{
      NoSeEncuentranResultados.style.display="none";
    }
}

  buscador.onkeyup = function(){filtrar(arrayJS)};
  precioMin.onkeyup = function(){filtrar(arrayJS)};
  precioMax.onkeyup = function(){filtrar(arrayJS)};
  genero.onchange = function(){filtrar(arrayJS)};
  CartierCheck.onclick = function(){filtrar(arrayJS)};
  RolexCheck.onclick = function(){filtrar(arrayJS)};
  IWCCheck.onclick = function(){filtrar(arrayJS)};
  PatekCheck.onclick = function(){filtrar(arrayJS)};
  OmegaCheck.onclick = function(){filtrar(arrayJS)};


</script>
@stop

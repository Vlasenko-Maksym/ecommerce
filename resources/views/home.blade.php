@extends('layouts.app')


@section('content')

  <div class="main-container">

    <section class="main-banner">
      <!-- banner 1 -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imagenes/patekbanner.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="imagenes/rolexbanner.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="imagenes/iwcbanner.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <section class="accionables-container container">
      <!-- links y arituclos de productos  -->
      <div class="row">
        <div class="col1 col-sm">
          <div class="link prod1">
            <a href="#">
              <img class="destacado" src="imagenes/accionables/iwcman.jpg" alt="">
            </a>
          </div>
          <div class="link prod2">
            <a href="#">
              <img class="destacado" src="imagenes/accionables/omegamujer.jpg" alt="">
            </a>
          </div>
          <div class="link art1">
            <a href="#">
              <img class="destacado" src="imagenes/accionables/relojpatek.jpg" alt="">
            </a>
          </div>
          <div class="link art2">
            <a href="#">
              <img class="destacado" src="imagenes/accionables/rolexmen.jpg" alt="">
            </a>
          </div>
        </div> <!-- fin div col1-->
        <div class="col2 col-sm">
          <a href="#">
            <img class="relojpromo" style="width:100%;" src="imagenes/accionables/applewatch.jpg" alt="">
          </a>
        </div> <!-- fin div col2-->
      </div> <!-- fin div row-->
    </section>
  @endsection

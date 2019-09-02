@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.x/css/bootstrap.min.css">
  <div class="main-container">

    <section class="main-banner">
      <!-- video presentacion -->
      <video src="videos/rolex.mp4" autoplay loop muted>

      </video>
    </section>

      <!-- carosuel de productos home -->
      <div class="container-fluid">
        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-10 mxauto" role="listbox">
                <div class="carousel-item col-md-4 active">

                <img class="img-fluid mx-auto d-bloc" src="/imagenes/relojes/OMEGA/speedmaster.png" alt="slide 1">
                <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/ROLEX/DAY-DATE.PNG" alt="slide 2">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/ROLEX/DAY-JUST.PNG" alt="slide 3">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/ROLEX/DAY-JUSTM.PNG" alt="slide 4">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/ROLEX/SEA-DWELLER.PNG" alt="slide 5">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/ROLEX/SHADOW.PNG" alt="slide 6">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/OMEGA/globemaster.png" alt="slide 7">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/OMEGA/ladymatic.png" alt="slide 7">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/OMEGA/seamaster.png" alt="slide 7">
                    <a href="#"></a>
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="/imagenes/relojes/OMEGA/specialities.png" alt="slide 7">
                    <a href="#"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <section class= "container-words">
     <div class="container-palabras">

       <h2>¿POR QUÉ COMPRAR NUESTROS RELOJES?</h2>
       <h4>Nuestra historia se remonta a principios del siglo XX. Con mas de 100 años de trayectoria encontramos el balance perfecto
         entre calidad y diseño, haciendo que nuestros productos sean unos de los mas finos del mercado.<br> </br>
        Estamos comprometidos a lograr que tu tiempo valga la pena, por eso al usar nuestros relojes nunca llegarás tarde a ningun lado.</h4>
     </div>
   </section>


  @endsection

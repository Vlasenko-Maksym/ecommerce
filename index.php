<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("head.php") ?>
  <body>
    <section>
        <?php include "barramenu.php";?>
    </section>
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
      <section class="accionables-container">
        <!-- links y arituclos de productos  -->
        <article class="col1">
          <div class="link prod1">
            <a href="#">
              <img src="imagenes/accionables/iwcman.jpg" alt="">
            </a>
          </div>
          <div class="link prod2">
            <a href="#">
              <img src="imagenes/accionables/omegamujer.jpg" alt="">
            </a>
          </div>
          <div class="link art1">
            <a href="#">
              <img src="imagenes/accionables/relojpatek.jpg" alt="">
            </a>
          </div>
          <div class="link art2">
            <a href="#">
              <img src="imagenes/accionables/rolexmen.jpg" alt="">
            </a>
          </div>
        </article>
        <article class="col2">
          <a href="#">
            <img class="relojpromo" src="imagenes/accionables/applewatch.jpg" alt="">
          </a>
        </article>
      </section>
      <section>
        <!-- banner 2  -->
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
      <section>
        <!-- footer -->
      </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

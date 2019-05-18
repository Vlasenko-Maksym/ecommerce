<?php
include("funciones.php");
$errores1 = [];
$errores2 = [];
//identifica de que formulario viene

if ($_POST && $_POST["form"]=="form1"){
  if($_POST){
    //Validar Login
    $errores1 = validarLogin($_POST);
    if(empty($errores1)){
      loguearUsuario($_POST["email"]);
    }
  }
}else if($_POST && $_POST["form"]=="form2"){
  $errores2= validarRegistro($_POST);
  if (empty($errores2)) {
    $usuario= armarUsuario();
    guardarUsuario($usuario);
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["avatar"]["tmp_name"], "imgUser/". $_POST["email"]. "." .$ext);
  }  } ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php
    require_once("head.php");
    ?>
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
      <section>
        <!-- Footer  -->
        <?php include ("footer.php") ?>
      </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

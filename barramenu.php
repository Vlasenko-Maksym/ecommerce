<nav>
      <div class="container-fluid menu shadow-sm bg-white rounded">
            <div class="row bg-light text-dark align-middle accordion" id="padre">
                  <!-- EN DISPOSITIVOS CHICOS-->
                  <div class="col-sm-12 col-md-12 col-lg-8 logo">
                        <a class="text-dark" href="#">BLACK<img class="logoimg" src="imagenes/blackfox.png" alt="logo">FOX</a>

                  </div>
                  <div class="col-sm-6 col-md-6  col-lg-2 marcas ">
                        <a  class="btnmenu"data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas">Galeria</a>
                  </div>

                  <div class="col-sm-6  col-md-6  col-lg-2  registro">
                        <a class="btnmenu"data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro" >Login</a>
                        <img src="imagenes\carro-compra3.png" alt="">
                  </div>
                  <div class="collapse mycollapse" id="collapseMarcas" data-parent="#padre">
                        <div class="card card-body mycard">
                              <a href="#"><img class="imgmarcas" src="imagenes\imgmarcas\omega.png" alt="imgomega"></a>
                              <a href="#"><img class="imgmarcas" src="imagenes/imgmarcas/cartier.png" alt="imgcartier"></a>
                              <a href="#"><img class="imgmarcas" src="imagenes\imgmarcas\Patek-Philippe.png" alt="imgPatek"></a>
                              <a href="#"><img class="imgmarcas" src="imagenes\imgmarcas\IWC_Schaffhausen_Logo.png" alt="imgIWCSchaffhausen"></a>
                              <a href="#"><img class="imgmarcas" src="imagenes/imgmarcas/rolex.png" alt="imgrolex"></a>
                              <a href="#"><img class="imgmarcas" src="imagenes\imgmarcas\Jaeger-leCoultre.png" alt="imgJaeger"></a>
                            <a href="#"> <div class="vertodas">Ver Todas +</div></a>



                        </div>
                  </div>
                <!-- BOTON REGISTRO -->
                  <div class="collapse mycollapse" id="collapseRegistro" data-parent="#padre">
                        <div class="card ">
                              <div class="card-body">
                                  <?php include "login.php";?>
                              </div>
                        </div>
                  </div>

            </div>
      </div>
</nav>

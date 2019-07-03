<nav>
        <div class="container-fluid menu shadow-sm bg-white rounded">
              <div class="row bg-light text-dark align-middle accordion" id="padre">
                    <div class=" col-md-4 col-lg-6 logo">
                          <a class="text-dark" href="index.php">BLACK<img class="logoimg" src="imagenes/blackfox.png" alt="logo">FOX</a>
                    </div>
                    <div class=" col-md-4  col-lg-3 marcas ">
                          <a class="menuLink" data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas">Galeria</a>
                    </div>
                    <div class=" col-md-4  col-lg-3  registro">
                      <?php if ($auth->usuarioLogueado()): ?>
                        <a  class="menuLink"data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro" >Hola, <?= $usuario->getName();?></a>
                        <a  href="logout.php"><img class="btnMeDesk"src="imagenes\logout.png" alt=""></a>
                      <?php else: ?>
                        <a class="menuLink"data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro" >Login</a>
                      <?php endif; ?>
                      <a data-toggle="collapse" href="#collapseCarro" role="button" aria-expanded="false" aria-controls="collapseCarro"><img class="btnMeDesk"src="imagenes\carro-compra3.png" alt=""></a>
                    </div>
                    <div class="collapse mycollapse carro " id="collapseCarro" data-parent="#padre">
                      <div class=" card card-body mycard">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
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
                    <div class="<?php if(empty($errores1) && empty($errores2)) {echo "collapse ";} ?>mycollapse" id="collapseRegistro" data-parent="#padre">
                      <!--modificacion para que abra automaticamente si hay errores-->
                          <div class="card ">
                                <div class="card-body">
                                  <?php if ($auth->usuarioLogueado()): ?>
                                    <div class="row">
                                      <div class="col-xs-12  col-md-6  usercard">
                                        <img class="imguserlog"src="imguser/<?= $usuario->getEmail() . ".jpg"?>" alt="">
                                      </div>
                                      <div class="col-xs-12  col-md-6  usercard2">
                                          <ul>
                                                <br>
                                                <li><?= "Nombre : ".$usuario->getName(); ?></li>
                                                <li><?= "Email : ".$usuario->getEmail(); ?></li>
                                                <li><?= "Genero : ".$usuario->getGenero(); ?></li>
                                                <hr>
                                                <li>LOGOUT<a  href="logout.php"><img class="btnMeDesk"src="imagenes\logout.png" alt=""></a></li>
                                          </ul>
                                      </div>
                                    </div>
                                  <?php else: include "login.php";?>
                                  <?php endif; ?>

                                </div>
                          </div>
                    </div>

              </div>
        </div>
  </nav>

<!--Menu mobile de prueba-->
<nav class="menuMobile container-fluid shadow-sm bg-light">
  <div class="contMeMo ">
      <div class="subContMeMo">
        <a href="index.php"><img class="btnMeMo" style="width: 40px;"src="imagenes\blackfox.png" alt=""></a>
      </div>
      <div class="subContMeMo">
        <a data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas"><img class="btnMeMo" src="imagenes\clockcards2.png" alt=""></a>
      </div>
      <div class="subContMeMo">
        <a data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro"><img class="btnMeMo" src="imagenes\user2.png" alt=""></a>
      </div>
      <div class="subContMeMo">
        <a data-toggle="collapse" href="#collapseCarro" role="button" aria-expanded="false" aria-controls="collapseCarro"><img class="btnMeMo" src="imagenes\carro-compra2.png" alt=""></a>
      </div>
  </div>
</nav>

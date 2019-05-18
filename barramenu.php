<?php

$usuario = traerUsuarioLogueado();
$usuarioLogueado = usuarioLogueado();

?>


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
                      <?php if (usuarioLogueado()): ?>
                        <a class="btnmenu" data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro" >Hola, <?php echo "$usuario[nombre]";?></a>
                        <hr><a class="logouticon" href="logout.php"><img src="imagenes\logout.png" alt=""></a>
                      <?php else: ?>
                        <a class="btnmenu"data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro" >Login</a>
                      <?php endif; ?>
                      <img src="imagenes\carro-compra3.png" alt="">
                    </div>
                    <div class="<?php if (empty($errores1)) {echo "collapse ";} ?>mycollapse" id="collapseMarcas" data-parent="#padre">
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
                    <div class="<?php if (empty($errores2)) {echo "collapse ";} ?>mycollapse" id="collapseRegistro" data-parent="#padre">
                      <!--modificacion para que abra automaticamente si hay errores-->
                          <div class="card ">
                                <div class="card-body">
                                  <?php if (usuarioLogueado()): ?>
                                    <div class="row">
                                      <div class="col-6 usercard">
                                        <img class="imguserlog"src="imguser/<?= $usuario["email"] . ".jpg"?>" alt="">
                                      </div>
                                      <div class="col-6 usercard">
                                          <ul>

                                                <li><?php echo "Nombre : ".$usuario["nombre"]; ?></li>
                                                <li><?php echo "Email : ".$usuario["email"]; ?></li>
                                                <li><?php echo "Genero : ".$usuario["genero"]; ?></li>
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

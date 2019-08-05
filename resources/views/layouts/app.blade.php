<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- /FontAwesome-->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- /Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
  <link rel="stylesheet" href="/css/estilos.css">
  <title></title>
</head>

<body>
  <nav>
    <div class="container-fluid menu shadow-sm bg-white rounded">
      <div class="row bg-light text-dark align-middle accordion" id="padre">
        <div class=" col-md-4 col-lg-6 logo">
          <a class="text-dark" href="/">BLACK<img class="logoimg" src="/imagenes/blackfox.png" alt="logo">FOX</a>
        </div>
        <div class=" col-md-4  col-lg-3 marcas ">
          @if (auth()->check() && auth()->user()->isAdmin())
            <a class="menuLink" data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas">Admin Panel</a>
          @else
            <a class="menuLink" data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas">Productos</a>
        @endif
        </div>
        <div class=" col-md-4  col-lg-3  registro">
          @if (Auth::user())
            <a class="menuLink" data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro">Hola, {{Auth::user()->name}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              <button type="submit"><img class="btnMeDesk" src="/imagenes/logout.png" alt=""></button>
            </form>
          @else
            <a class="menuLink" data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro">Login</a>
          @endif
          <a href="/cart"><img class="btnMeDesk" src="/imagenes/carro-compra3.png" alt=""></a>
        </div>
        <div class="collapse mycollapse carro " id="collapseCarro" data-parent="#padre">
          <div class=" card card-body mycard">
          </div>
        </div>

        <div class="collapse mycollapse" id="collapseMarcas" data-parent="#padre">

          {{-- @include('../nav') --}}

          <div class="card card-body mycard">
            <div class="card card-body mycard">
              @if (auth()->check() && auth()->user()->isAdmin())
                <div class="container-admin">
                  <a class="link-admin" href="/agregarProducto">Productos</a>
                  <a class="link-admin" href="/agregarMarca">Marcas</a>
                  <a class="link-admin" href="/agregarPromocion">Promociones</a>
                  <a class="link-admin" href="/editarUsuarios">Usuarios</a>
                </div>
              @else
                @foreach ($brands as $brand)
                  <a href="/brand/{{$brand->id}}"><img class="imgmarcas" src="/{{$brand->logoUrl}}" alt="{{$brand->name}}" id="{{$brand->id}}"></a>
                @endforeach
              @endif
            </div>
          </div>

        </div>
        <!-- BOTON REGISTRO -->
        <div class="{{ $errors->has('') ? '' : 'collapse' }} mycollapse" id="collapseRegistro" data-parent="#padre">
          <!--modificacion para que abra automaticamente si hay errores-->
          <div class="card ">
            <div class="card-body">
              @if (Auth::user())
                <div class="row">
                  <div class="col-xs-12  col-md-6  usercard">
                    <img class="imguserlog" src="imguser/{{Auth::user()->email}}.'.jpg'" alt="">
                  </div>
                  <div class="col-xs-12  col-md-6  usercard2">
                    <ul>
                      <br>
                      <li>Nombre: {{Auth::user()->name}}</li>
                      <li>Email : {{Auth::user()->email}}</li>
                      <li>Genero : {{Auth::user()->gender}}</li>
                      <hr>
                      <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"> {{-- style="display: none;" Borré este atributo style de la tag form porque luego de pasar este form a laravel, este style hacía que el botón de logout se mantuviera oculto sin poder uno desloguearse. Eliminando este estilo, se puede visualizar el botón normalmente. --}}
                          @csrf
                          <button type="submit"><img class="btnMeDesk" src="/imagenes/logout.png" alt="">LOGOUT</button>
                        </form>
                      </li>
                      <li>
                        <form id="logout-form"  action="/editarPerfil/{{Auth::user()->id}}" method="get">
                          @csrf
                          <button src="/imagenes/user2.png">Perfil</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              @else

                <div class="containerm">
                  <!--le agregue la letra m porque chocaba con otra clase container y le cambiaba el fondo-->
                  <div class="row login">
                    <div class="col-xl-6 col-md-6 col-sm-12 colRegistro">
                      <h2>Iniciar sesión</h2>
                        <div class="social-container">
                          <div class="mybutton">
                            <button class="fButton" type="button">f</button>
                            <button class="gButton" type="button">g</button>
                          </div>
                        </div>
                        <h6>o usa tu usuario</h6>
                        <form method="POST" action="{{ route('login') }}" enctype = "multipart/form-data">
                          @csrf
                          <div class="fourm-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailLogin" name="email" placeholder="Ingrese email" value="{{ old('email') }}" autocomplete="email" autofocus>
                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password passLogin" placeholder="Ingrese contraseña" name="password" autocomplete="current-password"><br>
                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                                <input type="hidden" name="form" value="formLogin">
                                Recordarme <input type="checkbox" name="recordarme" value="recordarme"><br>
                                <a href="#">Olvidaste tu contraseña?</a>
                              </div>
                              <div class="row button-container">
                                <div class="col-12 ">
                                  <button type="submit" class="btn btn-primary custom-btn">Logearse</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12 colRegistro">
                            <h2>Registrarse</h2>
                              <div class="social-container">
                                <div class="mybutton">
                                  <button class="fButton" type="button">f</button>
                                  <button class="gButton" type="button">g</button>
                                </div>
                              </div>
                              <h6>o usa tu email para registrarte</h6>
                              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="fourm-group register-container">
                                  <input id="name nameRegister" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                    placeholder="Ingrese nombre">
                                    @error('name')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" id="emailLogin" name="email" placeholder="Ingrese email" value="{{ old('email') }}"
                                      autocomplete="email">
                                      @error('email')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                      <input id="password passRegister" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Ingrese contraseña">
                                        @error('password')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                        <input id="password-confirm passRegister2" type="password" class="form-control" name="password_confirmation" placeholder="Repita contraseña" autocomplete="new-password">
                                        Genero: Masculino
                                        <?php if(isset($_POST["gender"]) && $_POST["gender"] == "MASCULINO"): ?>
                                          <input type="radio" name="gender" value="MASCULINO" checked>
                                        <?php else: ?>
                                          <input type="radio" name="gender" value="MASCULINO">
                                        <?php endif ?>

                                        Femenino
                                        <?php if(isset($_POST["gender"]) && $_POST["gender"] == "FEMENINO"): ?>
                                          <input type="radio" name="gender" value="FEMENINO" checked>
                                        <?php else: ?>
                                          <input type="radio" name="gender" value="FEMENINO">
                                        <?php endif ?>

                                        <input type="file" name="avatar">
                                        <input type="hidden" name="form" value="formRegister">
                                      </div>
                                      <div class="row button-container">
                                        <div class="col-12">
                                          <button type="submit" class="btn btn-primary custom-btn">Registrarse</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>


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
                      <a href="/"><img class="btnMeMo" style="width: 40px;" src="/imagenes/blackfox.png" alt=""></a>
                    </div>
                    <div class="subContMeMo">
                      <a data-toggle="collapse" href="#collapseMarcas" role="button" aria-expanded="false" aria-controls="collapseMarcas"><img class="btnMeMo" src="/imagenes/clockcards2.png" alt=""></a>
                    </div>
                    <div class="subContMeMo">
                      <a data-toggle="collapse" href="#collapseRegistro" role="button" aria-expanded="false" aria-controls="collapseRegistro"><img class="btnMeMo" src="/imagenes/user2.png" alt=""></a>
                    </div>
                    <div class="subContMeMo">
                      <a href="/cart"><img class="btnMeMo" src="/imagenes/carro-compra2.png" alt=""></a>
                    </div>
                  </div>
                </nav>

                @yield('content')

                <section>
                  <!-- Footer  -->
                  <!-- footer -->
                  <footer class="page-footer font-small mdb-color p-3 mb-2 bg-dark  pt-4">
                    <!-- Footer Links -->
                    <div class="container text-center text-md-left">
                      <!-- Footer links -->
                      <div class="row text-center text-md-left mt-3 pb-3">
                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none">
                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
                          <p>
                            <a href="imagenes/telefono-contacto.png">Telefono</a>
                          </p>
                          <p>
                            <a href="https://goo.gl/maps/5Hxe7ReJTjPKt1sn7">Gogle Maps</a>
                          </p>
                          <p>
                            <a href="http://dotbairesshopping.com/">Sucursales</a>
                          </p>
                        </div>
                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Nosotros</h6>
                          <p>
                            <a href="https://es.wikipedia.org/wiki/Historia_de_la_relojer%C3%ADa">Nuestros comienzos</a>
                          </p>
                          <p>
                            <a href="http://www.thewatchestimes.com/componentes-de-un-reloj-materiales/">¿Qué materiales usamos?</a>
                          </p>
                          <p>
                            <a href="https://www.revistagq.com/moda/relojes-y-accesorios/articulos/estas-son-las-cuatro-empresas-que-se-reparten-el-pastel-de-la-industria-relojera-europea/27499">Rango de ventas</a>
                          </p>
                          <p>
                            <a href="https://www.eleconomista.es/evasion/tendencias/noticias/3761786/02/12/Como-comprar-un-reloj-de-lujo-y-saber-lo-que-compras.html">¿Qué reloj comprar?</a>
                          </p>
                        </div>
                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none">
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Redes Sociales</h6>
                          <p>
                            <a href="https://www.facebook.com/Black-Fox-1267054660128609/"><i class="fab fa-facebook-f mr-3"></i>Facebook</a>
                          </p>
                          <p>
                            <a href="twitter"><i class="fab fa-twitter mr-3"></i>Twitter</p>
                              <p>
                                <a href="google"><i class="fab fa-google-plus-g mr-3"></i> Google</p>
                                  <p>
                                    <a href="instagram"><i class="fab fa-instagram mr-3"></i> Instagram</p>
                                    </div>
                                    <!-- Grid column -->
                                  </div>
                                  <!-- Footer links -->
                                  <hr>
                                  <!-- Grid row -->
                                  <div class="row d-flex align-items-center ">
                                    <!-- Grid column -->
                                    <div class="col-md-7 col-lg-8">
                                      <!--Copyright-->
                                      <p class="text-center text-md-left">© 2019 Copyright:
                                        <a href="#">
                                          <strong> Maksym Enterprises</strong>
                                        </a>
                                      </p>
                                    </div>
                                    <!-- Grid column -->
                                    <!-- Grid column -->
                                    <div class="col-md-5 col-lg-4 ml-lg-0">
                                    </div>
                                    <!-- Grid row -->
                                  </div>
                                  <!-- Footer Links -->
                                </footer>
                                <!-- Footer -->

                              </section>

                            </div>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                            <script src="{{asset('js/layout.js')}}"></script>
                          </body>

                          </html>

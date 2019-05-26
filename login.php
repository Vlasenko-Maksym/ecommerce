
<div class="containerm"> <!--le agregue la letra m porque chocaba con otra clase container y le cambiaba el fondo-->
		<div class="row login">
			<div class="col-xl-6 col-md-6 col-sm-12 colRegistro">
				<h2>Iniciar sesión</h2>
				<!--errores-->
				<div class="conterrores">
          <ul>
          <?php foreach ($errores1 as $key => $value) {  ?>
              <li><?php echo $value; ?></li>
          <?php } ?>
          </ul>
        </div>

				<div class="social-container">
					<div class="mybutton">
						<button class="fButton" type="button">f</button>
						<button class="gButton"type="button">g</button>
					</div>
				</div>
				<h6>o usa tu usuario</h6>
				<form action="index.php" method="post">
					<div class="fourm-group">
						<?php if($_POST && !isset($errores1["email"]) && $_POST["form"] == "form1"): ?>
						<input type="email" class="form-control" id="emailLogin" name="email"placeholder="Ingrese email" value="<?= $emailOk ?>" >
						<?php else: ?>
						<input type="email" class="form-control" id="emailLogin" name="email"placeholder="Ingrese email">
						<?php endif; ?>


						<input type="password" class="form-control" id="passLogin" placeholder="Ingrese contraseña" name="pass"><br>

            <input type="hidden" name="form" value="form1">
            Recordarme  <input type="checkbox" name="recordarme" value="recordarme"><br>
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
        <!--errores -->
        <div class="conterrores">
          <ul>
          <?php foreach ($errores2 as $key => $value) {  ?>
              <li><?php echo $value; ?></li>
          <?php } ?>
          </ul>
        </div>
        <!--errores -->
				<div class="social-container">
					<div class="mybutton">
						<button class="fButton" type="button">f</button>
						<button class="gButton"type="button">g</button>
					</div>
				</div>
				<h6>o usa tu email para registrarte</h6>
				<form action="index.php" method="post" enctype="multipart/form-data">
					<div class="fourm-group register-container" >

						<?php if(isset($errores2["nombre"])): ?>
            <input type="text" class="form-control" id="nameRegister" name="nombre" placeholder="Ingrese nombre">
          	<?php else: ?>
						<input type="text" class="form-control" id="nameRegister" name="nombre" placeholder="Ingrese nombre" value="<?= $nombreOk ?>" >
          	<?php endif; ?>

						<?php if($_POST && !isset($errores2["email"]) && $_POST["form"] == "form2"): ?>
						<input type="email" class="form-control" id="emailLogin" name="email"placeholder="Ingrese email" value="<?= $emailOk ?>" >
						<?php else: ?>
						<input type="email" class="form-control" id="emailLogin" name="email"placeholder="Ingrese email">
						<?php endif; ?>

						<input type="password" class="form-control" id="passRegister" placeholder="Ingrese contraseña" name="pass1">
            <input type="password" class="form-control" id="passRegister2" placeholder="Repita contraseña" name="pass2">

						Genero: Masculino
						<?php if(isset($_POST["genero"]) && $_POST["genero"] == "masc"): ?>
            <input type="radio" name="genero" value="masc" checked>
          	<?php else: ?>
          	<input type="radio" name="genero" value="masc">
        		<?php endif ?>

						Femenino
						<?php if(isset($_POST["genero"]) && $_POST["genero"] == "fem"): ?>
            <input type="radio" name="genero" value="fem" checked>
          	<?php else: ?>
          	<input type="radio" name="genero" value="fem">
        		<?php endif ?>

            <input type="file" name="avatar" value="">
            <input type="hidden" name="form" value="form2">
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

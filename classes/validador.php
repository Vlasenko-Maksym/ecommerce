<?php


class Validador {

public static function validarRegistro($datos){
  global $dbAll;

  $errores=[];
  $datosFinales = [];

  foreach ($datos as $posicion => $valores) {
      if(!is_array($datos[$posicion])){
      $datosFinales[$posicion] = trim($valores);
      }
  }
// var_dump($datosFinales);
// exit;

if($_FILES["avatar"]["error"] !== 0){
  $errores["avatar"]="Hubo un error.Por favor, vuelva a subir la imagen";
}

if(strlen($datosFinales["nombre"]) == 0){
  $errores["nombre"] = "Por favor complete el campo nombre";
} elseif (ctype_alpha($datosFinales["nombre"]) == false){
  $errores["nombre"] = "El nombre debe contener solo letras...";
}

if(!isset($datosFinales["genero"])){
  $errores["genero"] = "Por favor indique su género";
}

if(strlen($datosFinales["email"]) == 0){
        $errores["email"] = "Por favor complete el campo email.";
      } elseif (!filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "Por favor ingrese un email con formato válido.";
      } if(/*file_exists("db.json") && */
        $dbAll->existeUsuario($datosFinales["email"])){ //TODO agergar validación de usaurio existente.
        $errores["email"] = "El email ya se encuentra registrado.";
      }

      if(strlen($datosFinales["pass1"]) == 0){
        $errores["pass"] = "El campo contraseña no puede estar vacío.";
      } if(strlen($datosFinales["pass2"]) == 0){
        $errores["pass"] = "Por favor repita su contraseña.";
      } elseif($datosFinales["pass1"] !== $datosFinales["pass2"]){
        $errores["pass"] = "Las contraseñas no coinciden.";
      }

      return $errores;
  }

  public static function validarLogin($email, $pass)
  {
    global $dbAll;

    $errores = [];

    if(strlen($pass) == 0){
      $errores["pass"] = "El campo contraseña no puede estar vacío.";
    }

    if(strlen($email) == 0){
      $errores["email"] = "Por favor complete el campo email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "Por favor ingrese un email con formato válido.";
    }

     // if($usuario = $dbAll->buscarUsuarioPorMail($email)) {
     //  if(!password_verify($pass, $usuario->getPass())){
     //    $errores["pass"] = "La contraseña es incorrecta.";
     //  }
     // }

    return $errores;
  }
}

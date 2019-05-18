<?php
session_start();
function validarRegistro($datos){
  $errores=[];
  $datosFinales=[];
  foreach ($datos as $posicion => $valor) {
    if(!is_array($datos[$posicion])){
      $datosFinales[$posicion] = trim($valor);
    }
  }

  if(strlen($datosFinales["nombre"]) == 0){
    $errores["nombre"] = "Por favor complete el campo nombre.";
  } elseif(ctype_alpha($datosFinales["nombre"]) == false){
    $errores["nombre"] = "El nombre debe contener solo letras..";
  }

  if(strlen($datosFinales["email"]) == 0){
    $errores["email"] = "Por favor complete el campo email.";
  } elseif (!filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = "Por favor ingrese un email con formato válido.";
  } if(file_exists("db.json") && existeUsuario($datosFinales["email"])){ //TODO agergar validación de usaurio existente.
    $errores["email"] = "El email ya se encuentra registrado.";
  }

  if(strlen($datosFinales["pass1"]) == 0){
    $errores["pass"] = "El campo contraseña no puede estar vacío.";
  } if(strlen($datosFinales["pass2"]) == 0){
    $errores["pass"] = "Por favor repita su contraseña.";
  } elseif($datosFinales["pass1"] !== $datosFinales["pass2"]){
    $errores["pass"] = "Las contraseñas no coinciden.";
  }

  if(!isset($datosFinales["genero"])){
    $errores["genero"] = "Por favor indique su género.";
  }

if($_FILES["avatar"]["error"] !== 0){
  $errores["avatar"]="Hubo un error. Por favor, vuelva a subir la imagen";
}

return $errores;
}

function nextId(){

  if(!file_exists("db.json")){
    $json = "";
  } else {
    $json = file_get_contents("db.json");
  }
  if($json == ""){
      return 1;
  }
  $array = json_decode($json, true);
  $ultimoUsuario = array_pop($array["usuarios"]);
  $lastId = $ultimoUsuario["id"];
  return $lastId + 1;
}

function armarUsuario(){
  return [
    "id" => nextId(),
    "nombre" => trim($_POST["nombre"]),
    "genero" => trim($_POST["genero"]),
    "email" => trim($_POST["email"]),
    "pass" => password_hash($_POST["pass1"], PASSWORD_DEFAULT),
    "avatar" => "ruta de la imagen o nombre del archivo",
  ];
}

function guardarUsuario($usuario){
  if(!file_exists("db.json")){
    $json = "";
  } else {
    $json = file_get_contents("db.json");
  }
  $array = json_decode($json, true);
  $array["usuarios"][] = $usuario;
  $array = json_encode($array, JSON_PRETTY_PRINT);
  file_put_contents("db.json", $array);
}

function buscarUsuarioPorMail($email){
  $json = file_get_contents("db.json");
  $array = json_decode($json, true);
  foreach($array["usuarios"] as $usuario){
        if($usuario["email"] == $email){
          return $usuario;
        }
      }

  return null;
}

function existeUsuario($email){
  return buscarUsuarioPorMail($email) !== null;
}

function validarLogin($datos){
  $errores = [];
  if(strlen($datos["email"]) == 0){
    $errores["email"] = "Por favor complete el campo email.";
  } elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = "Por favor ingrese un email con formato válido.";
  } if(!existeUsuario($datos["email"])){ //TODO agergar validación de usaurio existente.
    $errores["email"] = "El email no se encuentra registrado.";
  }

  if(strlen($datos["pass"]) == 0){
    $errores["pass"] = "El campo contraseña no puede estar vacío.";
  } else {
    $usuario = buscarUsuarioPorMail($datos["email"]);
    if(!password_verify($datos["pass"], $usuario["pass"])){
      $errores["pass"] = "La contraseña es incorrecta.";
    }
  }

  return $errores;
}

function loguearUsuario($email){
  $_SESSION["email"] = $email;
}

function usuarioLogueado(){
   return isset($_SESSION["email"]);
}


function traerUsuarioLogueado(){
  if(isset($_SESSION["email"])) {
    $usuario = buscarUsuarioPorMail($_SESSION["email"]);
    return $usuario;
  } else {
    return false;
  }
}

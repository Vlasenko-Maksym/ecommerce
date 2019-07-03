<?php

class DbJson extends Db
{
  private $json;

  function __construct()
  {
    if(!file_exists("db.json")){
      $this->json = "";
    } else {
      $this->json = file_get_contents("db.json");
    }
  }

public function nextId(){
  if($this->json == ""){
    return 1;
  }

$array = json_decode($this->json, true);
$ultimoUsuario = array_pop($array["usuarios"]);
$lastId = $ultimoUsuario["id"];

return $lastId + 1;

}

public function guardarUsuario(Usuario $usuario)
{
  $array = json_decode($this->json, true);

  $newUsuario = [
    "id" => $this->nextId(),
    "name" => $this->getName(),
    "gender" => $usuario->getGender(),
    "email" => $ususario->getEmail(),
    "pass" => $usuario->getPass(),
    "avatar" => $usuario->getAvatar(),
  ];
  $array["usuarios"][] = $newUsuario;
  $array = json_encode($array, JSON_PRETTY_PRINT);

  file_put_contents("db.json", $array);
}

public function buscarUsuarioPorMail($email)
{
  $array = json_decode($this->json, true);

foreach($array["usuarios"] as $usuario){
if($usuario["email"] == $email){
  return $usuario = new Usuario($usuario);
  }
}
return null;
}

public function existeUsuario($email)
{
return $this->buscarUsuarioPorMail($email) !== null;
}

public function traerUsuarioLogueado()
{
if(isset($_SESSION["email"])) {
  $usuario = $this->buscarUsuarioPorMail($_SESSION["email"]);
  return $usuario;
} else {
  return false;
}

}


}

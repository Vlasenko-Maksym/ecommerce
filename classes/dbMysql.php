<?php

class DbMysql extends Db
{
  public $connection;

  public function __construct()
  {
    $dsn = "mysql:host=localhost;dbname=blackfox_db;port=3307";
    $user = "root";
    $pass = "";

    try {
      $this->connection = new PDO($dsn, $user, $pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
      echo "Hubo un error. <br>";
      echo $e->getMessage();
      exit;
    }
  }
  public function guardarUsuario(Usuario $usuario)
  {
    $stmt = $this->connection->prepare("INSERT INTO usuario VALUES(default, :nombre, :email, :genero, :pass, :avatar)");

    $stmt->bindValue(":nombre",$usuario->getName());
    $stmt->bindValue(":email",$usuario->getEmail());
    $stmt->bindValue(":genero",$usuario->getGenero());
    $stmt->bindValue(":pass",$usuario->getPass());
    $stmt->bindValue(":avatar",$usuario->getAvatar());

    $stmt->execute();
  }

  private function makeUser(array $data)
  {
    $usuario = new Usuario;
    $usuario->setNombre($data['nombre']);
    $usuario->setPass($data['pass']);
    $usuario->setGenero($data['genero']);
    $usuario->setAvatar($data['avatar']);
    $usuario->setEmail($data['email']);

    return $usuario;
  }

  public function buscarUsuarioPorMail($email)
  {
    $stmt = $this->connection->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->bindValue(":email",$email);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data){
      return $this->makeUser($data);
    }

    return null;
  }

public function existeUsuario($email)
{
  $stmt = $this->connection->prepare("SELECT * FROM usuario WHERE email = :email");
  $stmt->bindValue(":email",$email);
  // $stmt->bindValue(":password",$password);
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_ASSOC);

  if($data){
    return $this->makeUser($data);
  }

  return false;
}

  public function traerUsuarioLogueado()
  {
    if(isset($_SESSION["email"])) {
      return $this->buscarUsuarioPorMail($_SESSION["email"]);
    }
    return false;
  }
}

<?php

class Usuario
{
  private $id;
  private $nombre;
  private $email;
  private $genero;
  private $pass;
  private $avatar;
  private $createdAt;

  public function __construct()
  {
    $this->createdAt = date('Y-m-d H:i:s');
  }

public function setNombre ($nombre)
  {
    $this->nombre = $nombre ;
    return $this;
  }
public function setEmail ($email)
  {
    $this->email = $email ;
    return $this;
  }
public function setGenero ($genero)
  {
    $this->genero = $genero ;
    return $this;
  }
public function setPass ($pass)
  {
    $this->pass = $pass ;
    return $this;
  }
public function setAvatar ($avatar)
  {
    $this->avatar = $avatar ;
    return $this;
  }

public function getName ()
{
  return $this->nombre ;
}
public function getEmail ()
{
  return $this->email ;
}
public function getGenero ()
{
  return $this->genero ;
}
public function getPass ()
{
  return $this->pass ;
}
public function getAvatar ()
{
  return $this->avatar ;
}
}

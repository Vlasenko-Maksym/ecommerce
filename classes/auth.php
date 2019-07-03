<?php

class Auth
{
  public function __construct()
  {
    session_start();
  }

  public function loguear(Usuario $user)
  {
    $_SESSION["user"] = $user;
  }

  public function getUser()
  {
    return $_SESSION["user"] ?? null;
  }

  public function usuarioLogueado()
  {
    return isset($_SESSION["user"]);
  }
}

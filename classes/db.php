<?php

abstract class Db
{

public abstract function guardarUsuario(Usuario $usuario);
public abstract function buscarUsuarioPorMail($email);
public abstract function existeUsuario($email);
public abstract function traerUsuarioLogueado();

}

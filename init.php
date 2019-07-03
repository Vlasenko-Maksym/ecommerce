<?php
//Incluímos todas las clases necesarias para operar y las instancias iniciales que necesite el proyecto.
require "classes/usuario.php";
require "classes/db.php";
require "classes/dbMysql.php";
require "classes/dbJson.php";
require "classes/validador.php";
require "classes/auth.php";

$dbAll = new DbMysql; //En caso de usar json cambiar por new DbJson
$auth = new Auth;

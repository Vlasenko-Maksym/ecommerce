<?php
$dsn='mysql:host=127.0.0.1;dbname=blackfox_db;port=3307';
$db_user='root';
$db_pass='';



try {
  $db = new PDO($dsn,$db_user,$db_pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Subida exitosa";
//   $query=$db->prepare("INSERT INTO dbprueba.usuarios (nombre, edad) VALUES('JUAN',28)");
//   $query-> execute();

} catch (\Exception $e) {
  echo "Hubo un error. <br>";
  echo $e->getMessage();
  exit;
}
?>
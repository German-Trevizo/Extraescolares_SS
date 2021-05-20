<?php
include "./conexion.php";

$id = $_POST['id'];

$coneccion ->query("delete from usuarios where id = $id") or die($coneccion->error);
header("Location: ./../usuarios.php");

?>
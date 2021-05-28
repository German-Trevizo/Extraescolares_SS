<?php 

$server="localhost";
$nombreBD="php_extra";
$user="root";
$pass="";
$coneccion = new mysqli($server, $user, $pass, $nombreBD);

if($coneccion -> connect_error){
 die("No se pudo conectar a la base de datos");

}




?>
<?php
include "./conexion.php";
$NOMBRE = $_POST['nombre'];
$APELLIDO = $_POST['ap'];
$EMAIL = $_POST['email'];
$PASSWORD1 = $_POST['p1'];
$PASSWORD2 = $_POST['p2'];

if($PASSWORD1 != $PASSWORD2){
    ECHO "EL PASSWORD ES DIFERENTE";
    header("Location: ../usuarios.php?error=Los campos no coinciden");
}else{
    $p1=sha1($PASSWORD1);
    $coneccion->query("insert into usuarios (nombre, apellido, password, img_perfil, email) values ('$NOMBRE','$APELLIDO','$p1','default.jpg','$EMAIL'); ")
    or die($coneccion -> error);
    header("Location: ../usuarios.php?success=usuario con exito");
    }

?>
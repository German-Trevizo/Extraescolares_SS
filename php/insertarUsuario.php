<?php
include "./conexion.php";
$NOMBRE = $_POST['nombre'];
$APELLIDO = $_POST['app'];
$APELLIDOM = $_POST['apm'];
$EMAIL = $_POST['email'];
$PASSWORD1 = $_POST['pass1'];
$PASSWORD2 = $_POST['pass2'];

if($PASSWORD1 != $PASSWORD2){
    ECHO "EL PASSWORD ES DIFERENTE";
    header("Location: ../usuarios.php?error=error al agregar usuario");
}else{
    $p1=sha1($PASSWORD1);
    $coneccion->query("insert into user_adm (name, last_name, mlast_name, email, password) values ('$NOMBRE','$APELLIDO','$APELLIDOM','$EMAIL','$p1'); ")
    or die($coneccion -> error);
    header("Location: ../usuarios.php?success=usuario agregado con exito");
    }

?>
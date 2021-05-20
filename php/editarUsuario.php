<?php
include "./conexion.php";

$id = $_POST['ids'];
$name = $_POST['name'];
$fistname = $_POST['first'];
$email = $_POST['hot'];
$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];

if (trim($p1) == "" && trim($p2) == "") {
    $coneccion->query("update usuarios set
nombre ='$name',
apellido ='$fistname',
email ='$email' where id = $id ") or die($coneccion->error);
header("Location: ../usuarios.php?success=usuario con exito");
}else{
    if($p1 == $p2){
        $pass = sha1($p1);
        $coneccion->query("update usuarios set
        nombre ='$name',
        apellido ='$fistname',
        email ='$email',
        password = '$pass'
        where id = $id ") or die($coneccion->error);    
        header("Location: ../usuarios.php?success=usuario con exito");

    }else{
        /* 'hay error' */
        header("Location: ../usuarios.php?error=Los campos no coinciden");
    }


}

/* '

header("Location: ./../usuarios.php");
' */
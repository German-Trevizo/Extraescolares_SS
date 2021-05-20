<?php

session_start();

include "./conexion.php";

$usuario = $_POST['user'];
$password = $_POST['pass'];

$res = $coneccion -> query("select * from usuarios where id='$usuario' and password ='$password'") or die($coneccion -> error);

 
//sha1($password).

if(mysqli_num_rows($res) > 0){
    $fila=mysqli_fetch_row($res);
    $id = $fila[0];
    $nombre = $fila[1];
    $ap = $fila[2];
    $pass = $fila[3];
    $img = $fila[4];
    $email = $fila[5];
    $array = array(
                'ID'=>$id,
                'NOM'=>$nombre,
                'AP'=>$ap,
                'PASS'=>$pass);
    echo json_encode($array);

    $_SESSION['userData']=$array;

    header("Location: ../controlPanel.php");
    
}else{
    print_r("Inicio de secion incorrecto");
     
    //header("Location: ../login.php");
     
}


?>
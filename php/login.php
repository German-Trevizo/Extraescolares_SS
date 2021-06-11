<?php
session_start();

include "./conexion.php";

$email = $_POST['email'];
$password = $_POST['pass'];

$res = $coneccion->query("select * from user_adm where email='$email' and password ='" . sha1($password) . "'") or die($coneccion->error);

if (mysqli_num_rows($res) > 0) {
    $fila = mysqli_fetch_row($res);
    $id = $fila[0];
    $nombre = $fila[1];
    $app = $fila[2];
    $apm = $fila[3];
    $email = $fila[4];
    $array = array(
        'ID' => $id,
        'NOM' => $nombre,
        'APP' => $app,
        'APM' => $apm,
        'EMA' => $email
    );
    echo json_encode($array);

    $_SESSION['userData'] = $array;

    header("Location: ../controlPanel.php");
} else {
    print_r("Inicio de session incorrecto");

    header("Location: ../login.php");
}

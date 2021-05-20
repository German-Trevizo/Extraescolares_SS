<?php

include("./conexion.php");


$resultado = $coneccion->query("select * from formato_pdf;");

if(!$resultado){
    /* 
    mysql_error();
    
    */
    die();
}

$fila = mysqli_fetch_row($resultado);


$coneccion->close();

?>




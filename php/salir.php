<?php

session_start();

/* '
para cerrar toda las variables de session se usa este'

session_destroy();

' */

/* para cerrar solo una variable especifica 
*/

unset($_SESSION['userData']);

header("Location: ../login.php")
?>
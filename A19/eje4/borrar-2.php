<?php
//Recuperamos la sesión
session_start();
//Cogemos el array que nos viene por POST de los checkboxs, lo recorremos y quitamos de la sesion aquellos que habiamos seleccionado.
foreach ($_POST['opts'] as $key=>$val){
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}

//Se redirecciona a la página index.php
header("Location: index.php");
 ?>

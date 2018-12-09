<?php
session_start();
//Sumar 1 al numero de la sesion
if (isset($_SESSION['numero']) && $_POST['modnum'] == "subir") {
    $_SESSION['numero'] = $_SESSION['numero'] + 1;
}
//Restar 1 al numero de la sesión
if (isset($_SESSION['numero']) && $_POST['modnum'] == "bajar") {
    $_SESSION['numero'] = $_SESSION['numero'] - 1;
}

//Resetear el número a cero
if (isset($_SESSION['numero']) && $_POST['modnum'] == "reset") {
    session_destroy();
}
//Se redirecciona a la página index.php
header("Location: index.php");
 ?>

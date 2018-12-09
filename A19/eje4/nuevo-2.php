<?php
//Se inicia la sesion
session_start();
//Se asocia a la sesion un dato, nombre valor, que recogemos del formulario
$_SESSION[$_POST['nombre']] = $_POST['valor'];
//Se redirecciona a la página index.php
header("Location: index.php");

?>

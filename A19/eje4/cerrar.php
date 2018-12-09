<?php
//Se recupera la sesion abierta
session_start();
//Se destruye la sesión.
session_destroy();
//Se redirecciona a la página index.php
header("Location: index.php");
 ?>

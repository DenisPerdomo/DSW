<?php
session_start();
$_SESSION['success']= true;
$message = false;
if (isset($_SESSION['success'])) {
    $message = "<div class='alert alert-success' role='alert'>Conectado correctamente</div>\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividad 19 - Denis Perdomo</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.js" type="text/javascript"></script>
    <script src="../assets/js/popper.js" type="text/javascript"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style = 'background-color: #e3f2fd;'>
        <span class="navbar-brand mb-0 h1">Ejercicio 1 - Denis Perdomo</span>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conectar.php">Conectar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="desconectar.php">Desconectar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comprobar.php">Comprobar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <br>
        <?php
            if ($message != false) {
                echo $message;
                echo "Session ID: ".session_id();
            }
        ?>
    </div>
</body>
</html>

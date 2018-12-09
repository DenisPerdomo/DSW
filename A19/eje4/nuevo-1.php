<?php
//Creamos la sesion
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividad 19 - Denis Perdomo</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.js" type="text/javascript"></script>
    <script src="../assets/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style = 'background-color: #e3f2fd;'>
        <span class="navbar-brand mb-0 h1">Ejercicio 4 - Denis Perdomo</span>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <br>
                <form action="nuevo-2.php" method="post">
                    <div class="form-group">
                        <label for="nombreId">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombreId" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="valorId">Valor</label>
                        <input type="text" class="form-control" name="valor" id="valorId" placeholder="Valor">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>

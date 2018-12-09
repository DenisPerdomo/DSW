<?php
//Recuperamos la sesion
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
                <li class="nav-item">
                    <a class="nav-link" href=" nuevo-1.php">Guardar Nuevo Dato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver.php">Ver Datos Actuales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrar-1.php">Borrar datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <br>
                <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Datos de Session</h5>
                        <p class="card-text">
                            <?php
                            //Hacemos un listado de los valores que hay asociados a sesion.
                            foreach ($_SESSION as $key=>$val){
                                echo "<b>Nombre: </b>".$key." <b>Valor: </b>".$val."<br/>";
                            }
                            ?>
                        </p>
                      </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>

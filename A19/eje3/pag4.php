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
            <span class="navbar-brand mb-0 h1">Ejercicio 3 - Denis Perdomo</span>
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
                    <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datos del Usuario</h5>
                            <p class="card-text">
                                <?php
                                //Comprobamos si el usuario ha apretado el si
                                if ($_POST['confirm'] == "si"):
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        ¡Usted ha confirmado estos datos!
                                    </div>
                                        <p><b>Nombre de usuario: </b><?php echo $_SESSION['nombre'] ?></p>
                                        <p><b>Apellidos de usuario: </b><?php echo $_SESSION['apellidos'] ?></p>
                                <?php endif; ?>
                                <?php
                                //Comprobamos si el usuario ha apretado el no
                                if ($_POST['confirm'] == "no"):
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        ¡Usted no ha confirmado los datos!
                                    </div>
                                        <?php session_destroy()?>
                                        <p>Sesión eliminada</p>
                                <?php endif; ?>
                            </p>
                          </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </body>
</html>

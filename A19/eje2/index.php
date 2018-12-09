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
        <span class="navbar-brand mb-0 h1">Ejercicio 2 - Denis Perdomo</span>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <br>
                <form action="modnum.php" method="post">
                    <button type="submit" name="modnum" value="subir" class="btn btn-success">Subir</button>
                    <button type="submit" name="modnum" value="bajar" class="btn btn-warning">Bajar</button>
                    <button type="submit" name="modnum" value="reset" class="btn btn-primary">Resetear</button>
                </form>
                <br>
                <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Número</h5>
                        <p class="card-text">
                            <?php
                                //Si existe la variable no hace nada, sino la ponemos a 0.
                                isset($_SESSION['numero']) ?  $_SESSION['numero'] : $_SESSION['numero'] = 0 ;
                                //Imprimimos la variable
                                echo $_SESSION['numero'];
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

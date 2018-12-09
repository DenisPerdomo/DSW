<?php
session_start();
//Conexión con la base de datos
require_once "pdo.php";
//Se comprueba que el nombre de usuario esté en la sesión
if (! isset($_SESSION['name'])) {
    die('No está logeado');
}
//Si existe en el POST el action entramos en el if
if (isset($_POST['action'])) {
    //Si la action es igual add hacemos un insertar en la base de datos
    if ($_POST['action']=="add") {
        //Comprobamos si existe el nombre
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            //Si no existe mandamos un mensaje al usuario
            $_SESSION['error'] = "Error: El campo marca es obligatorio";
            header("Location: add.php");
            return;
            //Comprobamos si year y kilometros son numericos
        } elseif (!is_numeric($_POST['year']) || !is_numeric($_POST['kilometros'])) {
            $_SESSION['error'] = "Error: Kilometraje y año deben ser numéricos";
            header("Location: add.php");
            return;
        } else {
            //Preparampos la sentencia
            $stmt = $conn->prepare('INSERT INTO autos
                   (make, year, mileage) VALUES ( :mk, :yr, :mi)');
            //Ejecutamos la sentencia con el array de los valores que se sustituyen en la sentencia.
            $stmt->execute(
                       array(
                       ':mk' => $_POST['nombre'],
                       ':yr' => $_POST['year'],
                       ':mi' => $_POST['kilometros'])
                   );
            //Mensaje para indicar que se ha insertado correctamente
            $_SESSION['success'] = "Registro insertado correctamente";
            header("Location: view.php");
            return;
        }
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Denis Perdomo - Actividad 18</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Aplicación Coches - A21</h1>
                <h2>Añadir Nuevo Coche</h2>
                <?php
                    //Se muestra el mensaje de borrado o insertado correctamente
                    if (isset($_SESSION['success'])) {
                        echo('<div class="alert alert-success">'.htmlentities($_SESSION['success'])."</div>\n");
                        unset($_SESSION['success']);
                    }
                    //Se los mensajes de error, con cuadro rojo.
                    if (isset($_SESSION['error'])) {
                        echo('<div class="alert alert-danger">'.htmlentities($_SESSION['error'])."</div>\n");
                        unset($_SESSION['error']);
                    }
                ?>
                <form class="form" method="POST">
                    <div class="form-group">
                        <label for="nombreId">Marca</label>
                        <input type="text" name="nombre" class="form-control" id="nombreId">
                    </div>
                    <div class="form-group">
                        <label for="yearId">Año</label>
                        <input type="text" name="year" class="form-control" id="yearId">
                    </div>
                    <div class="form-group">
                        <label for="kilometrosId">Kilómetros</label>
                        <input type="text" name="kilometros" class="form-control" id="kilometrosId">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Añadir">
                    <a href="view.php" class="btn btn-secondary">Cancelar</a>
                    <input type='hidden' name="action" value="add"/>
                </form>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>

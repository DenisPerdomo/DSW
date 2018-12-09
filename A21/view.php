<?php
session_start();
//Conexión con la base de datos
require_once "pdo.php";
//Se comprueba que el nombre de usuario esté en la sesión
if (! isset($_SESSION['name'])) {
    die('No está logeado');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Denis Perdomo - Actividad 21</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1>Aplicación Coches - A21</h1>
                    <h2>Añadir Nuevo Coche</h2>
                    <br>
                    <a href="add.php" class="btn btn-primary">Añadir Coche</a>
                    <a href="logout.php" class="btn btn-secondary">Cerrar Sesión</a>
                    <br></br>
                    <?php
                        //Se muestra el mensaje de borrado o insertado correctamente
                        if (isset($_SESSION['success'])) {
                            echo('<div class="alert alert-success">'.htmlentities($_SESSION['success'])."</div>\n");
                            unset($_SESSION['success']);
                        }
                    ?>
                </div>
                <table class="table table-sm table-striped" >
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Año</th>
                        <th>Kilómetros</th>
                        <th></th>
                    </tr>
                    <?php
                    //Aquí preparamos la consulta para crear la tabla inicial que vera el usuario.
                    $stmt = $conn->query("SELECT * FROM autos");
                    //Con el bucle while creamos la tabla escribiendo una fila por cada registro.
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>";
                        echo($row['auto_id']);
                        echo("</td><td>");
                        echo($row['make']);
                        echo("</td><td>");
                        echo($row['year']);
                        echo("</td><td>");
                        echo($row['mileage']);
                        echo("</td><td>");
                        //Añadimos en el botón eliminar un pequeño formulario, para el borrado.
                        //Añadimos dos input hidden, uno con el action y otro con el id del registro.
                        echo("<a href='del.php?auto_id=".$row['auto_id']."' class='btn btn-secondary'>Eliminar</a>");
                        echo("</td></tr>\n");
                    }
                    ?>
                </table>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

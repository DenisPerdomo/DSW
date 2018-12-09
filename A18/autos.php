<?php
//Conexión con la base de datos
require_once "pdo.php";
$success=false;
$error = false;
//Se comprueba que el nombre de usuario esté en la URL.
if (! isset($_GET['email']) || strlen($_GET['email']) < 1) {
    die('Falta el nombre del parámetro');
}
/*Este método para autenticar al usuario es un coladero,
 * porque cualquiera que ponga un parámetro con el nombre name
 * en la url, puede pasar a la página, sin necesidad de poner contreseña
 */

// Si el usuario pulsa logout se lleva a index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

//Si existe en el POST el action entramos en el if
if (isset($_POST['action'])) {
    //Si la action es igual add hacemos un insertar en la base de datos
    if ($_POST['action']=="add") {
        //Comprobamos si existe el nombre
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            //Si no existe mandamos un mensaje al usuario
            $error = "Error: El campo marca es obligatorio";
            //Comprobamos si year y kilometros son numericos
        } elseif (!is_numeric($_POST['year']) || !is_numeric($_POST['kilometros'])) {
            //Si no son numericos se muestra mensaje de error.
            $error = "Error: Kilometraje y año deben ser numéricos";
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
            $success = "Registro insertado correctamente";
        }
    }
    //Si la acion es igual a delete entra en este if para eliminar el registro.
    if ($_POST['action']=="delete") {
        //Escribimos la sentencia sql
        $sql="DELETE FROM autos WHERE auto_id = :id";
        //Preparamos la sentencia sql
        $stmt = $conn->prepare($sql);
        //Ejecutamos la sentencia sql para eliminar el registro, según el id.
        $stmt->execute(array(':id'=>$_POST['auto_id']));
        //Mensaje para indicar que se ha borrado correctamente
        $success = "Registro borrado correctamente";
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
                <h1>Aplicación Coches - A18</h1>
                <h2>Añadir Nuevo Coche</h2>
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
                    <input type="submit" name = "logout" class="btn btn-secondary" value="Cerrar sesión">
                    <input type='hidden' name="action" value="add"/>
                </form>
                <br>
                <?php
                    //Se muestra el mensaje de borrado o insertado correctamente
                    if ($success !== false) {
                        echo('<div class="alert alert-success">'.htmlentities($success)."</div>\n");
                    }
                    //Se los mensajes de error, con cuadro rojo.
                    if ($error !== false) {
                        echo('<div class="alert alert-danger">'.htmlentities($error)."</div>\n");
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
                    echo("<form id='delete".$row['auto_id']."' method='post'>
                        <input type='hidden' name='auto_id' value='".$row['auto_id']."'/>
                        <input type='hidden' name='action' value='delete'/>
                        <p><button type='submit' class='btn btn-danger' form='delete".$row['auto_id']."'>Eliminar</button></p>
                        </form>");
                    echo("</td></tr>\n");
                }
                ?>
            </table>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>

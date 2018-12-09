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
    //Si la acion es igual a delete entra en este if para eliminar el registro.
    if ($_POST['action']=="delete") {
        //Escribimos la sentencia sql
        $sql="DELETE FROM autos WHERE auto_id = :id";
        //Preparamos la sentencia sql
        $stmt = $conn->prepare($sql);
        //Ejecutamos la sentencia sql para eliminar el registro, según el id.
        $stmt->execute(array(':id'=>$_POST['auto_id']));
        //Mensaje para indicar que se ha borrado correctamente
        $_SESSION['success'] = "Registro borrado correctamente";
        header("Location: view.php");
        return;
    }
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
                <a href="view.php" class="btn btn-secondary">Cancelar</a>
                <br></br>
                <form method='post'>
                    <input type='hidden' name='auto_id' value='<?php echo $_GET["auto_id"]?>'/>
                    <input type='hidden' name='action' value='delete'/>
                    <p><button type='submit' class='btn btn-danger'>Eliminar</button></p>
                </form>
            </div>
            <div class="col-md-3"></div>
</body>
</html>

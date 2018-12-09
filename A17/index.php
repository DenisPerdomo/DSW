<?php
//Conexión con la base de datos
require_once "pdo.php";
//Si existe en el POST el action entramos en el if
if (isset($_POST['action'])) {
    //Si la action es igual add hacemos un insertar en la base de datos
    if ($_POST['action']=="add") {
        //Volvemos a comprobar que tienen valor los dos campos input.
        if (isset($_POST['name']) && isset($_POST['years'])) {
            //Escribimos la sentencia sql
            $sql = "INSERT INTO personas (name, years)
            VALUES (:name, :years)";
            //Hacemos un echo para ver la sentencia a modo orientativo.
            echo("<pre>\n".$sql."\n</pre>\n");
            //Preparampos la sentencia
            $stmt = $conn->prepare($sql);
            //Ejecutamos la sentencia con el array de los valores que se sustituyen en la sentencia.
            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':years' => $_POST['years']
                ));
        }
    }
    //Si la acion es igual a delete entra en este if para eliminar el registro.
    if ($_POST['action']=="delete") {
        //Escribimos la sentencia sql
        $sql="DELETE FROM personas WHERE id = :id";
        //Hacemos un echo para ver la sentencia a modo orientativo
        echo "<pre>\n$sql\n</pre>\n";
        //Preparamos la sentencia sql
        $stmt = $conn->prepare($sql);
        //Ejecutamos la sentencia sql para eliminar el registro, según el id.
        $stmt->execute(array(':id'=>$_POST['id']));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividad 17 - Denis Perdomo</title>
</head>
<body>
    <table border= "1" style="border-collapse: collapse;" cellpadding="2" cellspacing="2" >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th></th>
        </tr>
        <?php
        //Aquí preparamos la consulta para crear la tabla inicial que vera el usuario.
        $stmt = $conn->query("SELECT id, name, years FROM personas");
        //Con el bucle while creamos la tabla escribiendo una fila por cada registro.
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo($row['id']);
            echo("</td><td>");
            echo($row['name']);
            echo("</td><td>");
            echo($row['years']);
            echo("</td><td>");
            //Añadimos en el botón eliminar un pequeño formulario, para el borrado.
            //Añadimos dos input hidden, uno con el action y otro con el id del registro.
            echo("<form id='delete".$row['id']."' method='post'>
                <input type='hidden' name='id' value='".$row['id']."'/>
                <input type='hidden' name='action' value='delete'/>
                <p><button type='submit' form='delete".$row['id']."'>Eliminar</button></p>
                </form>");
            echo("</td></tr>\n");
        }
        ?>
    </table>
    <p>Añadir Nueva Persona</p>
    <form method="post">
        <p>Nombre:<input type="text" name="name"></p>
        <p>Años:<input type="text" name="years"></p>
        <p><input type="submit" value="Añadir"/></p>
        <input type='hidden' name="action" value="add"/>
    </form>
</body>
</html>

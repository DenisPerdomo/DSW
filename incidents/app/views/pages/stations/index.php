<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Puestos de trabajo</h2>
<a href="<?php echo RUTA_URL;?>stations/add" class="btn btn-primary">Añadir</a>
<br></br>
<?php
//Se muestra el mensaje de borrado,insertado,editado correctamente
session_start();
if (isset($_SESSION['success'])) {
    echo('<div id= "success-alert" class="alert alert-success">'.htmlentities($_SESSION['success'])."</div>\n");
    unset($_SESSION['success']);
}
 ?>
<table class="table table-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['stations'] as $station) :  ?>
        <tr>
            <td><?php echo $station->id ?></td>
            <td><?php echo $station->name ?></td>
            <td><?php echo $station->description ?></td>
            <td><?php echo $station->department_name?></td>
            <td>
                <a href="<?php echo RUTA_URL;?>stations/edit/<?php echo $station->id ?>">Editar</a>
                <a href="<?php echo RUTA_URL;?>stations/delete/<?php echo $station->id ?>">Borrar</a>
            </td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

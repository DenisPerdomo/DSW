<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Departamentos</h2>
<a href="<?php echo RUTA_URL;?>departments/add" class="btn btn-primary">Añadir</a>
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
            <th>Sede</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['departments'] as $department) :  ?>
        <tr>
            <td><?php echo $department->id ?></td>
            <td><?php echo $department->name ?></td>
            <td><?php echo $department->description ?></td>
            <td><?php echo $department->office ?></td>
            <td>
                <a href="<?php echo RUTA_URL;?>departments/edit/<?php echo $department->id ?>">Editar</a>
                <a href="<?php echo RUTA_URL;?>departments/delete/<?php echo $department->id ?>">Borrar</a>
            </td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

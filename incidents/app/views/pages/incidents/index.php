<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Incidencias</h2>
<a href="<?php echo RUTA_URL;?>incidents/add" class="btn btn-primary">Añadir</a>
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
            <th>Asunto</th>
            <th>Inicio</th>
            <th>Descripción</th>
            <th>Solución</th>
            <th>Fin</th>
            <th>Puesto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['incidents'] as $incident) :  ?>
        <tr>
            <td><?php echo $incident->id ?></td>
            <td><?php echo $incident->subject ?></td>
            <td><?php echo $incident->start_date ?></td>
            <td><?php echo $incident->description ?></td>
            <td><?php echo $incident->solution ?></td>
            <td><?php echo $incident->end_date ?></td>
            <td><?php echo $incident->station_name?></td>
            <td>
                <a href="<?php echo RUTA_URL;?>incidents/edit/<?php echo $incident->id ?>">Editar</a>
                <a href="<?php echo RUTA_URL;?>incidents/delete/<?php echo $incident->id ?>">Borrar</a>
            </td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

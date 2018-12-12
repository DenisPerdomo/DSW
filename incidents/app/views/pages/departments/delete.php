<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Departamentos</h2>
<a href="<?php echo RUTA_URL; ?>departments" class="btn btn-light">Volver</a>

<div class="card card-body bg-light mt-5">
    <h3>Borrar Departamento</h3>
    <form action="<?php echo RUTA_URL;?>departments/delete/<?php echo $data['id']?>" method="POST">
        <div class="form-group">
            <label for="idName">Nombre</label>
            <input type="text" class="form-control" name="name" value = "<?php echo $data['name'];?>" id="idName" aria-describedby="nameHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idDescription">Descripción</label>
            <input type="text" class="form-control" name="description" value = "<?php echo $data['description'];?>" id="idDescription" aria-describedby="descriptionHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idSede">Sede</label>
            <input type="text" class="form-control" name="office" value = "<?php echo $data['office'];?>" id="idSede" aria-describedby="sedeHelp" disabled>
        </div>
        <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
</div>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

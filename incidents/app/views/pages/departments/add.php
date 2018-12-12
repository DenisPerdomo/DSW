<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Departamentos</h2>
<a href="<?php echo RUTA_URL; ?>departments" class="btn btn-light">Volver</a>

<div class="card card-body bg-light mt-5">
    <h3>Agregar Departamentos</h3>
    <form action="<?php echo RUTA_URL;?>departments/add" method="post">
        <div class="form-group">
            <label for="idName">Nombre</label>
            <input type="text" class="form-control" name="name" id="idName" aria-describedby="nameHelp" placeholder="Añade un nombre">
        </div>
        <div class="form-group">
            <label for="idDescription">Descripción</label>
            <input type="text" class="form-control" name="description" id="idDescription" aria-describedby="descriptionHelp" placeholder="Añade una descripción">
        </div>
        <div class="form-group">
            <label for="idSede">Sede</label>
            <input type="text" class="form-control" name="office" id="idSede" aria-describedby="sedeHelp" placeholder="Añade la sede">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

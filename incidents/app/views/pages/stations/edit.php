<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Puestos de trabajo</h2>
<a href="<?php echo RUTA_URL; ?>stations" class="btn btn-light">Volver</a>

<div class="card card-body bg-light mt-5">
    <h3>Editar Puesto</h3>
    <form action="<?php echo RUTA_URL;?>stations/edit/<?php echo $data['id']?>" method="POST">
        <div class="form-group">
            <label for="idName">Nombre</label>
            <input type="text" class="form-control" name="name" value = "<?php echo $data['name'];?>" id="idName" aria-describedby="nameHelp" placeholder="Añade un nombre">
        </div>
        <div class="form-group">
            <label for="idDescription">Descripción</label>
            <input type="text" class="form-control" name="description" value = "<?php echo $data['description'];?>" id="idDescription" aria-describedby="descriptionHelp" placeholder="Añade una descripción">
        </div>
        <div class="form-group">
            <label for="idDescription">Departamentos</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Departamentos</label>
                </div>
                <select class="custom-select" name = "id_department" id="inputGroupSelect01">
                <option selected>Elige...</option>
                    <?php foreach ($data['departments'] as $department) :  ?>
                        <option value="<?php echo $department->id ?>" <?php echo($department->id == $data['id_department']) ? "SELECTED" : "" ;?>><?php echo $department->name ?></option>
                    <?php endforeach;  ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

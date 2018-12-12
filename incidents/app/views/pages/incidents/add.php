<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Incidencias</h2>
<a href="<?php echo RUTA_URL; ?>incidents" class="btn btn-light">Volver</a>

<div class="card card-body bg-light mt-5">
    <h3>Agregar Incidencia</h3>
    <form action="<?php echo RUTA_URL;?>incidents/add" method="post">
        <div class="form-group">
            <label for="idSubject">Asunto</label>
            <input type="text" class="form-control" name="subject" id="idSubject" aria-describedby="subjectHelp" placeholder="Añade Asunto">
        </div>
        <div class="form-group">
            <label for="idStart_Date">Fecha Inicio</label>
            <input type="date" class="form-control" name="start_date" id="idStart_Date" aria-describedby="start_dateHelp" placeholder="Fecha inicio">
        </div>
        <div class="form-group">
            <label for="idDescription">Descripción</label>
            <input type="text" class="form-control" name="description" id="idDescription" aria-describedby="descriptionName" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <label for="idSolution">Solución</label>
            <input type="text" class="form-control" name="solution" id="idSolution" aria-describedby="solutionHelp" placeholder="Solución">
        </div>
        <div class="form-group">
            <label for="idEndDate">Fecha Fin</label>
            <input type="date" class="form-control" name="end_date" id="idEndDate" aria-describedby="endDateHelp" placeholder="Fecha fin">
        </div>
        <div class="form-group">
            <label for="idStations">Puestos</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Puestos</label>
                </div>
                <select class="custom-select" name = "id_station" id="inputGroupSelect01">
                <option selected>Elige...</option>
                    <?php foreach ($data['stations'] as $station) :  ?>
                        <option value="<?php echo $station->id ?>"><?php echo $station->name ?></option>
                    <?php endforeach;  ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

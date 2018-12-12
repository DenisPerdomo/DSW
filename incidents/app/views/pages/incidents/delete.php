<?php require RUTA_APP .'/views/inc/header.php'; ?>
<h2>Incidencias</h2>
<a href="<?php echo RUTA_URL; ?>incidents" class="btn btn-light">Volver</a>

<div class="card card-body bg-light mt-5">
    <h3>Borrar Incidencia</h3>
    <form action="<?php echo RUTA_URL;?>incidents/delete/<?php echo $data['id']?>" method="POST">
        <div class="form-group">
            <label for="idSubject">Asunto</label>
            <input type="text" class="form-control" name="subject" value="<?php echo $data['subject'];?>" id="idSubject" aria-describedby="subjectHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idStart_Date">Fecha Inicio</label>
            <input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date'];?>" id="idStart_Date" aria-describedby="start_dateHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idDescription">Descripción</label>
            <input type="text" class="form-control" name="description" value="<?php echo $data['description'];?>" id="idDescription" aria-describedby="descriptionName" disabled>
        </div>
        <div class="form-group">
            <label for="idSolution">Solución</label>
            <input type="text" class="form-control" name="solution" value="<?php echo $data['solution'];?>" id="idSolution" aria-describedby="solutionHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idEndDate">Fecha Fin</label>
            <input type="date" class="form-control" name="end_date" value="<?php echo $data['end_date'];?>"  id="idEndDate" aria-describedby="endDateHelp" disabled>
        </div>
        <div class="form-group">
            <label for="idSede">Puesto</label>
            <input type="text" class="form-control" name="office" value = "<?php echo $data['station_name'];?>" id="idSede" aria-describedby="sedeHelp" disabled >
        </div>
        <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
</div>
<?php require RUTA_APP .'/views/inc/footer.php'; ?>

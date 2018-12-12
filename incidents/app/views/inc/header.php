<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>css/bootstrap.min.css">
    <title><?php echo SITENAME ?></title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="<?php echo RUTA_URL; ?>">Incidents</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="#navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarPrincipal">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo RUTA_URL; ?>departments">Departamentos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo RUTA_URL; ?>stations">Puesto Trabajo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo RUTA_URL; ?>incidents">Incidencias</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
              </form>
            </div>
          </nav>
          <h1>APP de Incidencias</h1>

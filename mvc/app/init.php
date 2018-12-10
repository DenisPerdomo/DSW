<?php
//Cargamos librerias
require_once 'config/configuration.php';


//require_once 'libraries/Base.php';
//require_once 'libraries/Controller.php';
//require_once 'libraries/Core.php';

//Autoload php
spl_autoload_register(function ($nombreClase) {
    require_once 'libraries/'.$nombreClase.'.php';
});

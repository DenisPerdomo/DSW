<?php
//Cargamos librerias
require_once 'config/configuration.php';

require_once 'helpers/url_helper.php';

//Autoload php
spl_autoload_register(function ($nombreClase) {
    require_once 'libraries/'.$nombreClase.'.php';
});

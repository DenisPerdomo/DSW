<?php
//Para redireccionar la página
function redireccion($page)
{
    header('Location: '.RUTA_URL.$page);
};

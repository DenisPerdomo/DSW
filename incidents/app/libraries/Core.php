<?php
/*
Mapear la URL del navegador
1- Controlador
2- Método
3- Parámetro
 */
/**
 * Core
 */
class Core
{
    protected $controladorActual = 'IndexController';
    protected $metodoActual = 'index';
    protected $parametros = [];

    //Constructor
    public function __construct()
    {
        $url = $this->getUrl();
        //Buscar si el controlador existe
        if (file_exists('../app/controllers/'.ucwords($url[0]).'Controller.php')) {
            // si existe se configura como controlador por defecto
            $this->controladorActual = ucwords($url[0]).'Controller';
            //unset Indice
            unset($url[0]);
        }

        //Requerir el controlador
        require_once '../app/controllers/'. $this->controladorActual . '.php';
        $this->controladorActual = new $this->controladorActual;

        //Comprobar la segunda parte de la URL.
        //El método.
        if (isset($url[1])) {
            if (method_exists($this->controladorActual, $url[1])) {
                //Comprobamos el método.
                $this->metodoActual = $url[1];
                //Unset indice
                unset($url[1]);
            }
        }

        //Obtener Los parámetros.
        $this->parametros = $url ? array_values($url) : [];

        //Llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

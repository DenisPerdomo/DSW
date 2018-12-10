<?php
//clase controlador principal
//Se encarga de poder cargar los modelos y las vistas
class Controller
{
    //Modelo
    public function model($model)
    {
        //Carga de modelo
        require_once '../app/models/'.$model.'.php';
        //Instanciar el modelo
        return new $model();
    }

    //Vista
    public function view($view, $data = [])
    {
        //Comprobamos que existe el archivo vista
        if (file_exists('../app/views/'.$view.'.php')) {
            //Carga de vista
            require_once '../app/views/'.$view.'.php';
        } else {
            //Si no existe mostramos un mensaje
            die('La vista no existe');
        }
    }
}

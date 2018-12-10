<?php
/**
 * Pages
 */
class Pages extends Controller
{
    public function __construct()
    {
        //Ejemplo
        //$this->articuloModelo = $this->model('Articulo');
    }
    public function index()
    {
        $data = [
            'titulo' => 'Bienvenido a MVC'
        ];
        $this->view('pages/inicio', $data);
    }
}

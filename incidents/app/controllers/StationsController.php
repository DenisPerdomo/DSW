<?php
/**
 * Pages
 */
class StationsController extends Controller
{
    public function __construct()
    {
        //Instanciamos el modelo Puesto de trabajo
        $this->stationModel = $this->model('Station');
    }
    //Método para cargar visto con los departamentos
    public function index()
    {
        //Obtener los puestos de trabajo
        $stations = $this->stationModel->getStations();
        $data = [
            'stations' => $stations
        ];
        $this->view('pages/stations/index', $data);
    }
    //Método para insertar un departamento
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'id_department' => trim($_POST['id_department'])
            ];

            if ($this->stationModel->addStation($data)) {
                session_start();
                $_SESSION['success'] = "Puesto insertado correctamente";
                redireccion('stations');
            } else {
                die('Algo salió mal.');
            }
        } else {
            $this->departmentModel = $this->model('Department');
            $departments = $this->departmentModel->getDepartments();
            $data = [
                'name' => '',
                'description' => '',
                'id_department' => '',
                'departments' => $departments
            ];
            $this->view('pages/stations/add', $data);
        }
    }

    //Método para editar un departamento
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'id_department' => trim($_POST['id_department'])
            ];

            if ($this->stationModel->editStation($data)) {
                session_start();
                $_SESSION['success'] = "Puesto editado correctamente";
                redireccion('stations');
            } else {
                die('Algo salió mal.');
            }
        } else {
            //Comsultamos la info del puesto
            $station = $this->stationModel->getStation($id);
            //Obtenemos los departmentos
            $this->departmentModel = $this->model('Department');
            $departments = $this->departmentModel->getDepartments();
            $data = [
                'id'=> $station->id,
                'name' => $station->name,
                'description' => $station->description,
                'id_department' => $station->id_department,
                'departments' => $departments
            ];
            $this->view('pages/stations/edit', $data);
        }
    }

    //Método para borrar un departamento
    public function delete($id)
    {
        //Consultamos la info del departamento
        $station = $this->stationModel->getStation($id);
        $data = [
            'id'=> $station->id,
            'name' => $station->name,
            'description' => $station->description,
            'id_department' => $station->id_department,
            'department_name' => $station->department_name
        ];

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'id' => $id
            ];

            if ($this->stationModel->deleteStation($data)) {
                session_start();
                $_SESSION['success'] = "Puesto borrado correctamente";
                redireccion('stations');
            } else {
                die('Algo salió mal.');
            }
        }
        $this->view('pages/stations/delete', $data);
    }
}

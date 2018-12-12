<?php
/**
 * Pages
 */
class IncidentsController extends Controller
{
    public function __construct()
    {
        //Instanciamos el modelo Puesto de trabajo
        $this->incidentModel = $this->model('Incident');
    }
    //Método para cargar visto con los departamentos
    public function index()
    {
        //Obtener los puestos de trabajo
        $incidents = $this->incidentModel->getIncidents();
        $data = [
            'incidents' => $incidents
        ];
        $this->view('pages/incidents/index', $data);
    }
    //Método para insertar un departamento
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'subject' => trim($_POST['subject']),
                'start_date' => trim($_POST['start_date']),
                'description' => trim($_POST['description']),
                'solution' => trim($_POST['solution']),
                'end_date' => trim($_POST['end_date']),
                'id_station' => trim($_POST['id_station'])
            ];

            if ($this->incidentModel->addIncident($data)) {
                session_start();
                $_SESSION['success'] = "Incidencia insertada correctamente";
                redireccion('incidents');
            } else {
                die('Algo salió mal.');
            }
        } else {
            $this->stationsModel = $this->model('Station');
            $stations = $this->stationsModel->getStations();
            $data = [
                'subject' => '',
                'start_date' => '',
                'description' => '',
                'solution' => '',
                'end_date' => '',
                'stations' => $stations
            ];
            $this->view('pages/incidents/add', $data);
        }
    }

    //Método para editar una incidencia
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'id' => $id,
                'subject' => trim($_POST['subject']),
                'start_date' => trim($_POST['start_date']),
                'description' => trim($_POST['description']),
                'solution' => trim($_POST['solution']),
                'end_date' => trim($_POST['end_date']),
                'id_station' => trim($_POST['id_station'])
            ];

            if ($this->incidentModel->editIncident($data)) {
                session_start();
                $_SESSION['success'] = "Incidencia editada correctamente";
                redireccion('incidents');
            } else {
                die('Algo salió mal.');
            }
        } else {
            //Comsultamos la info de la incidencia.
            $incident = $this->incidentModel->getIncident($id);
            //Obtenemos los puestos de trabajo
            $this->stationModel = $this->model('Station');
            $stations = $this->stationModel->getStations();
            $data = [
                'id'=> $incident->id,
                'subject' => $incident->subject,
                'description' => $incident->description,
                'start_date' => $incident->start_date,
                'solution' => $incident->solution,
                'end_date' => $incident->end_date,
                'id_station' => $incident->id_station,
                'stations' => $stations
            ];
            $this->view('pages/incidents/edit', $data);
        }
    }

    //Método para borrar una incidencia
    public function delete($id)
    {
        //Consultamos la info de la incidencia
        $incident = $this->incidentModel->getIncident($id);
        $data = [
            'id'=> $incident->id,
            'subject' => $incident->subject,
            'description' => $incident->description,
            'start_date' => $incident->start_date,
            'solution' => $incident->solution,
            'end_date' => $incident->end_date,
            'id_station' => $incident->id_station,
            'station_name' => $incident->station_name
        ];

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'id' => $id
            ];

            if ($this->incidentModel->deleteIncident($data)) {
                session_start();
                $_SESSION['success'] = "Incidencia borrada correctamente";
                redireccion('incidents');
            } else {
                die('Algo salió mal.');
            }
        }
        $this->view('pages/incidents/delete', $data);
    }
}

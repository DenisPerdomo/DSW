<?php
/**
 * Pages
 */
class DepartmentsController extends Controller
{
    public function __construct()
    {
        //Instanciamos el modelo Departamento
        $this->departmentModel = $this->model('Department');
    }
    //Método para cargar visto con los departamentos
    public function index()
    {
        //Obtener los departamentos
        $departments = $this->departmentModel->getDepartments();
        $data = [
            'departments' => $departments
        ];
        $this->view('pages/departments/index', $data);
    }
    //Método para insertar un departamento
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'office' => trim($_POST['office'])
            ];

            if ($this->departmentModel->addDepartment($data)) {
                session_start();
                $_SESSION['success'] = "Departamento insertado correctamente";
                redireccion('departments');
            } else {
                die('Algo salió mal.');
            }
        } else {
            $data = [
                'name' => '',
                'description' => '',
                'office' => ''
            ];
            $this->view('pages/departments/add', $data);
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
                'office' => trim($_POST['office'])
            ];

            if ($this->departmentModel->editDepartment($data)) {
                session_start();
                $_SESSION['success'] = "Departamento editado correctamente";
                redireccion('departments');
            } else {
                die('Algo salió mal.');
            }
        } else {
            //Comsultamos la info del departamento
            $department = $this->departmentModel->getDepartment($id);
            $data = [
                'id'=> $department->id,
                'name' => $department->name,
                'description' => $department->description,
                'office' => $department->office
            ];
            $this->view('pages/departments/edit', $data);
        }
    }

    //Método para borrar un departamento
    public function delete($id)
    {
        //Consultamos la info del departamento
        $department = $this->departmentModel->getDepartment($id);
        $data = [
            'id'=> $department->id,
            'name' => $department->name,
            'description' => $department->description,
            'office' => $department->office
        ];

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'id' => $id
            ];

            if ($this->departmentModel->deleteDepartment($data)) {
                session_start();
                $_SESSION['success'] = "Departamento borrado correctamente";
                redireccion('departments');
            } else {
                die('Algo salió mal.');
            }
        }
        $this->view('pages/departments/delete', $data);
    }
}

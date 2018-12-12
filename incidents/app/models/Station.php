<?php
    /**
     * Modelo Departament
     */
    class Station
    {
        private $db;
        public function __construct()
        {
            $this->db = new Base;
        }

        public function getStations()
        {
            //Consultamos los puestos y el nombre del departamento
            $this->db->query("SELECT *, (SELECT name FROM departments where id = id_department) as department_name FROM stations");
            $results = $this->db->registers();
            return $results;
        }

        public function addStation($data)
        {
            $this->db->query('INSERT INTO stations (name,description,id_department) VALUES (:name, :description, :id_department)');

            //Vincular los valores
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('id_department', $data['id_department']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getStation($id)
        {
            $this->db->query('SELECT *, (SELECT name FROM departments where id = id_department) as department_name FROM stations WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->register();
            return $row;
        }

        public function editStation($data)
        {
            $this->db->query('UPDATE stations SET name = :name,
                description = :description, id_department = :id_department WHERE id = :id');

            //Vincular los valores
            $this->db->bind('id', $data['id']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('id_department', $data['id_department']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        //Borrar departmento
        public function deleteStation($data)
        {
            $this->db->query('DELETE FROM stations WHERE id = :id');

            //Vincular los valores
            $this->db->bind('id', $data['id']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

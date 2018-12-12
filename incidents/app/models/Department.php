<?php
    /**
     * Modelo Departament
     */
    class Department
    {
        private $db;
        public function __construct()
        {
            $this->db = new Base;
        }

        public function getDepartments()
        {
            $this->db->query('SELECT * FROM departments');

            $results = $this->db->registers();

            return $results;
        }

        public function addDepartment($data)
        {
            $this->db->query('INSERT INTO departments (name,description,office) VALUES (:name, :description, :office)');

            //Vincular los valores
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('office', $data['office']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getDepartment($id)
        {
            $this->db->query('SELECT * FROM departments WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->register();
            return $row;
        }

        public function editDepartment($data)
        {
            $this->db->query('UPDATE departments SET name = :name,
                description = :description, office = :office WHERE id = :id');

            //Vincular los valores
            $this->db->bind('id', $data['id']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('office', $data['office']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        //Borrar departmento
        public function deleteDepartment($data)
        {
            $this->db->query('DELETE FROM departments WHERE id = :id');

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

<?php
    /**
     * Modelo Incident
     */
    class Incident
    {
        private $db;
        public function __construct()
        {
            $this->db = new Base;
        }

        public function getIncidents()
        {
            //Consultamos la incidencia y el nombre del puesto al que esta asignado
            $this->db->query("SELECT *, (SELECT name FROM stations where id = id_station) as station_name FROM incidents");
            $results = $this->db->registers();
            return $results;
        }

        public function addIncident($data)
        {
            $this->db->query('INSERT INTO incidents (subject,description,solution,start_date,end_date,id_station) VALUES
             (:subject, :description, :solution, :start_date, :end_date, :id_station)');

            //Vincular los valores
            $this->db->bind('subject', $data['subject']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('solution', $data['solution']);
            $this->db->bind('start_date', $data['start_date']);
            $this->db->bind('end_date', $data['end_date']);
            $this->db->bind('id_station', $data['id_station']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getIncident($id)
        {
            $this->db->query('SELECT *, (SELECT name FROM stations where id = id_station) as station_name FROM incidents WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->register();
            return $row;
        }

        public function editIncident($data)
        {
            $this->db->query('UPDATE incidents SET subject = :subject, description= :description,
                solution = :solution, start_date = :start_date, end_date = :end_date, id_station=:id_station  WHERE id = :id');

            //Vincular los valores
            $this->db->bind('id', $data['id']);
            $this->db->bind('subject', $data['subject']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('solution', $data['solution']);
            $this->db->bind('start_date', $data['start_date']);
            $this->db->bind('end_date', $data['end_date']);
            $this->db->bind('id_station', $data['id_station']);

            //Ejecutar y devolver
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        //Borrar Incidencia
        public function deleteIncident($data)
        {
            $this->db->query('DELETE FROM incidents WHERE id = :id');

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

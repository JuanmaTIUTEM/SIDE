<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model {

    // Método para obtener todos los alumnos
    public function get_all_alumnos() {
        return $this->db->get('catalumnos')->result();
    }

    // Método para crear un nuevo alumno
    public function create_alumno($data) {
        $this->db->insert('catalumnos', $data);
    }

    // Método para obtener los datos de un alumno específico
    public function get_alumno($alumno_id) {
        return $this->db->get_where('catalumnos', array('alumno_id' => $alumno_id))->row();
    }

    // Método para actualizar los datos de un alumno
    public function update_alumno($alumno_id, $data) {
        $this->db->where('alumno_id', $alumno_id);
        $this->db->update('catalumnos', $data);
    }

    // Método para eliminar un alumno
    public function delete_alumno($alumno_id) {
        $this->db->where('alumno_id', $alumno_id);
        $this->db->delete('catalumnos');
    }

}
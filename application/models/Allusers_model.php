<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allusers_model extends CI_Model {

    public function countAllusers() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwallusers');
    }

    public function countAlladmins() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwadmins');
    }

    public function countAlladminstrativos() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwadministrativos');
    }
    public function countAllalumnos() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwalumnos');
    }
    public function countAlldocentes() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwdocentes');
    }
    public function countAlldirectores() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwdirectores');
    }
    public function countAllgroup() {
        // Contar el número total de registros en la tabla allusers
        return $this->db->count_all('vwgroup');
    }

    public function getAllusers($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwallusers');
        return $query->result_array();
    }

    public function getAllAdmins($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwadmins');
        return $query->result_array();
    }

    public function getAllAdminstrativos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwadminstrativos');
        return $query->result_array();
    }


    public function getAllalumnos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwalumnos');
        return $query->result_array();
    }

     public function getAlldocentes($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwdocentes');
        return $query->result_array();
    }

     public function getAlldirectores($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwdirectores');
        return $query->result_array();
    }

      public function getAllgroups($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('vwgroup');
        return $query->result_array();
    }


    public function findUser($id) {
        $this->db->select('*');
               $this->db->from('vwallusers');
               $this->db->like('user_id', $id);
               $query = $this->db->get();

               // Devolver los resultados de la consulta
               return $query->result();
       
    }
    public function userTypes() {
        $this->db->select('*');
               $this->db->from('vwuserTypes');
               $query = $this->db->get();

               // Devolver los resultados de la consulta
               return $query->result_array();
       
    }

    public function careers() {
        $this->db->select('*');
               $this->db->from('catcareers');
               $query = $this->db->get();

               // Devolver los resultados de la consulta
               return $query->result_array();
       
    }

    public function groups() {
        $this->db->select('*');
               $this->db->from('vwgroup');
               $query = $this->db->get();

               // Devolver los resultados de la consulta
               return $query->result_array();
       
    }
    public function createUser($data){
        if($data['career_id'] == ''){
            $data['career_id'] = 'NULL';
        }
        if($data['userType_id'] == ''){
            $data['userType_id'] = 'NULL';
        }
        if($data['group_id'] == ''){
            $data['group_id'] = 'NULL';
        }
        $query = "CALL insNewUser(".$data['userType_id'].",".$data['career_id'].",'".$data['departamento']."',".$data['group_id'].",'".$data['personNamee']."','".$data['personLName']."','".$data['personEmail']."','".$data['userCve']."')";
        $result = $this->db->query($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function changeStatus($data){
        $query ="CALL changeStatus (".$data['id'].");";
        $result = $this->db->query($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function allStudents() {
        $query = $this->db->get('vwalumnos');
        return $query->result_array();
    }
    public function allStudentsGroup($grupo) {
        $this->db->select('*');
        $this->db->from('vwalumnos');
        $this->db->like('groupCve', $grupo['grupo']);
        $query = $this->db->get();
        return $query->result_array();
    }
}



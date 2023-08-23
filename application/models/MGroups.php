<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MGroups extends CI_Model {

    public function countAllGroups(){
            // Contar el número total de registros en la tabla allusers
            return $this->db->count_all('viewGroups');

    }

    public function getGroups($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get('viewGroups');
        return $query->result_array();

    }
    public function fillGroups(){
        $query = $this->db->get('viewGroups');
        return $query->result_array();
    }

    public function findGroup($data){
        $id = $data['groupId'];
        $this->db->select('*');
        $this->db->from('viewgroups');
        $this->db->like('Id', $id);
        $query = $this->db->get();
        $result =  $query->result_array();
        // Devolver los resultados de la consulta
        return $result[0];
           
    }
    public function changeStatus($data){
        $query ="CALL changeStatusG (".$data['idGroup'].");";
        $result = $this->db->query($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function addGroup($data){
        $query ="CALL addGroup(".$data['Career'].",'".$data['Cuatrimestre']."',".$data['Grado'].",".$data['Grupo'].") ";
        $result = $this->db->query($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
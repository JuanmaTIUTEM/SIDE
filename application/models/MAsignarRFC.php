<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAsignarRFC extends CI_Model {

	public function index(){

	}
	public function countAllAssigns() {
	    // Contar el número total de registros en la tabla allusers
	    return $this->db->count_all('vwallrfcs');
	}
	public function getAllRFCs($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get('vwallrfcs');
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function newAssign($data){
		$stdId = $data['student_id'];
		$rfc = $data['rfc'];
		$query = "CALL asignarRFC($stdId,'$rfc');";
		if($this->db->query($query)){
			return true;
		}else{
			return false;
		}
	}

	
	public function changeStatusR($data){
		$id = $data['id'];
		$rfc = $data['rfc'];
		$query = "CALL changeStatusR($id,'$rfc');";
		//return $query;
		if($this->db->query($query)){
			return true;
		}else{
			return false;
		}
	}
	public function getRFCs(){
		$query = $this->db->get('vwallrfcs');
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}

	
}
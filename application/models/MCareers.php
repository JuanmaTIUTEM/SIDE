<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCareers extends CI_Model {

	public function index(){

	}

	public function countAllusers() {
	    // Contar el número total de registros en la tabla allusers
	    return $this->db->count_all('vwallusers');
	}

	public function getCareers($limit, $start) {
	        $this->db->limit($limit, $start);
	        $query = $this->db->get('vwallusers');
	        return $query->result_array();
	    }

}
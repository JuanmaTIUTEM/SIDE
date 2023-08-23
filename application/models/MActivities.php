
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MActivities extends CI_Model {

	public function index(){

	}

	public function allActivities(){
		$query = $this->db->get('vwAllActivitiesUsr');
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function findIsr(){
		$data =$_GET;
		$id = $data['eIdDeclaracion'];
		$query = "SELECT * FROM `isrrfcdec` where eIdStatement = $id";
		$result =$this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res;
		}else{
			return false;
		}
	}
}
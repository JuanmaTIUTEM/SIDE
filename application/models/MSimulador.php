<?php 
date_default_timezone_set('America/Mexico_City');
class MSimulador extends CI_Model 
{
	
	public function init($dataBase){

		$this->db = $this->load->database($dataBase, TRUE);
	
	}

	public function log_in(){
		$this->init('default');
		$user = $_POST['txtRfc'];
		$cveUser = $_SESSION['cveUser'];
		$pass = md5($_POST['password']);
		//$query = "SELECT * FROM vwallrfcs WHERE cveUser = '$cveUser' AND bActive = 1 and txtRfc = '$user' AND txtRfcPass = '$pass'";
		$this->db->select('*');
		$this->db->from('vwallrfcs');
		$this->db->where('cveUser', $cveUser);
		$this->db->where('bActive', 1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$this->db->select('*');
			$this->db->from('vwallrfcs');
			$this->db->where('txtRfc', $user);
			$this->db->where('txtRfcPass', $pass);
			$query2 = $this->db->get();
			$total= $query2->num_rows();
			if( $total == 0 ){
				$info['message']="Usuario o contraseña incorrectos";
				return $info;
			}
			else{
				$result = $query2->result_array();
				$info['data']=$result[0];
				return $info;
				
			}

		}
		else{
			$info['message']="No se tiene asignado un RFC para el Usuario";
			return $info;
		}
	}
	function declara1($data){
		$fecha = date('Y-m-d h:m');
		$sesion = $_SESSION;
		$query = "CALL insstatament('" . $data['periodicidad'] . "','" . $data['txtRFC'] . "','" . $sesion['cveUser'] . "','" . $data['ejercicio'] . "','" . $data['periodo'] . "','" . $data['tipoDeclaracion'] . "','$fecha'," . $data['iSR_1'] . "," . $data['iSR_2'] . "," . $data['iSR_3'] . "," . $data['iVA_1'] . "," . $data['iVA_2'] . ");";
		$result = $this->db->query($query);
		if($result){
			$res = $this->db->query("SELECT MAX(eIdStatement) as lastId FROM catstatements");
			$id = $res->result_array();
			return $id[0]; 
		}else{
			return false;
		}
	}

	function isr1($data){
		$fecha = date('Y-m-d h:m');
		$query = "call insisr1(".$data['fkeIdDeclaracion'].",".$data['totIngresos'].",'".$data['coIngresos']."',".$data['flEfectivos'].",".$data['descIngresos'].",".$data['disIngresos'].",".$data['adIngresos'].",".$data['flTotalIngresos_Determinacion'].",".$data['flBaseGravable'].",'".$data['txtTasaAplicable']."',".$data['flImpuestoMensual'].",".$data['iSRretenido'].",".$data['flImpuestoCargoIsr'].",".$data['flCntAcargo'].",".$data['flTotalContribuciones'].",".$data['subsidioPago'].",".$data['flCompensacionesPago'].",".$data['compensacionesPago'].",".$data['flAplicacionesPago'].",".$data['flTotalContribucionesPago'].",".$data['flAplicaciones'].",".$data['flCantidadCargo'].",".$data['catPagar'].")";
		$result = $this->db->query($query);
		if($result){
			return true; 
		}else{
			return false;
		}
	}
	 
	function getTypesStatements($data){
		$query = "SELECT * FROM vwDeclaraciones WHERE eIdStatement = ".$data['eIdDeclaracion'];
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res[0]; 
		}else{
			return false;
		}
	}
	function getTotalIsr1($data){
		$query = "SELECT flCantidadPago FROM isr_1 WHERE fk_eIdDeclaracion =". $data['eIdDeclaracion'];
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res;
		}else{
			return false;
		}

	}
	function getDeclaracion($data){
		$query = "SELECT * FROM catstatements WHERE eIdStatement =". $data['id'];
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res[0];
		}else{
			return false;
		}
	}

	function getTotalIng(){
		$idDeclaracion = $_GET['eIdDeclaracion'];
		$query ="SELECT txtTotIngresos FROM isr_1 where fk_eIdDeclaracion = $idDeclaracion";
		$result = $this->db->query($query);
		if($result){
			$res = $result->result_array();
			return $res;
		}else{
			return false;
		}
	}
}
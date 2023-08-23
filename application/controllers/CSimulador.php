<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSimulador extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('MSimulador');
	        $this->load->model('MGroups');
	    }

	public function index(){

			$this->load->view('Templates/head');
			$this->load->view('Templates/menuLatAlumnos');
			$this->load->view('simulador/login');
			$this->load->view('Templates/body');
			$this->load->view('Templates/footer');
	}
	public function log_in(){
		$result = $this->MSimulador->log_in();
		//print_r($result);
		if(isset($result['data']))	{
			
			set_cookie($result['data']);
			foreach ($result['data'] as $dato => $value) {
				
				setcookie($dato,$value,time() + 36000,"/");
				
			}
			$this->simulador();
			

		}else{
			$message = $result;
			$this->load->view('Templates/head');
			$this->load->view('Templates/menuLatAlumnos');
			$this->load->view('simulador/login',$message);
			$this->load->view('Templates/body');
			$this->load->view('Templates/footer');
		}

	}

	public function simulador(){
		$this->load->view('simulador/header');
		$this->load->view('simulador/generales');
		$this->load->view('simulador/footer');

	}
	public function declara1(){
		$simGenerales = json_decode(file_get_contents("php://input"), true);
		$result = $this->MSimulador->declara1($simGenerales);
		print_r(json_encode($result));
		/*foreach ($simGenerales as $dato => $value) {
			
			setcookie($dato,$value,time() + 36000,"/");
			$_POST =[$dato = $value];			

			}*/
		}
	public function administracion(){
		$total = $this->MSimulador->getTotalIsr1($_GET);
		$this->load->view('simulador/header');
		if($total){
			$info['totalisr1'] = $total;
			$this->load->view('simulador/administracion',$info);
		}else{
			$this->load->view('simulador/administracion');
		}
		
		$this->load->view('simulador/footer');

	}
	public function isr_1(){

		$this->load->view('simulador/header');
		$this->load->view('simulador/isr_1');
		$this->load->view('simulador/footer');
	}

	public function iva_2(){
		//$info['totIngresos'] = $this->MSimulador->getTotalIng();
		$this->load->view('simulador/header');
		$this->load->view('simulador/iva_2');
		$this->load->view('simulador/footer');
	}

	public function isr1(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MSimulador->isr1($data);
		echo $result;
		//print_r(json_encode($result));
	}

	public function getTypesStatements(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MSimulador->getTypesStatements($data);
		print_r(json_encode($result));
	}

	public function getDeclaracion(){
		$data = json_decode(file_get_contents("php://input"), true);
		$result = $this->MSimulador->getDeclaracion($data);
		print_r(json_encode($result));
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CActivities extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Allusers_model');
	        $this->load->model('MGroups');
	        $this->load->model('MAsignarRFC');
	        $this->load->model('MActivities');
	        $this->load->library('pagination');
	    }

	   public function index()
	   	    {
	   	        // Carga la vista del formulario de inicio de sesión
	   	        $this->load->view('Templates/head');
	   	        $all['allActivities'] = $this->MActivities->allActivities();
	   	        $tot['allusers'] = $this->totales();
	   	        $this->load->view('Templates/menuLat',$tot);
	   	        $this->load->view('Templates/body');
	   	        $this->load->view('actividades/allActivities');
	   	        $this->load->view('actividades/activitiesList',$all);
	   	        $this->load->view('actividades/activitiesAssigned');
	   	        $this->load->view('actividades/activitiesSigned');
	   	        $this->load->view('Templates/footer');
	   	        $this->load->view('actividades/modRFC');
	   	        $this->load->view('actividades/modActividades');
	   	        $this->load->view('users/modnewUser');

	   	    }

	   public function totales()
	    {
		   	$totales['admins'] = $this->Allusers_model->countAlladmins();
		   	$totales['adminstrativos'] = $this->Allusers_model->countAlladminstrativos();
		   	$totales['alumnos'] = $this->Allusers_model->countAllalumnos();
		   	$totales['docentes'] = $this->Allusers_model->countAlldocentes();
		   	$totales['directores'] = $this->Allusers_model->countAlldirectores();
		   	$totales['group'] = $this->Allusers_model->countAllgroup();

		   	return $totales;
	    }


	    public function newAct()
	    {
	        // Carga la vista del formulario de inicio de sesión
	        $this->load->view('Templates/head');
	        $tot['allusers'] = $this->totales();
	        $this->load->view('Templates/menuLat',$tot);
	        $this->load->view('Templates/body');
	        $this->load->view('actividades/viewNewactivitie');
	        $this->load->view('Templates/footer');
	        $this->load->view('actividades/modRFC');
	        $this->load->view('actividades/modActividades');
	        $this->load->view('users/modnewUser');

	    }


}
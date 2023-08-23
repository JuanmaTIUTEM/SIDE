<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Allusers_model');
	         $this->load->library('pagination');
	    }

	    public function index()
	    {
	        // Carga la vista del formulario de inicio de sesión
	        $this->load->view('Templates/head');
	        $tot['allusers'] = $this->totales();
	        $this->load->view('Templates/menuLat',$tot);
	        $this->load->view('Templates/body');
	        $this->allUsers();
	        $this->load->view('Templates/footer');
	        $this->load->view('users/modUsers');
	        $this->load->view('users/modnewUser');

	    }

	   public function allUsers() {
		    $config['base_url'] = site_url('allusers/index');
	        $config['total_rows'] = $this->Allusers_model->countAllusers();
	        $config['per_page'] = 10;
	        $config['uri_segment'] = 3;
	        $config['num_links'] = 2;
	        $config['use_page_numbers'] = TRUE;
	        $config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = 'Primero';
	        $config['first_tag_open'] = '<li class="page-item">';
	        $config['first_tag_close'] = '</li>';
	        $config['last_link'] = 'Último';
	        $config['last_tag_open'] = '<li class="page-item">';
	        $config['last_tag_close'] = '</li>';
	        $config['next_link'] = '&raquo;';
	        $config['next_tag_open'] = '<li class="page-item">';
	        $config['next_tag_close'] = '</li>';
	        $config['prev_link'] = '&laquo;';
	        $config['prev_tag_open'] = '<li class="page-item">';
	        $config['prev_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li class="page-item">';
	        $config['num_tag_close'] = '</li>';

	        // Inicializar la paginación
	        $this->pagination->initialize($config);

	        // Obtener los registros para la página actual
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['allusers'] = $this->Allusers_model->getAllusers($config['per_page'], $page);

	        // Cargar la vista de la tabla paginada
	        $this->load->view('users/allusers_table', $data);
	   }

	   public function totales(){
	   	$totales['admins'] = $this->Allusers_model->countAlladmins();
	   	$totales['adminstrativos'] = $this->Allusers_model->countAlladminstrativos();
	   	$totales['alumnos'] = $this->Allusers_model->countAllalumnos();
	   	$totales['docentes'] = $this->Allusers_model->countAlldocentes();
	   	$totales['directores'] = $this->Allusers_model->countAlldirectores();
	   	$totales['group'] = $this->Allusers_model->countAllgroup();

	   	return $totales;
	   }


	   public function dashAlumnos(){
	   	$this->load->view('Templates/head');
	   	$this->load->view('Templates/menuLatAlumnos');
	   	$this->load->view('Templates/body');
	   	$this->load->view('Templates/footer');

	   }
	   
	    
	
}

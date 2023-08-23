<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        // Carga la librería de validación de formularios
	        $this->load->library('form_validation');
	        $this->load->model('MLogin');
	    }

	    public function index()
	    {
	        // Carga la vista del formulario de inicio de sesión
	        $this->load->view('login/login');
	    }

	    public function authenticate()
	    {
	        // Define las reglas de validación del formulario
	        $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
	        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

	        if ($this->form_validation->run() === FALSE) {
	            // La validación del formulario falla, vuelve a cargar la vista del formulario de inicio de sesión con los errores
	            $this->load->view('login/login');
	        } else {
	            // La validación del formulario es exitosa, realiza la lógica de autenticación aquí
	            // Por ejemplo, verifica las credenciales en la base de datos
	            $username = $this->input->post('username');
	            $password = $this->input->post('password');

	            if ($this->MLogin->login($username, $password)) {
	                // El inicio de sesión es exitoso, redirige a la página principal o a otra página de tu elección
	                //redirect('home');
	            } else {
	                // Las credenciales son inválidas, vuelve a cargar la vista del formulario de inicio de sesión con un mensaje de error
	                $data['error_message'] = 'Credenciales inválidas';
	                //$this->load->view('login/login', $data);
	            }
	        }
	    }

	   public function logout(){
		if(session_destroy()){
			$this->index();
			
			echo true;
		}else{
			echo false;
		}
	}

	
}

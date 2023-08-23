<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCareers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo de allusers
        $this->load->model('MCareers');
    }
}
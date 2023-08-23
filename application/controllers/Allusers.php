<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allusers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo de allusers
        $this->load->model('Allusers_model');
    }

    public function findUser() {
       $user_id = $this->input->get('user_id'); // Obtener el término de búsqueda desde la URL
       $result = $this->Allusers_model->findUser($user_id);
       print_r(json_encode($result[0]));
    }

    public function userTypes() {
       $result = $this->Allusers_model->userTypes();
       print_r(json_encode($result));
    }

    public function careers() {
       $result = $this->Allusers_model->careers();
       print_r(json_encode($result));
    }

    public function groups() {
       $result = $this->Allusers_model->groups();
       print_r(json_encode($result));
    }
    
    public function createUser(){
      $data = $this->input->post();
      $result = $this->Allusers_model->createUser($data);
      print_r(json_encode($result));
    }

    public function changeStatus(){
      $data = $this->input->get();
      $result = $this->Allusers_model->changeStatus($data);
      print_r(json_encode($info['result']= $result));
    }

    public function allStudents(){
      $result = $this->Allusers_model->allStudents();
      print_r(json_encode($result));
    }
    public function fillStudents(){
      $data = $this->input->get();
      //print_r(json_encode($data));
      $result = $this->Allusers_model->allStudentsGroup($data);
      print_r(json_encode($result));
    }




    
}

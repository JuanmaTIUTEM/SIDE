<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Carga la biblioteca CAPTCHA y la sesión
        $this->load->library('session');
        $this->load->helper('captcha');
    }

    public function index()
    {
        // Configuración del CAPTCHA
        $config = array(
            'img_path'      => './captcha/',
            'img_url'       => base_url('captcha/'),
            'img_width'     => '150',
            'img_height'    => '50',
            'word_length'   => 6,
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'expiration'    => 3600 // Tiempo de vida del CAPTCHA en segundos (opcional)
        );

        // Generar el CAPTCHA
        $captcha = create_captcha($config);

        // Almacena el valor del CAPTCHA en la sesión
        $this->session->set_userdata('captcha_code', $captcha['word']);

        // Cargar la vista que muestra la imagen del CAPTCHA
        $data['captcha'] = $captcha;
        $this->load->view('captcha_view', $data);
    }

    public function verify()
    {
        // Obtener el valor ingresado por el usuario
        $user_input = $this->input->post('captcha');

        // Obtener el valor del CAPTCHA almacenado en la sesión
        $captcha_code = $this->session->userdata('captcha_code');

        // Verificar si el valor ingresado coincide con el CAPTCHA almacenado en la sesión
        if ($user_input === $captcha_code) {
            echo 'CAPTCHA válido';
        } else {
            echo 'CAPTCHA inválido';
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/tcpdf/tcpdf.php');

class CResultados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo de allusers
        $this->load->model('MActivities');
    }

    public function isr_1(){
        $this->load->view('results/header');
        $this->load->view('results/isr_1');
        $this->load->view('results/footer');
    }

    public function iva_1(){
        $this->load->view('results/header');
        $this->load->view('results/iva_1');
        $this->load->view('results/footer');
    }

    public function all(){
        $info['isr'] = $this->MActivities->findIsr(); 
        $this->load->view('results/header');
        $this->load->view('results/isr_1',$info);
        $this->load->view('results/iva_1');
        $this->load->view('results/footer');
    }

    public function pdf_isr_1(){

        $pdf = new TCPDF();
        $pdf->AddPage();
        $html = $this->load->view('results/isr_1',[],true);
        
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('example.pdf', 'I');
        //$mpdf = new \Mpdf\Mpdf();
        //$mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
    }

    
}

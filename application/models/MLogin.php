<?php 
class MLogin extends CI_Model 
{
	
	public function init($dataBase){

		$this->db = $this->load->database($dataBase, TRUE);
	
	}
	

	public function login($user,$pass){
		$pass = md5($pass);

        $this->db->select('*');
        $this->db->from('allusers');
        $this->db->where('email', $user);
        $this->db->where('txtPass', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
	        $resultados = $query->result();
	        $userId= $resultados[0]->user_id;
	        $userType= (int)$resultados[0]->userType;
	        switch($userType){
	        	case 1:
		        	$view = "vwadmins";
		        	break;
		        case 2:
		        	$view = "vwdirectores";
		        	break;
		        case 3:
		        	$view = "vwdocentes";
		        	break;
		        case 4:
		        	$view = "vwalumnos";
		        	break;
		        case 5:
		        	$view = "vwadministrativos";
		        	break;
		        default:
		        	$view = false;
		        	break;
	        }
	        
	        if($view){
				$this->db->select('*');
		        $this->db->from($view);
		        $this->db->where('user_id', $userId);
		        $query = $this->db->get();
		        $resultado = $query->row();
		        //print_r($resultado);
		        $user_data = array(
	                'user_id' => $resultado->user_id,
	                'person_id' => $resultado->persona_id,
	                'name' => $resultado->name,
	                'lastName' => $resultado->lastName,
	                'cveUser' => $resultado->cveUser,
	                'userType' => $resultado->userType,
	                'email' => $resultado->email,
	                'logged_in' => TRUE
	            );
		        //print_r($user_data);

		    }
            $this->session->set_userdata($user_data);
            print_r($user_data['userType']);
            if($user_data['userType'] == 4){
            	redirect('dashboardAlumno');
            }else{
            redirect('dashboard'); }
        } else {
            $this->session->set_flashdata('error', 'Credenciales inválidas');
            redirect('log_in');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('log_in');
    }



	

}

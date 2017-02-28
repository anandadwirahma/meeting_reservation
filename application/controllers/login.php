<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	
	function __construct() {
   		parent::__construct();
   		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
 	}

 	function index(){
 		$user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $this->form_validation->set_rules('username', 'Please enter your username.', 'required');
        $this->form_validation->set_rules('password', 'Please enter your password.', 'required');

        if ($user == null || $pass == null) {

        	//--Handler routing if session is not null
            if($this->session->userdata('id_role') == 1){
                redirect(base_url().'admin');
            }elseif($this->session->userdata('id_role') == 2){
                redirect(base_url().'user');
            }
            //--if user pass is null redirect to login page
            $this->load->view('login_view');

        } else {

        	$this->load->model('m_login');
            $result = $this->m_login->validasi($user, $pass);

            //--if loggin is true
            if ($result != false) {
            	$session = array(
                    'id_logged_id' => true,
                    'id_karyawan' => $result['id_karyawan'],
                    'nama' => $result['nama'],
                    'id_role' => $result['id_role']                  
                );
                //--Add session
              	$this->session->set_userdata($session);

              	//--routing controller : as admin or user
                if ($result['id_role'] == 1) {
                    redirect(base_url().'admin');
                } else {
                    redirect(base_url().'user');
                }$this->index();

            } else{

            	//--login is wrong
                redirect(base_url().'login');             
            }

        }

 	}

 	function logout() {       
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
    }

}
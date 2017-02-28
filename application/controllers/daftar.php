<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar extends CI_Controller {
	
	function __construct() {
   		parent::__construct();
   		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
 	}

 	function index(){
		$nama = $this->input->post('nama');
        $departemen = $this->input->post('departemen');
        $id_role = $this->input->post('role');
        $email = $this->input->post('email');
        $notelp = $this->input->post('notelp');    
        $username = $this->input->post('username');
        $password =  md5($this->input->post('password'));
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|email');
        $this->form_validation->set_rules('notelp', 'Notelp', 'required');
        $this->form_validation->set_rules('username', 'Uername', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == TRUE) {

            if (!empty($id_role)) {
                $role = $id_role;
            }else{
                $role = '2';
            }

            $data = array(
                'nama' => $nama,
                'id_departemen' => $departemen,
                'email' => $email,
                'no_telp' => $notelp,
                'username' => $username,
                'password' => $password,
                'id_role' => $role

            );

            $this->db->insert('tb_user', $data);
            redirect(base_url() . 'login');
        }else{
            $this->load->model('admin/m_admin');

            $data['nama'] = $this->session->userdata('nama');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['departemen'] = $this->m_admin->show_departemen();    

            $this->load->view('daftar',$data);
        }
	}
 	
 }
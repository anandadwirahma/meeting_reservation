<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct() {
   		parent::__construct();
   		$this->load->helper(array('form', 'url'));
   		$this->load->library('form_validation');
   		$this->load->library('m_pdf');

   		//load model m_admin
		$this->load->model('admin/m_admin');

		$data['nama'] = $this->session->userdata('nama');
		if (empty($data['nama'])) {
			redirect(base_url() . 'login');
		}
		$this->load->view('admin/header', $data);

		date_default_timezone_set("Asia/Bangkok");
		$current_date = date('Y-m-d');

		//ceking status meeting is On Progress
		$cek_onprog = $this->m_admin->cek_booking_onprog($current_date);
		if (!empty($cek_onprog)) {
			foreach ($cek_onprog as $row_onprog) :
				$id_booking = $row_onprog->id_booking;
				
				$data = array(
            		'status' => 'On Progres'
        		);
        		$this->m_admin->update_status_progdone($id_booking,$data);
			endforeach;
		}

		//ceking status meeting is Done
		$cek_done = $this->m_admin->cek_booking_done($current_date);
		if (!empty($cek_done)) {
			foreach ($cek_done as $row_done) :
				$id_booking = $row_done->id_booking;
				
				$data = array(
            		'status' => 'Done'
        		);
        		$this->m_admin->update_status_progdone($id_booking,$data);
			endforeach;
		}

 	}

	function index(){
		$start_date = $this->input->post('start_date');
		$this->form_validation->set_rules('start_date', 'TGL.', 'required');
		
		$data['startdate'] = null;
		if ($this->form_validation->run() == TRUE) 
		{
			$data['startdate'] = date("Y-m-d", strtotime($start_date));
		}else{
			$data['startdate'] = date('Y-m-d', strtotime('sunday this week', strtotime('last saturday')));
		}		
		
        $startdate = $data['startdate'];
        $end_date = date('Y-m-d', strtotime("+6 days $startdate"));
                  
		$data['ruang'] = $this->m_admin->list_room();	
		$data['data_booking'] = $this->m_admin->list_room_day($startdate,$end_date);
		
		$this->load->view('admin/home',$data);
	}
	
	//============================ for module profile ============================\\
	function lihat_profil(){
		
		//declarasion variable id from session
		$id = $this->session->userdata('id_karyawan');
		$result = $this->m_admin->lihat_profil($id);
		$data = array(
            'data' => $result
        );
		$this->load->view('admin/lihat_profil', $data);
	}
	
	function edit_profil(){

		//declarasion variable id from session
		$id = $this->uri->segment(3);
		$result = $this->m_admin->lihat_profil($id);
		$data = array(
            'data' => $result
        );
		$data['devisi_unselect'] = $this->m_admin->show_departemen_unselected($id);
		$this->load->view('admin/edit_profil', $data);

	}

	function edit_profile_exc(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$departemen = $this->input->post('departemen');
		$email = $this->input->post('email');
		$notelp = $this->input->post('notelp');
		$username = $this->input->post('username');
		$this->form_validation->set_rules('nama', 'Nama.', 'required');
		$this->form_validation->set_rules('departemen', 'Departemen.', 'required');
		$this->form_validation->set_rules('email', 'Email.', 'required|email');
		$this->form_validation->set_rules('notelp', 'No.Telp.', 'required|email');
		$this->form_validation->set_rules('username', 'Username.', 'required');
		$this->form_validation->set_rules('password', 'Password.', 'required');

		$data = array
        (
        	'nama' => $nama,
            'id_departemen' => $departemen,
            'email' => $email,
            'no_telp'=> $notelp,
            'username'=> $username,
        );

        //execute funtion model edit_profil
		$this->m_admin->edit_profil($id,$data);

        redirect(base_url() . 'admin/data_karyawan');
	}

	function ubah_password(){
		$id_karyawan = $this->input->post('id_karyawan');
		$late_pwd = md5($this->input->post('late_pwd'));
		$new_pwd = md5($this->input->post('new_pwd'));
		$confirm_pwd = md5($this->input->post('confirm_pwd'));
		$this->form_validation->set_rules('late_pwd', 'Password Lama.', 'required');
		$this->form_validation->set_rules('new_pwd', 'Password Baru', 'required');
		$this->form_validation->set_rules('confirm_pwd', 'Confirm Password.', 'required');

		if ($this->form_validation->run() == TRUE) 
		{
			$password = $this->m_admin->get_password($id_karyawan);
			if ($password->row()->password == $late_pwd)
			{
				if ($new_pwd == $confirm_pwd) {
					$data = array
        			(
        				'password' => $new_pwd
           			);
           			$this->m_admin->ubah_password($id_karyawan,$data);
           			redirect(base_url() . 'admin/lihat_profil');
				}else{
					$data['id_karyawan'] = $id_karyawan;
					$data['messages'] = 'Please check your input confirm password!';
					$this->load->view('admin/ubah_password',$data);
				};
				
			}else{
				$data['id_karyawan'] = $id_karyawan;
				$data['messages'] = 'Your password is incorrect!';
				$this->load->view('admin/ubah_password',$data);
			};
		}else{
			$data['id_karyawan'] = $this->uri->segment(3);

			$this->load->view('admin/ubah_password',$data);
		}
	}

	//============================ for module data master ============================\\
	//--management ruangan===\\
	function ruang(){
		$flag = $this->uri->segment(3);
			
		$data['ruang'] = $this->m_admin->show_ruangan();
		if ($flag == 1) {
				$data['alert'] = "Data berhasil disimpan";
		}elseif ($flag == 2){
			$data['alert'] = "Data berhasil diedit";
		}elseif ($flag == 3){
			$data['alert'] = "Data berhasil dihapus";
		} else {
			$data['alert'] = "";
		}


		$this->load->view('admin/ruang',$data);
	}

	function tambah_ruang(){
		$nama_ruangan = $this->input->post('nama_ruangan');
		$lokasi = $this->input->post('lokasi');
		$kapasitas = $this->input->post('kapasitas');
		$this->form_validation->set_rules('nama_ruangan','Nama Ruangan.','required');
		$this->form_validation->set_rules('lokasi','Lokasi.','required|number');
		$this->form_validation->set_rules('kapasitas','Kapasitas.','required|number');

		if ($this->form_validation->run() == TRUE) 
		{
			$data = array (
            		'nama_ruang' => $nama_ruangan,
            		'lokasi' => $lokasi,
            		'kapasitas' => $kapasitas
            );
			$this->m_admin->tambah_ruang($data);
			$flag = 1;
			redirect(base_url() . 'admin/ruang/' . $flag);	
		}
		
		$this->load->view('admin/tambah_ruang');
	}

	function edit_ruang(){
		$id_ruang = $this->uri->segment(3);
		
		$data['ruang'] = $this->m_admin->show_edit_ruang($id_ruang);
		$this->load->view('admin/edit_ruang',$data);
	}

	function edit_ruang_exc(){
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$lokasi = $this->input->post('lokasi');
		$kapasitas = $this->input->post('kapasitas');
		$this->form_validation->set_rules('nama_ruangan','Nama Ruangan.','required');
		$this->form_validation->set_rules('lokasi','Lokasi.','required|number');
		$this->form_validation->set_rules('kapasitas','Kapasitas.','required|number');

		if ($this->form_validation->run() == TRUE) 
		{
			$data = array (
            		'nama_ruang' => $nama_ruangan,
            		'lokasi' => $lokasi,
            		'kapasitas' => $kapasitas
            );
			$this->m_admin->edit_ruang($id_ruang,$data);
			$flag = 2;
			redirect(base_url() . 'admin/ruang/' . $flag);	
		}
	}

	function delete_ruang(){
		$id_ruang = $this->uri->segment(3);
		$this->m_admin->delete_ruang($id_ruang);

		$flag = 3;
		redirect(base_url() . 'admin/ruang/' . $flag);
	}

	//--management user===\\
	function data_karyawan(){
		$data['karyawan'] = $this->m_admin->show_user();
		$this->load->view('admin/data_karyawan',$data);
	}
	function delete_user(){
		$id_user = $this->uri->segment(3);
		$this->m_admin->delete_user($id_user);

		redirect(base_url() . 'admin/data_karyawan');
	}

	//============================ for module Booking ruangan ============================\\
	//-- booking ruangan--\\
	function book_room(){

		$tgl = $this->input->post('tanggal');
		$jml_psrta = $this->input->post('jml_psrta');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$this->form_validation->set_rules('tanggal', 'Tanggal.', 'required');
		$this->form_validation->set_rules('jml_psrta', 'Jumlah Peserta.', 'required');
		$this->form_validation->set_rules('start_time', 'Start_time.', 'required');
		$this->form_validation->set_rules('end_time', 'End_time.', 'required');
		
		$tgl_meeting = date("Y-m-d", strtotime($tgl));
		$tgl_psn = date('Y-m-d');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($tgl_meeting < $tgl_psn){
				redirect(base_url() . 'admin/book_room/' . 2);
			}

			//--Show form booking
			
			//ambil ruangan yang sesuai kapasitas
			$data['ruang'] = $this->m_admin->show_room($jml_psrta,$tgl,$start_time,$end_time);
			//ambil list email
			$data['email'] = $this->m_admin->show_email();
			$data['prs_frm'] = array (
				'tgl' => $tgl,
        		'jml_psrta' => $jml_psrta,
            	'start_time' => $start_time,
            	'end_time' => $end_time
            );
            
            //tampilkan form booking dgn membawa data email & ruangan
			$this->load->view('admin/form_book_room',$data);
		}else{

			//get alert ruangan not available
			$flag = 0;
			$flag = $this->uri->segment(3);
			if ($flag == 1) {
				$data['alert'] = "Ruangan sudah di booking pada waktu tersebut";
			}
			elseif ($flag == 2) {
				$data['alert'] = "Tanggal yang anda masukan salah";
			}
			else {
				$data['alert'] = "";
			}
			
			$this->load->view('admin/book_room',$data);
		}
						
	}

	function book_room_exc(){
		$id_karyawan = $this->session->userdata('id_karyawan');
		$tgl = $this->input->post('tanggal');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$email = $this->input->post('email');
		$ruang = $this->input->post('ruang');
		$topik = $this->input->post('topik');
		$this->form_validation->set_rules('tanggal', 'Tanggal.', 'required');
		$this->form_validation->set_rules('start_time', 'Start_time.', 'required');
		$this->form_validation->set_rules('end_time', 'End_time.', 'required');
		$this->form_validation->set_rules('email', 'Email.', 'required');
		$this->form_validation->set_rules('ruang', 'Ruang.', 'required');
		$this->form_validation->set_rules('topik', 'Topik.', 'required');

		$tgl_meeting = date("Y-m-d", strtotime($tgl));
		$tgl_psn = date('Y-m-d');

		//If form booking room submmited
		if ($this->form_validation->run() == TRUE) 
		{
			//--ceking jam tersedia
			$a = $this->m_admin->show_status_room_a($ruang,$tgl_meeting,$start_time,$end_time);
			$b = $this->m_admin->show_status_room_b($ruang,$tgl_meeting,$start_time,$end_time);
			$c = $this->m_admin->show_status_room_c($ruang,$tgl_meeting);
			$d = $this->m_admin->show_status_room_d($ruang,$tgl_meeting);

			$row_c = $c->row();
			$row_d = $d->row();
			
			//--handle ceking jadwal tidak tersedia
			if( $start_time > $row_c->jam_mulai && $start_time < $row_d->jam_akhir || $end_time > $row_c->jam_mulai && $end_time < $row_d->jam_akhir){
				redirect(base_url() . 'admin/book_room/' . '1');
			}

			if(!empty($a) or !empty($b)){
				redirect(base_url() . 'admin/book_room/' . '1');
			}
			
			//--Jadwal booking tersedia
			//get uniq id number for id_det_booking 
			$id_det_booking = $this->m_admin->select_max_id('tb_det_booking','id_det_booking');
			$data_det_booking = array (
				'id_det_booking' => $id_det_booking,
        		'id_ruang' => $ruang,
            	'tanggal_psn' => $tgl_psn,
            	'tanggal_meeting' => $tgl_meeting,
            	'jam_mulai' => $start_time,
            	'jam_akhir'=> $end_time,
            	'topik' => $topik
            );
            //insert_to_tb_detail_booking        
			$this->m_admin->insert_booking('tb_det_booking',$data_det_booking);

			//get uniq id number for id_booking 
			$id_booking = $this->m_admin->select_max_id('tb_booking','id_booking');
			$data_booking = array (
				'id_booking' => $id_booking,
				'id_karyawan' => $id_karyawan,
        		'id_det_booking' => $id_det_booking,
            	'status' => 'Upcoming'
            );
            //insert_to_tb_booking
            $this->m_admin->insert_booking('tb_booking',$data_booking);
            
            //get list peserta meeting
            for ($i = 0; $i < count($email); $i++) {
            	$data_peserta = array (
            		'id_booking' => $id_booking,
            		'id_karyawan' => $email[$i]
            	);
            	//insert_to_tb_peserta
            	$this->m_admin->insert_booking('tb_peserta',$data_peserta);	 
			}
			redirect(base_url() . 'mailing/meetingMail/' . $id_booking . '/' . $id_det_booking);
		}

	}	

	//-- reschedule booking ruangan--\\
	function reschedule(){
		$id_booking = $this->input->post('id_booking');
		$id_det_booking = $this->input->post('id_det_booking');
		$tgl = $this->input->post('tanggal');
		$jml_psrta = $this->input->post('jml_psrta');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$this->form_validation->set_rules('tanggal', 'Tanggal.', 'required');
		$this->form_validation->set_rules('jml_psrta', 'Jumlah Peserta.', 'required');
		$this->form_validation->set_rules('start_time', 'Start_time.', 'required');
		$this->form_validation->set_rules('end_time', 'End_time.', 'required');

		//jika form di submit(search ruangan)
		if ($this->form_validation->run() == TRUE) 
		{
			//--Show form booking

			//ambil ruangan yang sesuai kapasitas
			$data['ruang'] = $this->m_admin->show_room_edit($id_det_booking,$jml_psrta);
			//ambil list email yg ikut meeting
			$data['email_selected'] = $this->m_admin->show_email_selected($id_booking);
			//ambil list email yg tdk ikut meeting
			$data['email_unselected'] = $this->m_admin->show_email_unselected($id_booking);
			//ambil info topik
			$data['topik'] = $this->m_admin->get_topik($id_det_booking);
			
			$data['prs_frm'] = array (
				'tgl' => $tgl,
        		'jml_psrta' => $jml_psrta,
            	'start_time' => $start_time,
            	'end_time' => $end_time,
            	'id_booking' => $id_booking,
            	'id_det_booking' => $id_det_booking
            );
            
            //tampilkan form booking dgn membawa data email & ruangan
			$this->load->view('admin/form_reschedule',$data);
		}else{
			$data['id_booking'] = $this->uri->segment(4);
			$data['id_det_booking'] = $this->uri->segment(5);
			
			//get alert ruangan not available
			$flag = 0;
			$flag = $this->uri->segment(3);
			if ($flag == 1) {
				$data['alert'] = "Ruangan sudah di booking pada waktu tersebut";
			}else {
				$data['alert'] = "";
			}
			
			$data['dt_book'] = $this->m_admin->show_booking($data['id_det_booking']);
			
			$this->load->view('admin/reschedule',$data);
		}

	}

	function reschedule_exc(){
		$id_booking = $this->input->post('id_booking');
		$id_det_booking = $this->input->post('id_det_booking');
		$id_karyawan = $this->session->userdata('id_karyawan');
		$tgl = $this->input->post('tanggal');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$email = $this->input->post('email');
		$ruang = $this->input->post('ruang');
		$topik = $this->input->post('topik');
		$this->form_validation->set_rules('tanggal', 'Tanggal.', 'required');
		$this->form_validation->set_rules('start_time', 'Start_time.', 'required');
		$this->form_validation->set_rules('end_time', 'End_time.', 'required');
		$this->form_validation->set_rules('email', 'Email.', 'required');
		$this->form_validation->set_rules('ruang', 'Ruang.', 'required');
		$this->form_validation->set_rules('topik', 'Topik.', 'required');

		$tgl_meeting = date("Y-m-d", strtotime($tgl));
		$tgl_psn = date('Y-m-d');

		//If form booking room submmited
		if ($this->form_validation->run() == TRUE) 
		{
			//--ceking jam tersedia
			$a = $this->m_admin->show_status_room_a($ruang,$tgl_meeting,$start_time,$end_time);
			$b = $this->m_admin->show_status_room_b($ruang,$tgl_meeting,$start_time,$end_time);
			$c = $this->m_admin->show_status_room_c($ruang,$tgl_meeting);
			$d = $this->m_admin->show_status_room_d($ruang,$tgl_meeting);

			$row_c = $c->row();
			$row_d = $d->row();
			
			//--handle ceking jadwal tidak tersedia
			if( $start_time > $row_c->jam_mulai && $start_time < $row_d->jam_akhir || $end_time > $row_c->jam_mulai && $end_time < $row_d->jam_akhir){
				redirect(base_url() . 'admin/reschedule/'.'1/'.$id_booking.'/'.$id_det_booking);
			}

			if(!empty($a) or !empty($b)){
				redirect(base_url() . 'admin/reschedule/'.'1/'.$id_booking.'/'.$id_det_booking);
			}
			
			//--Jadwal booking tersedia
			$data_det_booking = array (
				'id_ruang' => $ruang,
            	'tanggal_meeting' => $tgl_meeting,
            	'jam_mulai' => $start_time,
            	'jam_akhir'=> $end_time,
            	'topik' => $topik
            );
          	
          	//update tb_detail_booking
			$this->m_admin->update_schedule('tb_det_booking','id_det_booking',$id_det_booking,$data_det_booking);
	
			//cleansing data peserta
			$this->m_admin->cleansing_peserta($id_booking);

			//get list peserta meeting
            for ($i = 0; $i < count($email); $i++) {
            	$data_peserta = array (
            		'id_booking' => $id_booking,
            		'id_karyawan' => $email[$i]
            	);
            	//insert_to_tb_peserta
            	$this->m_admin->insert_booking('tb_peserta',$data_peserta);	 
			}
			redirect(base_url() . 'mailing/rescheduleMail/' . $id_booking . '/' . $id_det_booking);
		}

	}

	//-- jadwal booking/history--\\
	function history(){

		$data['history'] = $this->m_admin->show_history();
		
		$this->load->view('admin/history',$data);
	}

	function cancel_booking(){
		$id_booking = $this->uri->segment(3);
		$id_det_booking = $this->uri->segment(4);

		//delete record in tb_peserta
        //$this->m_admin->cancel_booking('tb_peserta','id_booking',$id_booking);
        
        //update status in tb_booking
        $this->m_admin->update_status_booking($id_booking);
        
        redirect(base_url() . 'mailing/cancelMail/' . $id_booking . '/' . $id_det_booking);
	}

	//============================ for module laporan ============================\\
	function laporan(){
		$start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
		$end_date = date("Y-m-d", strtotime($this->input->post('end_date')));
		$this->form_validation->set_rules('start_date', 'Start_Date.', 'required');
		$this->form_validation->set_rules('end_date', 'End_Date.', 'required');


		if ($this->form_validation->run() == TRUE) 
		{
			$data['laporan'] = $this->m_admin->show_laporan($start_date,$end_date);
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$this->load->view('admin/laporan',$data); 
		}else{
			$data['laporan'] = $this->m_admin->show_history();
			$data['start_date'] = "";
			$data['end_date'] = "";
			$this->load->view('admin/laporan',$data);
		}
	}

	function cetaklaporan(){
		$start_date = $this->input->post('startdate_cetak');
		$end_date = $this->input->post('enddate_cetak');
		$this->form_validation->set_rules('startdate_cetak', 'Start_Date.', 'required');
		$this->form_validation->set_rules('enddate_cetak', 'End_Date.', 'required');

		if (empty($start_date) && empty($end_date)) {
			$data['min_max_tgl'] = $this->m_admin->min_max_tgl_meeting();
			foreach ($data['min_max_tgl'] as $row) : 
        	    $start_periode = $row->start_date;
                $end_periode = $row->end_date;
            endforeach;
			$data['summary_booking'] = $this->m_admin->summary_booking($start_periode,$end_periode);
			$data['laporan'] = $this->m_admin->show_history();
			$sumber = $this->load->view('admin/v_laporan', $data, TRUE);
		}else{
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['min_max_tgl'] = $this->m_admin->min_max_tgl_meeting();
			foreach ($data['min_max_tgl'] as $row) : 
        	    $start_periode = $row->start_date;
                $end_periode = $row->end_date;
            endforeach;
			$data['summary_booking'] = $this->m_admin->summary_booking($start_periode,$end_periode);
			$data['laporan'] = $this->m_admin->show_laporan($start_date,$end_date);
			$sumber = $this->load->view('admin/v_laporan', $data, TRUE);
		};

		$sumber = $this->load->view('admin/v_laporan',$data,TRUE);
		$html = $sumber;
        $pdfFilePath = "laporan_peminjaman_ruang.pdf";
 		
 		//lokasi file css yang akan di load
        $css = $this->load->view('admin/v_laporan');;
        
        $stylesheet = file_get_contents($css);
 
        $pdf = $this->m_pdf->load();
 
        $pdf->AddPage('L');
		$pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
 	}


}
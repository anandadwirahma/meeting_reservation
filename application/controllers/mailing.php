<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mailing extends CI_Controller {
	
  function __construct() {
   		parent::__construct();
   		$this->load->model('m_mailing');
  }

  function index(){
		//echo $id_booking;exit;
	}

  function meetingMail(){
   	$id_booking = $this->uri->segment(3);
   	$id_det_booking = $this->uri->segment(4);
    $id_karyawan = $this->session->userdata('id_karyawan');
		
		$get_psrta = $this->m_mailing->get_list_peserta($id_booking);
		$get_jdwl_meeting = $this->m_mailing->get_jdwl_meeting($id_det_booking);
    $get_role = $this->m_mailing->get_role($id_karyawan);
    $get_member = $this->m_mailing->get_list_member($id_booking);
    
		$row_jdwl = $get_jdwl_meeting->row();
    
    foreach ($get_psrta as $row) {
      
      $member=array();
      foreach ($get_member as $row_member) {
        $member[]=$row_member->nama;
      }
      $member_implode=implode(", ", $member);

		$message = 'Dear ' . $row->nama . ', <br><br>

		Diharapkan kehadiran bapak/ibu saudara untuk mengikuti meeting yang akan dilaksanakan pada : <br><br>

		Judul : <b>' . $row_jdwl->topik .'</b><br>
		Hari / Tanggal  : ' . date_format(date_create($row_jdwl->tgl),"D ,M Y") . '<br>
		Tempat : Ruang ' . $row_jdwl->nama_ruang . ' (' . $row_jdwl->lokasi .')<br>
		Waktu : ' . $row_jdwl->waktu . '<br> <br>

    ---------------------------------------------------------<b><br>'
    . $row_jdwl->topik . '</b><br>
    Reservator : ' . $get_role->row()->nama . '<br>
    Member     : ' . $member_implode .
      
    '<br> 
    ---------------------------------------------------------- <br> <br>

		<i>Thanks & Regards,</i>';
		
    	$config = Array(
  			'protocol' => 'smtp',
  			'smtp_host' => 'ssl://smtp.googlemail.com',
  			'smtp_port' => 465,
  			'smtp_user' => '247.mettingroom@gmail.com', // change it to yours
  			'smtp_pass' => 'admin247', // change it to yours
  			'mailtype' => 'html',
  			'charset' => 'iso-8859-1',
  			'wordwrap' => TRUE
		  );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
      	$this->email->from('247.mettingroom@gmail.com'); // change it to yours
      	$this->email->to($row->email);// change it to yours
      	$this->email->subject($row_jdwl->topik);
      	$this->email->message($message);
      	
      	

      if(!$this->email->send())
     	{
     		show_error($this->email->print_debugger());exit;
    	}

    }

    $role = $get_role->row()->id_role;
    //for routing redirect
    if ($role == 2) {
      redirect(base_url() . 'user/history');
    }else{
      redirect(base_url() . 'admin/history');
    }

	}

  function rescheduleMail(){
    $id_booking = $this->uri->segment(3);
    $id_det_booking = $this->uri->segment(4);
    $id_karyawan = $this->session->userdata('id_karyawan');
    
    $get_psrta = $this->m_mailing->get_list_peserta($id_booking);
    $get_jdwl_meeting = $this->m_mailing->get_jdwl_meeting($id_det_booking);
    $get_role = $this->m_mailing->get_role($id_karyawan);
    $get_member = $this->m_mailing->get_list_member($id_booking);

    $row_jdwl = $get_jdwl_meeting->row();

    foreach ($get_psrta as $row) :

      $member=array();
      foreach ($get_member as $row_member) {
        $member[]=$row_member->nama;
      }
      $member_implode=implode(", ", $member);

    $message = 'Dear ' . $row->nama . ', <br><br>

    Dengan ini diberitahukan perihal adanya <b>Reschedule</b> meeting sebagai berikut : <br><br>

    Judul : <b>' . $row_jdwl->topik .'</b><br>
    Hari / Tanggal  : ' . date_format(date_create($row_jdwl->tgl),"D ,M Y") . '<br>
    Tempat : Ruang ' . $row_jdwl->nama_ruang . ' (' . $row_jdwl->lokasi .')<br>
    Waktu : ' . $row_jdwl->waktu . '<br> <br>

    ---------------------------------------------------------<b><br>'
    . $row_jdwl->topik . '</b><br>
    Reservator : ' . $get_role->row()->nama . '<br>
    Member     : ' . $member_implode .
      
    '<br> 
    ---------------------------------------------------------- <br> <br>

    <i>Thanks & Regards,</i>';
    
      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => '247.mettingroom@gmail.com', // change it to yours
        'smtp_pass' => 'admin247', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('247.mettingroom@gmail.com'); // change it to yours
        $this->email->to($row->email);// change it to yours
        $this->email->subject('[Reschedule Meeting] ' . $row_jdwl->topik);
        $this->email->message($message);

        if(!$this->email->send())
        {
          show_error($this->email->print_debugger());exit;
        }

    endforeach;

   $role = $get_role->row()->id_role;
    //for routing redirect
    if ($role == 2) {
      redirect(base_url() . 'user/history');
    }else{
      redirect(base_url() . 'admin/history');
    }

  }

  function cancelMail(){
    $id_booking = $this->uri->segment(3);
    $id_det_booking = $this->uri->segment(4);
    $id_karyawan = $this->session->userdata('id_karyawan');
    
    $get_psrta = $this->m_mailing->get_list_peserta($id_booking);
    $get_jdwl_meeting = $this->m_mailing->get_jdwl_meeting($id_det_booking);
    $get_role = $this->m_mailing->get_role($id_karyawan);
    $get_member = $this->m_mailing->get_list_member($id_booking);

    $row_jdwl = $get_jdwl_meeting->row();

    foreach ($get_psrta as $row) :

      $member=array();
      foreach ($get_member as $row_member) {
        $member[]=$row_member->nama;
      }
      $member_implode=implode(", ", $member);

    $message = 'Dear ' . $row->nama . ', <br><br>

    Dengan ini diberitahukan meeting yang akan dilaksanakan pada : <br><br>

    Judul : <b>' . $row_jdwl->topik .'</b><br>
    Hari / Tanggal  : ' . date_format(date_create($row_jdwl->tgl),"D ,M Y") . '<br>
    Tempat : Ruang ' . $row_jdwl->nama_ruang . ' (' . $row_jdwl->lokasi .')<br>
    Waktu : ' . $row_jdwl->waktu . '<br> <br>

    <b>TIDAK JADI</b> dilaksanakan. Untuk informasi updatenya akan diberitahukan lebih lanjut.<br><br>
    Demikian pemberitahuan ini dibuat, untuk perhatian dan kerjasamanya kami ucapkan terima kasih.<br><br>

    ---------------------------------------------------------<b><br>'
    . $row_jdwl->topik . '</b><br>
    Reservator : ' . $get_role->row()->nama . '<br>
    Member     : ' . $member_implode .
      
    '<br> 
    ---------------------------------------------------------- <br> <br>


    <i>Thanks & Regards,</i>';
    
      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => '247.mettingroom@gmail.com', // change it to yours
        'smtp_pass' => 'admin247', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('247.mettingroom@gmail.com'); // change it to yours
        $this->email->to($row->email);// change it to yours
        $this->email->subject('[Cancel Meeting] ' . $row_jdwl->topik);
        $this->email->message($message);

        if(!$this->email->send())
        {
          show_error($this->email->print_debugger());exit;
        }

    endforeach;

   $role = $get_role->row()->id_role;
    //for routing redirect
    if ($role == 2) {
      redirect(base_url() . 'user/history');
    }else{
      redirect(base_url() . 'admin/history');
    }

  }

}
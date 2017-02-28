<?php

Class m_user extends CI_Model {

	//============================ for controller construct ============================\\
	function cek_booking_onprog($current_date){
		$sql = "SELECT b.id_booking as id_booking
			from tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			where b.`status` = 'Upcoming'
			and a.tanggal_meeting = '$current_date'
			and DATE_FORMAT(NOW(),'%H:%i:00') > jam_mulai
			and DATE_FORMAT(NOW(),'%H:%i:00') < jam_akhir";

		return $this->db->query($sql)->result();
	}

	function cek_booking_done($current_date){
		$sql = "SELECT b.id_booking as id_booking
			from tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			where b.`status` in ('Upcoming','On Progres')
			and a.tanggal_meeting = '$current_date'
			and jam_akhir < DATE_FORMAT(NOW(),'%H:%i:00')
			UNION ALL
			SELECT b.id_booking as id_booking
			from tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			where b.`status` in ('Upcoming','On Progres')
			and a.tanggal_meeting < '$current_date'";

		return $this->db->query($sql)->result();
	}
	
	function update_status_progdone($id,$data){
		$this->db->where('id_booking', $id);
        $this->db->update('tb_booking', $data);
	}

	//============================ for controller index ============================\\
	function list_room(){
		$this->db->select("*");
		$this->db->from("tb_ruang");
		$this->db->order_by("id_ruang", "asc");
        
        return $this->db->get()->result();
	}

	function list_room_day($start_date,$end_date){
		$sql = "select c.nama as nama,a.id_ruang as id_ruang,a.tanggal_meeting as tgl,lower(date_format(a.tanggal_meeting, '%W')) as hari,CONCAT(SUBSTR(a.jam_mulai,1,5),'-',SUBSTR(a.jam_akhir,1,5)) as waktu,b.status as status
			from tb_det_booking a
			INNER JOIN tb_booking b
			on a.id_det_booking = b.id_det_booking
			INNER JOIN tb_user c
			on b.id_karyawan = c.id_karyawan
			WHERE a.tanggal_meeting BETWEEN '$start_date' and '$end_date'";
			
        return $this->db->query($sql)->result();
	}

	//============================ for module profile ============================\\
	function lihat_profil($id){
		$sql = "select * 
			from tb_user a
			INNER JOIN tb_departemen b
			ON a.id_departemen = b.id_departemen
			where a.id_karyawan = '$id'";

		return $this->db->query($sql)->result();
	}

	//--untuk update profile
	function edit_profil($id,$data){
		$this->db->where('id_karyawan', $id);
        $this->db->update('tb_user', $data);
	}

	//-untuk mengeluarkan nama departemen selain id_karyawan yang terpilih
	function show_departemen_unselected($id){
		$sql = "select a.id_departemen as id_departemen,a.departemen as departemen
			from tb_departemen a
			WHERE a.id_departemen NOT IN (
			SELECT id_departemen
			FROM tb_user
			where id_karyawan = '$id')";

		return $this->db->query($sql)->result();
	}

	//--for update password--\\
	function get_password($id){
		$this->db->select('password');
		$this->db->where('id_karyawan',$id);
        $this->db->from('tb_user');
        $row = $this->db->get();
        return $row;
	}

	function ubah_password($id_karyawan,$data){
		$this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('tb_user', $data);
	}

	//============================ for module booking ruangan ============================\\
	function show_status_room_book($tgl,$start_time,$end_time){
		$sql = "SELECT distinct b.id_ruang as id_ruang,b.nama_ruang as nama_ruang,a.tanggal_meeting
		FROM tb_det_booking a
		LEFT JOIN tb_ruang b
		ON a.id_ruang = b.id_ruang
		where tanggal_meeting = '$tgl'
		and (jam_mulai >= '$start_time' or jam_akhir <= '$end_time')";

		return $this->db->query($sql)->result();
	}

	function show_room($jml_psrta){
		$sql = "SELECT * from tb_ruang where kapasitas >= $jml_psrta";
		return $this->db->query($sql)->result();
	}

	function show_email(){
		$this->db->select("id_karyawan,email");
		$this->db->from("tb_user");
        return $this->db->get()->result();
	}

	function show_status_room_a($ruang,$tgl,$start_time,$end_time){
		$sql = "select * from tb_booking a
			INNER JOIN tb_det_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang c
			ON b.id_ruang = c.id_ruang
			where `status` not IN ('Canceled','Done')
			and c.id_ruang = '$ruang'
			and b.tanggal_meeting = '$tgl'
			and b.jam_mulai BETWEEN '$start_time' and '$end_time'";

		return $this->db->query($sql)->result();			
	}

	function show_status_room_b($id_ruang,$tgl,$start_time,$end_time){
		$sql = "select * from tb_booking a
			INNER JOIN tb_det_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang c
			ON b.id_ruang = c.id_ruang
			where `status` not IN ('Canceled','Done')
			and c.id_ruang = '$id_ruang'
			and b.tanggal_meeting = '$tgl'
			and b.jam_akhir BETWEEN '$start_time' and '$end_time'";

			return $this->db->query($sql)->result();
	}

	function show_status_room_c($id_ruang,$tgl){
		$sql = "select c.id_ruang,b.jam_mulai
			from tb_booking a
			INNER JOIN tb_det_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang c
			ON b.id_ruang = c.id_ruang
			where `status` not IN ('Canceled','Done')
			and c.id_ruang = '$id_ruang'
			and b.tanggal_meeting = '$tgl'";

		$row = $this->db->query($sql);
		return $row;
	}

	function show_status_room_d($id_ruang,$tgl){
		$sql = "select c.id_ruang,b.jam_akhir
			from tb_booking a
			INNER JOIN tb_det_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang c
			ON b.id_ruang = c.id_ruang
			where `status` not IN ('Canceled','Done')
			and c.id_ruang = '$id_ruang'
			and b.tanggal_meeting = '$tgl'";

		$row = $this->db->query($sql);
		return $row;
	}

	function select_max_id($tablename,$columnid){
		$this->db->select_max("$columnid");
        $query = $this->db->get("$tablename")->row_array();
        $id = $query["$columnid"];
        if ($id == null) {
            $id = 1;
        } else {
            $id = 1 + $query["$columnid"];
        }
        return $id;
	}

	function insert_booking($tablename,$data){
		$this->db->insert("$tablename", $data);
	}

	//--untuk cancel booking
	function cancel_booking($tablename,$columnn,$id){
		$this->db->where("$columnn", $id);
        $this->db->delete("$tablename");
	}

	function update_status_booking($id){
		$this->db->set('status', 'Canceled');
		$this->db->where('id_booking', $id);
		$this->db->update('tb_booking'); 
	}

	//--module reschedule booking ruang--\\
	function show_room_edit($id_det_booking,$jml_psrta){
		$sql = "select a.id_ruang as id_ruang,a.nama_ruang as nama_ruang
			from tb_ruang a
			INNER JOIN tb_det_booking b
			ON a.id_ruang = b.id_ruang
			WHERE b.id_det_booking = '$id_det_booking'
			UNION ALL
			select id_ruang ,nama_ruang 
			from tb_ruang 
			WHERE id_ruang not in (
			select a.id_ruang as id_ruang
			from tb_ruang a
			INNER JOIN tb_det_booking b
			ON a.id_ruang = b.id_ruang
			WHERE b.id_det_booking = '$id_det_booking'
			and a.kapasitas >= '$jml_psrta' )";

		return $this->db->query($sql)->result();
	}

	function show_email_selected($id_booking){
		$sql = "SELECT a.id_karyawan as id_karyawan,a.email as email
			from  tb_user a
			INNER JOIN tb_peserta b 
			ON a.id_karyawan = b.id_karyawan
			WHERE b.id_booking = '$id_booking'";

		return $this->db->query($sql)->result();
	}

	function show_email_unselected($id_booking){
		$sql = "SELECT id_karyawan,email
			from  tb_user
			WHERE id_karyawan not in (
			SELECT a.id_karyawan as id_karyawan
			from  tb_user a
			INNER JOIN tb_peserta b 
			ON a.id_karyawan = b.id_karyawan
			WHERE b.id_booking = '$id_booking')";

		return $this->db->query($sql)->result();
	}

	function get_topik($id_det_booking){
		$this->db->select("topik");
		$this->db->where('id_det_booking',$id_det_booking);
        $this->db->from("tb_det_booking");
        return $this->db->get()->result();
	}

	function show_booking($id){
		$sql = "SELECT DATE_FORMAT(a.tanggal_meeting,'%m/%d/%Y') as tgl,a.jam_mulai as jam_mulai,a.jam_akhir as jam_akhir,COUNT(c.id_karyawan) as tot_psrta
				FROM tb_det_booking a
				INNER JOIN tb_booking b
				ON a.id_det_booking = b.id_det_booking
				INNER JOIN tb_peserta c
				ON b.id_booking = c.id_booking
				where a.id_det_booking = $id
				GROUP BY tgl,jam_mulai,jam_akhir";

		return $this->db->query($sql)->result();
	}

	function update_schedule($tablename,$columnn_id,$id,$data){
		$this->db->where("$columnn_id", $id);
		$this->db->update("$tablename", $data); 
	}

	function cleansing_peserta($id){
		$this->db->where('id_booking', $id);
        $this->db->delete('tb_peserta');
	}

	//============================ for controller history ============================\\
	function show_history($id){
		$sql = "SELECT b.id_det_booking,d.nama_ruang as ruang,a.tanggal_psn as tgl_psn,a.tanggal_meeting as tgl_meeting,CONCAT(SUBSTR(a.jam_mulai,1,5),'-',SUBSTR(a.jam_akhir,1,5)) as waktu,b.status as status,b.id_booking as id_booking,e.nama as nama
			FROM tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang d
			ON a.id_ruang = d.id_ruang
			INNER JOIN tb_user e
			ON b.id_karyawan = e.id_karyawan
			where b.id_karyawan = $id";

		return $this->db->query($sql)->result();
	}

}
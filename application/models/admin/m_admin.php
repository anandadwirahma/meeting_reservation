<?php

Class m_admin extends CI_Model {

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

	function show_departemen(){
		$this->db->select("*");
		$this->db->from("tb_departemen");
        return $this->db->get()->result();
	}

	//--for edit profile
	function show_departemen_unselected($id){
		$sql = "select a.id_departemen as id_departemen,a.departemen as departemen
			from tb_departemen a
			WHERE a.id_departemen NOT IN (
			SELECT id_departemen
			FROM tb_user
			where id_karyawan = '$id')";

		return $this->db->query($sql)->result();
	}

	function edit_profil($id,$data){
		$this->db->where('id_karyawan', $id);
        $this->db->update('tb_user', $data);
	}

	//--for update password
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

	//============================ for module data master ============================\\
	//--management ruangan--\\
	function show_ruangan(){
		$this->db->select("*");
		$this->db->from("tb_ruang");
        return $this->db->get()->result();
	}

	function tambah_ruang($data){
		$this->db->insert('tb_ruang', $data);
	}

	function show_edit_ruang($id_ruang){
		$this->db->select("*");
		$this->db->where('id_ruang',$id_ruang);
        $this->db->from("tb_ruang");
        return $this->db->get()->result();
	}

	function edit_ruang($id_ruang,$data){
		$this->db->where('id_ruang', $id_ruang);
        $this->db->update('tb_ruang', $data);
	}

	function delete_ruang($id_ruang){
		$this->db->where('id_ruang', $id_ruang);
        $this->db->delete('tb_ruang');
    }

    //--management user--\\
    function show_user(){
    	$sql = "SELECT a.id_karyawan as id_karyawan,a.nama as nama,b.departemen as departemen,a.email as email,a.no_telp as no_telp,a.username as username,a.id_role as id_role
			FROM tb_user a
			INNER JOIN tb_departemen b
			on a.id_departemen = b.id_departemen";

		return $this->db->query($sql)->result();
	}

	function delete_user($id_user){
		$this->db->where('id_karyawan', $id_user);
        $this->db->delete('tb_user');
	}

	//============================ for module Booking ruangan ============================\\
	//-- booking ruangan--\\
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

	function cancel_booking($tablename,$columnn,$id){
		$this->db->where("$columnn", $id);
        $this->db->delete("$tablename");
	}

	//-- reschedule booking ruangan--\\
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
		$sql = "SELECT a.topik as topik
			FROM tb_det_booking a
			INNER JOIN tb_ruang b
			ON a.id_ruang = b.id_ruang
			where a.id_det_booking = $id_det_booking";
		
		return $this->db->query($sql)->result();
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

	//-- jadwal booking/history--\\
	function show_history(){
	$sql = "SELECT e.nama as nama,a.topik as topik,b.id_det_booking,d.nama_ruang as ruang,a.tanggal_psn as tgl_psn,a.tanggal_meeting as tgl_meeting,CONCAT(SUBSTR(a.jam_mulai,1,5),'-',SUBSTR(a.jam_akhir,1,5)) as waktu,b.status as status,b.id_booking as id_booking
			FROM tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang d
			ON a.id_ruang = d.id_ruang
			INNER JOIN tb_user e
			ON b.id_karyawan = e.id_karyawan";

		return $this->db->query($sql)->result();
	}

	function update_status_booking($id){
		$this->db->set('status', 'Canceled');
		$this->db->where('id_booking', $id);
		$this->db->update('tb_booking'); 
	}


	//============================ for module laporan ============================\\
	function show_laporan($start_date,$end_date){
	$sql = "SELECT e.nama as nama,a.topik as topik,b.id_det_booking,d.nama_ruang as ruang,a.tanggal_psn as tgl_psn,a.tanggal_meeting as tgl_meeting,CONCAT(SUBSTR(a.jam_mulai,1,5),'-',SUBSTR(a.jam_akhir,1,5)) as waktu,b.status as status,b.id_booking as id_booking
			FROM tb_det_booking a
			INNER JOIN tb_booking b
			ON a.id_det_booking = b.id_det_booking
			INNER JOIN tb_ruang d
			ON a.id_ruang = d.id_ruang
			INNER JOIN tb_user e
			ON b.id_karyawan = e.id_karyawan
			where a.tanggal_meeting BETWEEN '$start_date' and '$end_date'";

		return $this->db->query($sql)->result();
	}

	function min_max_tgl_meeting(){
	$sql = "SELECT MIN(a.tanggal_meeting) as start_date,MAX(a.tanggal_meeting) as end_date
		FROM tb_det_booking a
		INNER JOIN tb_booking b
		ON a.id_det_booking = b.id_det_booking
		INNER JOIN tb_ruang d
		ON a.id_ruang = d.id_ruang
		INNER JOIN tb_user e
		ON b.id_karyawan = e.id_karyawan";

		return $this->db->query($sql)->result();
	}

	function summary_booking($start_periode,$end_periode){
	$sql = "SELECT *
		FROM
		(
			SELECT COUNT(*) jumlah, 'Upcoming' status
			FROM tb_det_booking a, tb_booking b
			WHERE a.id_det_booking = b.id_det_booking
			and a.tanggal_meeting BETWEEN '$start_periode' and '$end_periode'
			AND b.status = 'Upcoming'
			UNION ALL
			SELECT COUNT(*) jumlah, 'Canceled' status
			FROM tb_det_booking a, tb_booking b
			WHERE a.id_det_booking = b.id_det_booking
			and a.tanggal_meeting BETWEEN '$start_periode' and '$end_periode'
			AND b.status = 'Canceled'
			UNION ALL
			SELECT COUNT(*) jumlah, 'On Progres' status
			FROM tb_det_booking a, tb_booking b
			WHERE a.id_det_booking = b.id_det_booking
			AND b.status = 'On Progres'
			and a.tanggal_meeting BETWEEN '$start_periode' and '$end_periode'
			UNION ALL
			SELECT COUNT(*) jumlah, 'Done' status
			FROM tb_det_booking a, tb_booking b
			WHERE a.id_det_booking = b.id_det_booking
			AND b.status = 'Done'
			and a.tanggal_meeting BETWEEN '$start_periode' and '$end_periode'
		) x";

		return $this->db->query($sql)->result();
	}

}
<?php

Class m_mailing extends CI_Model {

	function get_list_peserta($id){
		$sql = "SELECT a.id_karyawan as id_karyawan,b.email as email,b.nama as nama
				FROM tb_peserta a
				INNER JOIN tb_user b
				ON a.id_karyawan = b.id_karyawan
				where id_booking = '$id'";

		return $this->db->query($sql)->result();
	}

	function get_list_member($id){
		$sql = "SELECT b.nama as nama
				FROM tb_peserta a
				INNER JOIN tb_user b
				ON a.id_karyawan = b.id_karyawan
				where id_booking = '$id'";		

		return $this->db->query($sql)->result();
	}

	function get_jdwl_meeting($id){
		$sql = "SELECT a.tanggal_meeting as tgl,CONCAT(SUBSTR(a.jam_mulai,1,5),'-',SUBSTR(a.jam_akhir,1,5)) as waktu,a.topik as topik,b.nama_ruang as nama_ruang,CONCAT('Lantai ',b.lokasi) as lokasi
			FROM tb_det_booking a
			INNER JOIN tb_ruang b
			ON a.id_ruang = b.id_ruang
			where a.id_det_booking = '$id'";

		$row = $this->db->query($sql);
		return $row;
	}

	function get_role($id){
		$sql = "SELECT id_role,nama from tb_user where id_karyawan = '$id'";

	    $row = $this->db->query($sql);
		return $row;
	}

	
}
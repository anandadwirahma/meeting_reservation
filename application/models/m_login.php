<?php

Class m_login extends CI_Model {

  //--For validation login--//
  function validasi($username, $password){
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() == 1){
      
      foreach ($query->result() as $row) {
        $data['id_karyawan'] = $row->id_karyawan;
        $data['nama'] = $row->nama;
        $data['departemen'] = $row->departemen;
        $data['email'] = $row->email;
        $data['no_telp'] = $row->no_telp;
        $data['username'] = $row->username;
        $data['password'] = $row->password;
        $data['id_role'] = $row->id_role;
        return $data;
      }
    } else {
      return false;
    }
  }

}

?>
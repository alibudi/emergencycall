<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DinasModel extends CI_Model {

	public function getRs(){
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->join('users_groups','users_groups.user_id=users.id');
		$this->db->where('users_groups.group_id',4);
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function getUkmById($id){
		$this->db->select('users.*');
		$this->db->select('lokasi.nama_lokasi as lokasi');
		$this->db->from('users');
		$this->db->join('users_groups','users_groups.user_id=users.id');
		$this->db->join('lokasi','lokasi.id=users.id_lokasi','left');
		$this->db->where('users_groups.group_id',2);
		$this->db->where('users.id',$id);
		$sql = $this->db->get()->row();
		return $sql;
	}

}

/* End of file MemberModel.php */
/* Location: ./application/models/MemberModel.php */
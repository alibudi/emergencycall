<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemkotModel extends CI_Model {

	public function getInstansi(){
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->join('users_groups','users_groups.user_id=users.id');
		$this->db->where('users_groups.group_id',3);
		$sql = $this->db->get()->result();
		return $sql;
	}

}

/* End of file MemberModel.php */
/* Location: ./application/models/MemberModel.php */
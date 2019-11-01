<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaruratModel extends CI_Model {

	public function getDarurat($id_user){
		$this->db->where('id_user',$id_user);
		$this->db->order_by('waktu','desc');
		$sql = $this->db->get('tbl_darurat')->result();
		return $sql;
	}

	public function getDaruratById($id){
		$this->db->where('id_darurat',$id);
		$sql = $this->db->get('tbl_darurat')->row();
		return $sql;
	}

	public function addDarurat($data){
		$this->db->insert('tbl_darurat',$data);
		$sql = $this->db->insert_id();
		return $sql;
	}

	public function addViewDarurat($data){
		$sql = $this->db->insert('view_darurat',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function cekStatus($id){
		$this->db->where('id_darurat',$id);
		$sql = $this->db->get('tbl_darurat')->row();
		return $sql;

	}

	public function changeStatus($id){
		$data = array(
			'statusbaca' => 1
			);

		$this->db->where('id_darurat',$id);
		$sql = $this->db->update('tbl_darurat',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function json($id_user){
		$this->db->where('id_user',$id_user);
		$this->db->where('statusbaca',0);
		$sql = $this->db->count_all_results('tbl_darurat');
		echo json_encode($sql);
	}

	

}

/* End of file DaruratModel.php */
/* Location: ./application/models/DaruratModel.php */
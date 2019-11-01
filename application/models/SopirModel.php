<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SopirModel extends CI_Model {
	public function getData(){
		$sql = $this->db->get('sopir');
		return $sql->result();
	}

	public function getDataById($id){
		$this->db->where('idsopir',$id);
		$sql = $this->db->get('sopir');
		return $sql->row();
	}

	public function addData($data){
		$sql = $this->db->insert('sopir',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function updateData($id,$data){
		$this->db->where('idsopir',$id);
		$sql = $this->db->update('sopir',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function deleteData($id){
		$this->db->where('idsopir',$id);
		$sql = $this->db->delete('sopir');
		if($sql){
			return true;
		} else{
			return false;
		}
	}

}
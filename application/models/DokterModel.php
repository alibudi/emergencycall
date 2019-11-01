<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterModel extends CI_Model {
	public function getData(){
		$sql = $this->db->get('dokter');
		return $sql->result();
	}

	public function getDataById($id){
		$this->db->where('iddokter',$id);
		$sql = $this->db->get('dokter');
		return $sql->row();
	}

	public function addData($data){
		$sql = $this->db->insert('dokter',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function updateData($id,$data){
		$this->db->where('iddokter',$id);
		$sql = $this->db->update('dokter',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function deleteData($id){
		$this->db->where('iddokter',$id);
		$sql = $this->db->delete('dokter');
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function countResult($id){
		$this->db->where('contoh',$id);
		$sql = $this->db->count_all_results('contohtabel');
		return $sql;
	}
}
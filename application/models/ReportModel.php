<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {
	public function getData(){
		$sql = $this->db->get('tbl_report');
		return $sql->result();
	}
}
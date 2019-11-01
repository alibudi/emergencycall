<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("dokterModel");
		$this->load->model("MemberModel");
		$this->load->model("dinasModel");
		
		if(!$this->ion_auth->in_group(5)){
			redirect('login','refresh');
		}
	}
	public function index()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['main']	= 'dinas/dashboard';
		$this->load->view('dinas/template',$data);
	}

	public function grafik()
	{
		$data['main'] = 'dinas/grafik';
		$this->load->view('dinas/template',$data);
	}
	public function profil()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['main'] = 'dinas/profil';
		$this->load->view('dinas/template',$data);
	}
	public function changeProfile($id=null)
	{
		if($id==null){
			redirect('dinas/profil');
		} 

		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'email' => $this->input->post('email'),
									'first_name' => $this->input->post('first_name'),
									'last_name' => $this->input->post('last_name'),
									'phone' => $this->input->post('phone'),
									);
				$sql = $this->ion_auth->update($this->uri->segment(3), $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Update Profile!');
					redirect('dinas/profil');
				}else{
					$this->session->set_flashdata('info', 'Gagal Update Profile!');
					redirect('dinas/profil');
				}
			} else {
				$this->user_profil();
			}
		
		}
	}


	public function dokter()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['dokter'] = $this->dokterModel->getData();
		$data['main']	= 'dinas/dokter';
		$this->load->view('dinas/template',$data);	
	}

	public function rs()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['dinas'] = $this->dinasModel->getRs();
		$data['main'] = 'dinas/rs';
		$this->load->view('dinas/template',$data);
	}

	public function addRs()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['list_groups']=$this->MemberModel->modelgroups();
		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('last_name', 'Lastname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = array(
										'first_name' => $this->input->post('first_name'),
										'last_name' => $this->input->post('last_name'),
										'phone'=> $this->input->post('phone')
										);

				$group = array($this->input->post('groups')); // UNTUK SESSION 
				// $this->MemberModel->us_group_add($this->uri->segment(3),$additional_data);
				$sql = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Tambah Data!');
					redirect(base_url("dinas/rs"));
				} else{
					$this->session->set_flashdata('info', 'Gagal Tambah Data!');
					redirect(base_url("dinas/rs"));
				}
			} else {
				$data['main']			= 'dinas/add_rs';
				$this->load->view('dinas/template', $data);
			}
		} else{
			$data['main']			= 'dinas/add_rs';
			$this->load->view('dinas/template', $data);
		}
	}

	public function addDokter()
	{
		if($this->input->post('submit')==true){
		$this->form_validation->set_rules('nama', 'Nama Dokter','trim|required');
		$this->form_validation->set_rules('phone', 'Phone','trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat','trim|required');

	    if ($this->form_validation->run() == TRUE) {
	         $data = array(
	        'id_dokter' 		=> $this->input->post('id_dokter'),
	        'nama'				=> $this->input->post('nama'),
	        'spesialis'			=> $this->input->post('spesialis'),
	        'phone'				=> $this->input->post('phone'),
	        'alamat'		 	=> $this->input->post('alamat'),
	        'password' 			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT)
	        );
	   	$sql = $this->dokterModel->addData($data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Simpan Data!');
					redirect('dinas/dokter','refresh');
				} else{
					$this->session->set_flashdata('info', 'Gagal Simpan Data!');
					redirect('dinas/addDokter','refresh');
				}
			} else {
				$data['user']	= $this->ion_auth->user()->row();
				$data['main'] = 'dinas/add_dokter';
				$this->load->view('dinas/template',$data);
			}
		} else{
			$data['user']	= $this->ion_auth->user()->row();
			$data['main'] = 'dinas/add_dokter';
			$this->load->view('dinas/template',$data);
		}
	}

	public function  editDokter($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('dinas/dokter','refresh');
		} 

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('namadokter', 'Nama sopir','trim|required');
			$this->form_validation->set_rules('phone', 'Phone','trim|required');
			$this->form_validation->set_rules('nama_instansi', 'Nama Instansi','trim|required');

		    if ($this->form_validation->run() == TRUE) {
		         $data = array(
		        'id_dokter' 		=> $this->input->post('iddokter'),
		        'nama'				=> $this->input->post('namadokter'),
		        'spesialis'			=> $this->input->post('spesialis'),
		        'phone'				=> $this->input->post('phone'),
		        'alamat'		 	=> $this->input->post('alamat'),
		        'password' 			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		        );

				$sql = $this->dokterModel->updateData($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Simpan Data!');
					redirect('dinas/dokter','refresh');
				} else{
					$this->session->set_flashdata('info', 'Gagal Simpan Data!');
					redirect('dinas/editDokter/'.$id,'refresh');
				}
			} else {
				$data['user']	= $this->ion_auth->user()->row();
				$data['dokter']	= $this->dokterModel->getDataById($id);
				$data['main'] 	= 'dinas/edit_dokter';
				$this->load->view('dinas/template',$data);
			}
		} else{
			$data['user']	= $this->ion_auth->user()->row();
			$data['dokter']	= $this->dokterModel->getDataById($id);
			$data['main'] 	= 'dinas/edit_dokter';
			$this->load->view('dinas/template',$data);
		}
	}

	public function deleteDokter($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('dinas/dokter','refresh');
		}

		$sql = $this->sopirModel->deleteData($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('dinas/dokter','refresh');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('dinas/dokter','refresh');
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemkot extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("pemkotModel");
		$this->load->model("MemberModel");
		
		if(!$this->ion_auth->in_group(3)){
			redirect('login','refresh');
		}
	}
	public function index()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['main']	= 'pemkot/dashboard';
		$this->load->view('pemkot/template',$data);
	}

	public function profil()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['main'] = 'pemkot/profil';
		$this->load->view('pemkot/template',$data);
	}
	public function changeProfile($id=null)
	{
		if($id==null){
			redirect('pemkot/profil');
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
					redirect('pemkot/profil');
				}else{
					$this->session->set_flashdata('info', 'Gagal Update Profile!');
					redirect('pemkot/profil');
				}
			} else {
				$this->user_profil();
			}
		
		}
	}


	public function instansi()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['main'] = 'pemkot/instansi';
		$data['list_member']=$this->pemkotModel->getInstansi();
		$this->load->view('pemkot/template',$data);
	}

	public function memberadd()
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
					redirect(base_url("pemkot/instansi"));
				} else{
					$this->session->set_flashdata('info', 'Gagal Tambah Data!');
					redirect(base_url("pemkot/member"));
				}
			} else {
				$data['main']			= 'pemkot/memberadd';
				$this->load->view('pemkot/template', $data);
			}
		} else{
			$data['main']			= 'pemkot/memberadd';
			$this->load->view('pemkot/template', $data);
		}
	}

	public function memberdelete($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('pemkot/member');
		}

		$sql = $this->ion_auth->delete_user($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('pemkot/member');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('pemkot/member');
		}
	}

	public function changeData($id=null)
	{
		$data['user']			= $this->ion_auth->user()->row();
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('pemkot/member');
		} 

		$data['list_member']=$this->MemberModel->memberedit($id);
		$id_group	= $this->ion_auth->get_users_groups($id)->row();

		if(isset($_POST['Submit']))
		{

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'first_name' => $this->input->post('first_name'),
									'last_name' => $this->input->post('last_name'),
									'phone' => $this->input->post('phone'),
									);
				$sql = $this->ion_auth->update($this->uri->segment(3), $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Edit Data!');
					redirect(base_url("pemkot/member"));
				}else{
					$this->session->set_flashdata('info', 'Gagal Edit Data!');
					redirect('pemkot/member');
				}
			} else {
				$data['main']			= 'admin/memberupdate';
				$this->load->view('admin/template', $data);
			}
		
		} else{
			$data['main']			= 'admin/memberupdate';
			$this->load->view('admin/template', $data);
		}
		
	}

	public function memberChangePassword($id=null){
		$data['user']	= $this->ion_auth->user()->row();
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('admin/member');
		}

		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('password', 'New Password', 'required');
			$this->form_validation->set_rules('r_password', 'Retype Password', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'password' => $this->input->post('password'),
									);
				$sql = $this->ion_auth->update($id, $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Ubah Password!');
					redirect('admin/member');
				}else{
					$this->session->set_flashdata('info', 'Gagal Ubah Password!');
					redirect('admin/member');
				}
			} else {
				$data['list_member']=$this->MemberModel->memberedit($id);
				$data['main']			= 'admin/memberupdate';
				$this->load->view('admin/template', $data);
			}
		
		}
	}

	public function data_warga()
	{/*
		$data['warga'] = $this->pemkotModel->getPemkot();*/
		$data['user']	= $this->ion_auth->user()->row();
		$data['main'] = 'pemkot/data_warga';
		$this->load->view('pemkot/template',$data);
	}
}
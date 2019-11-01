<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("MemberModel");
		
		if(!$this->ion_auth->is_admin()){
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['main']	= 'admin/dashboard';
		$this->load->view('admin/template',$data);
	}
	public function member()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['main']			= 'admin/member';
		// $data['list_member']	= $this->ion_auth->users()->result();
		$data['list_member']=$this->MemberModel->modelmember();
		$this->load->view('admin/template',$data);
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
					redirect(base_url("admin/member"));
				} else{
					$this->session->set_flashdata('info', 'Gagal Tambah Data!');
					redirect(base_url("admin/member"));
				}
			} else {
				$data['main']			= 'admin/memberadd';
				$this->load->view('admin/template', $data);
			}
		} else{
			$data['main']			= 'admin/memberadd';
			$this->load->view('admin/template', $data);
		}
	}

	public function memberdelete($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/member');
		}

		$sql = $this->ion_auth->delete_user($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('admin/member');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/member');
		}
	}

	public function changeData($id=null)
	{
		$data['user']			= $this->ion_auth->user()->row();
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('admin/member');
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
					redirect(base_url("admin/member"));
				}else{
					$this->session->set_flashdata('info', 'Gagal Edit Data!');
					redirect('admin/member');
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
	public function groups()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['main']			= 'admin/groups';
		$data['list_groups']=$this->MemberModel->modelgroups();
		// $data['list_groups']	= $this->ion_auth->groups()->result();
		$this->load->view('admin/template',$data);
	}
	public function groupsadd()
	{
		$data['user']			= $this->ion_auth->user()->row();

		if($this->input->post('Submit')==true)
		{
			$group = $this->ion_auth->create_group($this->input->post('name'), $this->input->post('description'));

	        if(!$group)
	        {
	        	$view_errors = $this->ion_auth->messages();
	        	$this->session->set_flashdata('info', 'Gagal Buat Grup Baru');
	      		redirect("admin/groups");
	      	}
	      	else
	      	{
	      		$this->session->set_flashdata('info', 'Berhasil Buat Grup Baru');

	      		//$new_group_id = $group;
	      		redirect("admin/groups");
	      	}
		} else {
			$data['main']			= 'admin/groupsadd';
			$this->load->view('admin/template', $data);
		}
	}

	public function groupsdelete($id)
	{
		$group_delete = $this->ion_auth->delete_group($id);

        if(!$group_delete)
        {
        	$this->session->set_flashdata('info', 'Gagal Hapus Data!');
      		redirect(base_url("admin/groups"));
      	} else {
      		$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
      		redirect(base_url("admin/groups"));
      	}
	}

	public function groupsupdate()
	{
		// source these things from anywhere you like (eg., a form)
		$data['user']			= $this->ion_auth->user()->row();
		$data['list_groups']=$this->MemberModel->groupsedit($this->uri->segment(3));
		if(isset($_POST['Submit']))
		{
			$name = $this->input->post('name');
			$description = $this->input->post('description');
	        // pass the right arguments and it's done
	        $data_array = array(
	                    'name' 		        => $name,
	                    'description' 		=> $description
	                );
	        $sql = $this->MemberModel->groups_update($this->uri->segment(3),$data_array);
	        if($sql){
	        	$this->session->set_flashdata('info', 'Berhasil Edit Data');
	        	redirect(base_url("admin/groups"));
	        } else{
	        	$this->session->set_flashdata('info', 'Gagal Edit Data');
	        	redirect(base_url("admin/groups"));
	        }
	        
		}
		$data['main']			= 'admin/groupsupdate';
      	$this->load->view('admin/template', $data);
	}

	public function profile()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['main'] = 'admin/updateprofile';
		$this->load->view('admin/template',$data);
	}
	public function changeProfile($id=null)
	{
		if($id==null){
			redirect('admin/profile');
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
					redirect('admin/profile');
				}else{
					$this->session->set_flashdata('info', 'Gagal Update Profile!');
					redirect('admin/profile');
				}
			} else {
				$this->user_profil();
			}
		
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
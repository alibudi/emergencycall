<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->ion_auth->logged_in()){
			redirect('login/cek_login','refresh');
		} else{
			$this->load->view('login');
		}
	}

	public function cek_login(){
		if($this->ion_auth->logged_in()){
			if($this->ion_auth->is_admin()){
				redirect('admin','refresh');
			} else if($this->ion_auth->in_group(3)){
		/*		echo "Halaman rs";*/
			 redirect('pemkot','refresh');
			} else if($this->ion_auth->in_group(4)){
		/*		echo "Halaman rs";*/
			 redirect('rumah','refresh');
			} else if($this->ion_auth->in_group(5)){
		/*		echo "Halaman rs";*/
			 redirect('dinas','refresh');
			}else{
				$this->ion_auth->logout();
				redirect('login','refresh');
			}
		} else{
			redirect('login','refresh');
		}
	}

	public function login()
	{
	    if($this->ion_auth->logged_in()){
			redirect('login/cek_login','refresh');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = TRUE; // remember the user

			if($this->ion_auth->login($email, $password, $remember)){
				redirect('login/cek_login','refresh');
			} else{
				$this->session->set_flashdata('info', 'Username atau Password Salah!');
				redirect('login','refresh');
			}
		} else {
			$this->load->view('login');
		}

	}

	public function logout(){
		$this->ion_auth->logout();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
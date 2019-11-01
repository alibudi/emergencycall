<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("sopirModel");
		$this->load->model("MemberModel");
		$this->load->model("reportModel");
		$this->load->model('daruratModel');
		
		if(!$this->ion_auth->in_group(4)){
			redirect('login','refresh');
		}
	}
	public function index()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['main']	= 'rumah/dashboard';
		$this->load->view('rumah/template',$data);
	}

	public function send()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['report'] = $this->reportModel->getData();
		$data['main'] = 'rumah/send_report';
		$this->load->view('rumah/template',$data);	
	}
	public function notifikasi()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$id_user = $data['user']->id;
		$data['list_darurat'] = $this->daruratModel->getDarurat($id_user);
		$data['main'] = 'rumah/notifikasi';
		$this->load->view('rumah/template',$data);
	}

	public function daruratjson(){
		$user = $this->ion_auth->user()->row();
		header('Content-Type: application/json');
        echo $this->daruratModel->json($user->id);
	}
	public function viewDarurat($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Melihat Info Darurat!');
			redirect('rs/darurat','refresh');
		}

		$cek = $this->daruratModel->cekStatus($id);
		if($cek->statusbaca==0){
			$this->daruratModel->changeStatus($id);
		}

		$data['user'] = $this->ion_auth->user()->row();
		$data['darurat'] = $this->daruratModel->getDaruratById($id);
		$data['main'] = 'rs/viewdarurat';
		$this->load->view('rs/template',$data);

	}
	public function sopir()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['sopir'] = $this->sopirModel->getData();
		$data['main'] = 'rumah/sopir';
		$this->load->view('rumah/template',$data);
	}

	public function addSopir()
	{
		if($this->input->post('submit')==true){
		$this->form_validation->set_rules('namasopir', 'Nama sopir','trim|required');
		$this->form_validation->set_rules('phone', 'Phone','trim|required');
		$this->form_validation->set_rules('namainstansi', 'Nama Instansi','trim|required');

	    if ($this->form_validation->run() == TRUE) {
	         $data = array(
	        'idsopir' 		=> $this->input->post('idsopir'),
	        'namasopir'		=> $this->input->post('namasopir'),
	        'phone'			=> $this->input->post('phone'),
	        'namainstansi' 	=> $this->input->post('namainstansi'),
	        'password' 		=> hash('sha256', $this->input->post('password'))
	        );
	   	$sql = $this->sopirModel->addData($data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Simpan Data!');
					redirect('rumah/sopir','refresh');
				} else{
					$this->session->set_flashdata('info', 'Gagal Simpan Data!');
					redirect('rumah/addSopir','refresh');
				}
			} else {
				$data['user']	= $this->ion_auth->user()->row();
				$data['main'] = 'rumah/add_sopir';
				$this->load->view('rumah/template',$data);
			}
		} else{
			$data['user']	= $this->ion_auth->user()->row();
			$data['main'] = 'rumah/add_sopir';
			$this->load->view('rumah/template',$data);
		}
	}

	public function  editSopir($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('rumah/sopir','refresh');
		} 

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('namasopir', 'Nama sopir','trim|required');
			$this->form_validation->set_rules('phone', 'Phone','trim|required');
			$this->form_validation->set_rules('namainstansi', 'Nama Instansi','trim|required');

		    if ($this->form_validation->run() == TRUE) {
		         $data = array(
		        'namasopir'		=> $this->input->post('namasopir'),
		        'phone'			=> $this->input->post('phone'),
		        'namainstansi' 	=> $this->input->post('namainstansi'),
		        'password'		=> hash('sha256', $this->input->post('password'))
		        );

				$sql = $this->sopirModel->updateData($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Simpan Data!');
					redirect('rumah/sopir','refresh');
				} else{
					$this->session->set_flashdata('info', 'Gagal Simpan Data!');
					redirect('rumah/editSopir/'.$id,'refresh');
				}
			} else {
				$data['user']	= $this->ion_auth->user()->row();
				$data['sopir']	= $this->sopirModel->getDataById($id);
				$data['main'] 	= 'rumah/edit_sopir';
				$this->load->view('rumah/template',$data);
			}
		} else{
			$data['user']	= $this->ion_auth->user()->row();
			$data['sopir']	= $this->sopirModel->getDataById($id);
			$data['main'] 	= 'rumah/edit_sopir';
			$this->load->view('rumah/template',$data);
		}
	}

	public function deleteSopir($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('rumah/sopir','refresh');
		}

		$sql = $this->sopirModel->deleteData($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('rumah/sopir','refresh');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('rumah/sopir','refresh');
		}
	}
}

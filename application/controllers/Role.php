<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
    // Constructor
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}

		$this->load->model('role_model');
	}

	public function index()
	{   

		$this->load->model('role_model');

		$data['role'] = $this->role_model->getAllRole();
		$data['title'] = 'Halaman Role';

        $this->load->view('layouts/header');
		$this->load->view('role/index', $data);
        $this->load->view('layouts/footer');

	}

	public function view($roleId)
	{	
		$data['role'] = $this->role_model->getById($roleId);
		$data['title'] = "Detail Buku";

		$this->load->view('layouts/header');
		$this->load->view('role/view', $data);
        $this->load->view('layouts/footer');
	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah Role';

            $this->load->view('layouts/header');
            $this->load->view('role/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->role_model->createRole();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "role/index" : "role/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function delete($roleId)
	{
		$data['role'] = $this->role_model->getById($roleId);
		$result = $this->role_model->hapusRole($roleId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);
		redirect("role/index");
	}

	public function edit($roleId) {
        $data['role'] = $this->role_model->getById($roleId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Role';

            $this->load->view('layouts/header');
            $this->load->view('role/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->role_model->editRole($roleId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "role/index" : "role/edit/$roleId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }
}

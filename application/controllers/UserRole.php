<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserRole extends CI_Controller {
    // Constructor
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}

		$this->load->model('userRole_model');
		$this->load->model('role_model');
		$this->load->model('users_model');
	}

	public function index()
	{   

		$this->load->model('userRole_model');

		$data['userRole'] = $this->userRole_model->getAllUserRole();
		$data['title'] = 'Halaman User Role';

        $this->load->view('layouts/header');
		$this->load->view('userRole/index', $data);
        $this->load->view('layouts/footer');

	}

	public function view($userRoleId) {
        $data['title'] = 'Detail User Role';
		$this->load->model('userRole_model');
        $data['userRole'] = $this->userRole_model->getById($userRoleId);

		$this->load->view('layouts/header');
		$this->load->view('userRole/view', $data);
		$this->load->view('layouts/footer');        
    }

	public function delete($userRoleId)
	{
		$data['userRole'] = $this->userRole_model->getById($userRoleId);
		$result = $this->userRole_model->hapusUserRole($userRoleId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);
		redirect("userRole/index");
	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('userid', 'User ID', 'required');
		$this->form_validation->set_rules('roleid', 'Role ID', 'required');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah User Role';
			$data['users'] = $this->users_model->getAllUsers();
			$data['role'] = $this->role_model->getAllRole();

            $this->load->view('layouts/header');
            $this->load->view('userRole/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->userRole_model->createUserRole();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "userRole/index" : "userRole/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function edit($userRoleId) {
        $data['userRole'] = $this->userRole_model->getById($userRoleId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('userid', 'User ID', 'required');
		$this->form_validation->set_rules('roleid', 'Role ID', 'required');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit User Role';
			$data['users'] = $this->users_model->getAllUsers();
			$data['role'] = $this->role_model->getAllRole();

            $this->load->view('layouts/header');
            $this->load->view('userRole/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->userRole_model->editUserRole($userRoleId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "userRole/index" : "userRole/edit/$userRoleId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }
}

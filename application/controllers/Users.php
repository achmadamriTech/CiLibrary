<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();

		$this->load->model('users_model');
	}

	public function index()
	{   
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}

		$this->load->model('users_model');

		$data['users'] = $this->users_model->getAllUsers();
		$data['title'] = 'Halaman Users';

        $this->load->view('layouts/header');
		$this->load->view('users/index', $data);
        $this->load->view('layouts/footer');

	}

	public function view($usersId)
	{	
		$data['users'] = $this->users_model->getById($usersId);
		$data['title'] = "Detail Users";

		$this->load->view('layouts/header');
		$this->load->view('users/view', $data);
        $this->load->view('layouts/footer');
	}

	public function delete($usersId)
	{
		$data['users'] = $this->users_model->getById($usersId);
		$result = $this->users_model->hapusUsers($usersId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);
		redirect("users/index");
	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username	', 'required');
		$this->form_validation->set_rules('password', 'Password	', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah Users';

            $this->load->view('layouts/header');
            $this->load->view('users/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->users_model->createUsers();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "users/index" : "users/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function edit($usersId) {
        $data['users'] = $this->users_model->getById($usersId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username	', 'required');
		$this->form_validation->set_rules('password', 'Password	', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Users';

            $this->load->view('layouts/header');
            $this->load->view('users/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->users_model->editUsers($usersId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "users/index" : "users/edit/$usersId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }
}

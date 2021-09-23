<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();

		$this->load->model('login_model');
	}

	public function index()
	{
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('emailUsers', 'Email', 'required');
		$this->form_validation->set_rules('passwordUsers', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Login';

            $this->load->view('layouts/header');
            $this->load->view('login/index', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			
			try{
				$this->login_model->request_login();
				redirect('salam','refresh');
			}
			catch (Exception $ex){
				$this->session->sess_destroy();
				redirect('login','refresh');
			} 
        }
	}

	public function logout(){
		$this->session->sess_destroy();

		redirect('login','refresh');
	}
}


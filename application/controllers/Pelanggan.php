<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

		$this->load->model('pelanggan_model');
	}

	public function index()
	{   
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}
		
        $this->load->model('pelanggan_model');

		$data['pelanggan'] = $this->pelanggan_model->getAllPelanggan();
        $data['title'] = "Halaman Pelanggan";

		$this->load->view('layouts/header');
		$this->load->view('pelanggan/index',$data);
        $this->load->view('layouts/footer');
	}

    public function view($pelangganId)
	{	
		$data['pelanggan'] = $this->pelanggan_model->getById($pelangganId);
		$data['title'] = "Detail Pelanggan";

		$this->load->view('layouts/header');
		$this->load->view('pelanggan/view', $data);
        $this->load->view('layouts/footer');
	}

	public function delete($pelangganId)
	{	
		if (strtolower($this->session->userdata('role')) != 'write'
		    && strtolower($this->session->userdata('role')) != 'admin') {
			
				$this->session->set_flashdata('error', 'Anda Tidak Memiliki Akses!');
				redirect('pelanggan/index');
		}

		$data['pelanggan'] = $this->pelanggan_model->getById($pelangganId);
		
		$result = $this->pelanggan_model->hapusPelanggan($pelangganId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);

		redirect("pelanggan/index");
	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telp', 'Telephone', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah Pelanggan';

            $this->load->view('layouts/header');
            $this->load->view('pelanggan/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->pelanggan_model->createPelanggan();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "pelanggan/index" : "pelanggan/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function edit($pelangganId) {

		if (strtolower($this->session->userdata('role')) != 'write'
		    && strtolower($this->session->userdata('role')) != 'admin') {
			
				$this->session->set_flashdata('error', 'Anda Tidak Memiliki Akses!');
				redirect('pelanggan/index');
		}

        $data['pelanggan'] = $this->pelanggan_model->getById($pelangganId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telp', 'Telephone', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Pelanggan';

            $this->load->view('layouts/header');
            $this->load->view('pelanggan/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->pelanggan_model->editPelanggan($pelangganId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "pelanggan/index" : "pelanggan/edit/$pelangganId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();

		$this->load->model('sewa_model');
		$this->load->model('buku_model');
		$this->load->model('pelanggan_model');
	}


	public function index()
	{   

		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}
		
        $data['title']= "Halaman Sewa Buku";
		$data['sewa'] = $this->sewa_model->getAllSewa();

        $this->load->view('layouts/header');
		$this->load->view('sewa/index',$data);
        $this->load->view('layouts/footer');
	}

	public function view($sewaId) {
        $data['title'] = 'Detail Sewa';
		$this->load->model('sewa_model');
        $data['sewa'] = $this->sewa_model->getById($sewaId);

		$this->load->view('layouts/header');
		$this->load->view('sewa/view', $data);
		$this->load->view('layouts/footer');        
    }

	public function delete($sewaId)
	{
		$data['sewa'] = $this->sewa_model->getById($sewaId);
		$result = $this->sewa_model->hapusSewa($sewaId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);
		redirect("sewa/index");
	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('pelangganid', 'Pelanggan ID', 'required');
		$this->form_validation->set_rules('tglsewa', 'Tanggal Sewa', 'required');
		$this->form_validation->set_rules('lamasewa', 'Lama Sewa', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah Sewa';
			$data['buku'] = $this->buku_model->getAllBuku();
			$data['pelanggan'] = $this->pelanggan_model->getAllPelanggan();

            $this->load->view('layouts/header');
            $this->load->view('sewa/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->sewa_model->createSewa();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "sewa/index" : "sewa/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function edit($sewaId) {
        $data['sewa'] = $this->sewa_model->getById($sewaId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('pelangganid', 'Pelanggan ID', 'required');
		$this->form_validation->set_rules('tglsewa', 'Tanggal Sewa', 'required');
		$this->form_validation->set_rules('lamasewa', 'Lama Sewa', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Sewa';
			$data['buku'] = $this->buku_model->getAllBuku();
			$data['pelanggan'] = $this->pelanggan_model->getAllPelanggan();

            $this->load->view('layouts/header');
            $this->load->view('sewa/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->sewa_model->editSewa($sewaId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "sewa/index" : "sewa/edit/$sewaId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }
}

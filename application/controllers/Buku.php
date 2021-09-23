<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Please Login");
			redirect('login','refresh');
		}

		$this->load->model('buku_model');
	}

	public function index()
	{   

		$this->load->model('buku_model');

		$this->load->library('pagination');
		$data['buku'] = $this->buku_model->getAllBuku();
		$data['title'] = 'Halaman Buku';

        $this->load->view('layouts/header');
		$this->load->view('buku/index', $data);
        $this->load->view('layouts/footer');

	}

	public function create()
	{        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Halaman Tambah Buku';

            $this->load->view('layouts/header');
            $this->load->view('buku/create', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->buku_model->createBuku();

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "buku/index" : "buku/create/");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

	public function view($bukuId)
	{	
		$data['buku'] = $this->buku_model->getById($bukuId);
		$data['title'] = "Detail Buku";

		$this->load->view('layouts/header');
		$this->load->view('buku/view', $data);
        $this->load->view('layouts/footer');
	}

	public function edit($bukuId) {
        $data['buku'] = $this->buku_model->getById($bukuId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Buku';

            $this->load->view('layouts/header');
            $this->load->view('buku/edit', $data);
            $this->load->view('layouts/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->buku_model->editBuku($bukuId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "buku/index" : "buku/edit/$bukuId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }

	public function delete($bukuId)
	{
		$data['buku'] = $this->buku_model->getById($bukuId);
		$result = $this->buku_model->hapusBuku($bukuId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);
		redirect("buku/index");
	}
}

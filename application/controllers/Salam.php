<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salam extends CI_Controller {

	public function index($nama = 'Manusia')
	{   
		$data['nama'] = $nama;
		$data['alamat'] = 'Jakarta';
		$data['daftarPendidikan'] = ['SD','SMP','SMA'];

        $this->load->view('layouts/header');
		$this->load->view('salam/index',$data);
        $this->load->view('layouts/footer');
	}

	public function view($pages = 'view')
	{
		if (!file_exists(APPPATH . 'views/salam/' . $pages . '.php') ) {
			show_404();
		}

		$this->load->view('layouts/header');
		$this->load->view('salam/' . $pages);
        $this->load->view('layouts/footer');
	}

	public function show()
	{
		$this->load->view('layouts/header');
		$this->load->view('salam/show');
        $this->load->view('layouts/footer');
	}
}

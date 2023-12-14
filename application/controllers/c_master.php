<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_master extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_master_form', 'm_master_form');

 	}

	public function index()
	{
		$this->load->view('master/index');
	}

	public function create()
	{
		$this->load->view('master/tambah');
		$data = $this->m_master_form->getAllData();
		var_dump($data);

		$this->form_validation->set_rules(
			'mst_name',
			'Nama Master',
			'required',
			array('required' => 'Harus Diisi!')
		);
		$this->form_validation->set_rules(
			'mst_form_st',
			'Master form st',
			'required',
			array('required' => 'Harus Diisi!')
		);

		// cek validasi
		if($this->form_validation->run() == TRUE){
			$mst_name = $this->input->post('mst_name');
			$mst_form_st = $this->input->post('mst_form_st');

			$data = [
				'mst_name' => $mst_name,
				'mst_form_st' => $mst_form_st
			];
			$this->m_master_form->insert($data);
			$this->load->view('master/index');

		}else{
			$this->load->view('master/create');
		}


	}


}

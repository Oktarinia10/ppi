<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class c_master extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_master_form', 'm_master_form');
		$this->load->library('encryption');

 	}

	public function index()
	{
		$data = [
            'title' => 'Master Form',
            'mstform' => $this->m_master_form->getAllData(),
			
        ];
		// foreach ($data['mstform'] as &$item) {
		// 	// $item['encrypted_id'] = $this->encrypt->encode($item['mst_form_id']);
		// 	$item['encrypted_id'] = $this->encryption->encrypt($item['mst_form_id']);

		// var_dump($data['mstform']);
        $this->load->view('master/index', $data);

	}


	public function tambah(){
		$data = [
            'title' => 'Master Form',
            'mstform' => $this->m_master_form->getAllData(),
        ];
        $this->load->view('master/tambah' , $data);
	}

	public function proses_tambah()
	{
		// $k = [
        //     'title' => 'Master Form',
        //     'mstform' => $this->m_master_form->getAllData(),
        // ];
		$this->load->library('form_validation');
		$mst_name = $this->input->post('mst_name');
		$mst_form_st = $this->input->post('mst_form_st');

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
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'mst_name' => $mst_name,
				'mst_form_st' => $mst_form_st,
			];
			// var_dump($data);
			$this->m_master_form->addData($data);
			redirect(site_url('c_master/index'));
		} else {
			redirect(site_url('c_master/tambah'));
		}
	}

	public function edit($id){
		$data = [
            'title' => 'Master Form',
            'mstform' => $this->m_master_form->getDataById($id),
        ];
        $this->load->view('partials/header' , $data);
        $this->load->view('partials/sidebar' , $data);
        $this->load->view('master/edit' , $data);
        $this->load->view('partials/footer' , $data);
	}

	public function proses_update($id)
	{

		$this->load->library('form_validation');
		$data['mstform'] = $this->m_master_form->getDataById($id);

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
		if ($this->form_validation->run() == TRUE) {
			$this->m_master_form->editData($id);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data berhasil diubah!
			</div>
			');
			redirect(site_url('c_master/index'));
		} else {
			// redirect(site_url('c_master/edit'));
			$this->load->view('master/edit', [
                'mstform' => $this->m_master_form->getDataById($id),
            ]);

		}
	}

	public function hapus_data($mst_form_id)
	{
		$this->m_master_form->hapusData($mst_form_id);
		$this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data master form berhasil dihapus!
        </div>
        ');
		redirect(site_url('c_master/index'));
	}



}

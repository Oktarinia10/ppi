<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class c_master_ppa extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_master_ppa', 'm_master_ppa');

 	}

	public function index()
	{
		$data = [
            'title' => 'Master PPA',
            'mstppa' => $this->m_master_ppa->getAllData(),
        ];
        $this->load->view('master_ppa/index', $data);

	}

	public function tambah(){
		$data = [
            'title' => 'Master PPA',
            'mstppa' => $this->m_master_ppa->getAllData(),
        ];
        $this->load->view('master_ppa/tambah' , $data);
	}

	public function proses_tambah()
	{
		$this->load->library('form_validation');
		$mst_ppa_name = $this->input->post('mst_ppa_name');
		$mst_ppa_st = $this->input->post('mst_ppa_st');

        var_dump($mst_ppa_name, $mst_ppa_st);

		$this->form_validation->set_rules(
			'mst_ppa_name',
			'Nama Master',
			'required',
			array('required' => 'Harus Diisi!')
		);
		$this->form_validation->set_rules(
			'mst_ppa_st',
			'Master form st',
			'required',
			array('required' => 'Harus Diisi!')
		);

		// cek validasi
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'mst_ppa_name' => $mst_ppa_name,
				'mst_ppa_st' => $mst_ppa_st,
			];
			var_dump($data);
			$this->m_master_ppa->addData($data);
			redirect(site_url('c_master_ppa/index'));
		} else {
			redirect(site_url('c_master_ppa/tambah'));
		}
	}

	public function edit($id){
		$data = [
            'title' => 'Master Form',
            'mstppa' => $this->m_ppa_form->getDataById($id),
        ];
        // $this->load->view('partials/header' , $data);
        // $this->load->view('partials/sidebar' , $data);
        $this->load->view('master_ppa/edit' , $data);
        // $this->load->view('partials/footer' , $data);
	}

	public function proses_update($id)
	{

		$this->load->library('form_validation');
		$data['mstppa'] = $this->m_master_form->getDataById($id);

		$this->form_validation->set_rules(
			'mst_ppa_name',
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

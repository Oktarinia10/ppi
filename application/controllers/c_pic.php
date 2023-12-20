<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class c_pic extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_pic', 'm_pic');

 	}

	public function index()
	{
		$data = [
            'title' => 'Master PIC',
            'mstpic' => $this->m_pic->getAllData(),
        ];
		// var_dump($data);
        $this->load->view('pic/index', $data);
	}

	public function tambah(){
		$data = [
            'title' => 'Master PIC',
            'mstpic' => $this->m_pic->getAllData(),
        ];
        $this->load->view('pic/tambah' , $data);
	}

	public function proses_tambah()
	{
		$this->load->library('form_validation');
		$pic_nik = $this->input->post('pic_nik');
		$pic_flag = $this->input->post('pic_flag');
		// $pic_st = ('A');

        // var_dump($pic_nik, $pic_flag, $pic_st);

		$this->form_validation->set_rules(
			'pic_nik',
			'NIK',
			'required',
			array('required' => 'Harus Diisi!')
		);
		$this->form_validation->set_rules(
			'pic_flag',
			'PIC flag',
			'required',
			array('required' => 'Harus Diisi!')
		);

		// cek validasi
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'pic_nik' => $pic_nik,
				'pic_flag' => $pic_flag,
			];
			// var_dump($data);
			$this->m_pic->addData($data);
			redirect(site_url('c_pic/index'));
		} else {
			redirect(site_url('c_pic/tambah'));
		}
	}

	public function edit($id){
		$data = [
            'title' => 'Master PIC',
            'mstpic' => $this->m_pic->getDataById($id),
        ];
        $this->load->view('pic/edit' , $data);
	}

	public function proses_update($id)
	{
		$this->load->library('form_validation');
		$data['mstpic'] = $this->m_pic->getDataById($id);
		// $a['mstppa'] = $this->m_pic->editData($id);;
		// var_dump($a);

		$this->form_validation->set_rules(
			'pic_nik',
			'NIK',
			'required',
			array('required' => 'Harus Diisi!')
		);
		$this->form_validation->set_rules(
			'pic_flag',
			'PIC flag',
			'required',
			array('required' => 'Harus Diisi!')
		);

		// cek validasi
		if ($this->form_validation->run() == TRUE) {
			$this->m_pic->editData($id);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data berhasil diubah!
			</div>
			');
			redirect(site_url('c_pic/index'));
		} else {
			// redirect(site_url('c_pic/edit'));
			$this->load->view('pic/edit', [
                'mstform' => $this->m_pic->getDataById($id),
            ]);

		}
	}

	public function hapus_data($pic_id)
	{
		$data['mstpic'] = $this->m_pic->hapusData($pic_id);
		$this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data master form berhasil dihapus!
        </div>
        ');
		redirect(site_url('c_pic/index'));
	}
	




}

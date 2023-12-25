<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class c_ask_form extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_ask_form', 'm_ask_form');
		$this->load->model('m_master_form', 'm_master_form');

 	}

	public function index()
	{
		$data = [
            'askform' => $this->m_ask_form->getAllData(),
        ];
		// var_dump($data);
        $this->load->view('ask_form/index', $data);
	}

	public function tambah(){
		$data = [
            // 'title' => 'Master PIC',
            'askform' => $this->m_ask_form->getAllData(),
            'mstform' => $this->m_master_form->getAllData(),
        ];
        $this->load->view('ask_form/tambah' , $data);
	}

	public function proses_tambah()
	{
		$this->load->library('form_validation');
		$mst_form_id = $this->input->post('mst_form_id');
		$ask_name = $this->input->post('ask_name');
		$ask_form_st = 1; // auto 1

        // var_dump($mst_form_id, $ask_name, $ask_form_st);

		$this->form_validation->set_rules(
			'mst_form_id',
			'master form',
			'required',
			array('required' => 'Harus Diisi!')
		);
		$this->form_validation->set_rules(
			'ask_name',
			'Ask name',
			'required',
			array('required' => 'Harus Diisi!')
		);

		// cek validasi
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'mst_form_id' => $mst_form_id,
				'ask_name' => $ask_name,
				'ask_form_st' => $ask_form_st,
			];
			// var_dump($data);
			$this->m_ask_form->addData($data);
			redirect(site_url('c_ask_form/index'));
		} else {
			redirect(site_url('c_ask_form/tambah'));
		}
	}

	public function edit($id){
		$data = [
            'askform' => $this->m_ask_form->getDataById($id),
			'mstform' => $this->m_master_form->getAllData(),
        ];
        $this->load->view('ask_form/edit' , $data);
	}

	public function proses_update($id)
	{
		$this->load->library('form_validation');
		
		// $ask_name = $this->input->post('ask_name');
		// $updated_data = [
		// 	"ask_name" => $this->input->post('ask_name'),
		// 	"mst_form_id" => $this->input->post('mst_form_id'),
		// 	"ask_form_st" => 0, // set 0
		// ];
		$cek = $this->m_ask_form->editData($id);
		var_dump($cek);


		// $a['mstppa'] = $this->m_ask_form->editData($id);;
		// var_dump($a);
		// var_dump($data);

		// $this->form_validation->set_rules(
		// 	'mst_form_id',
		// 	'master form',
		// 	'required',
		// 	array('required' => 'Harus Diisi!')
		// );
		// $this->form_validation->set_rules(
		// 	'ask_name',
		// 	'Ask name',
		// 	'required',
		// 	array('required' => 'Harus Diisi!')
		// );

		// // cek validasi
		// if ($this->form_validation->run() == TRUE) {
		// 	$this->m_ask_form->editData($id);
			

		// 	$this->session->set_flashdata('message', '
		// 	<div class="alert alert-success alert-dismissible" role="alert">
		// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		// 	<i class="fas fa-check-circle"></i>
		// 	Data berhasil diubah!
		// 	</div>
		// 	');
		// 	redirect(site_url('c_ask_form/index'));
		// } else {
		// 	// redirect(site_url('c_pic/edit'));
		// 	$this->load->view('ask_form/edit', [
        //         'mstform' => $this->m_ask_form->getDataById($id),
        //     ]);

		// }
	}

	public function hapus_data($pic_id)
	{
		$data['mstpic'] = $this->m_ask_form->hapusData($pic_id);
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_trans_apd extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		// $this->load->model('m_ask_hhg', 'm_ask_hhg');
		$this->load->model('m_trans_form', 'm_trans_form');
 	}

	public function index()
	{
		$data = [
			'apdValueByAktors' => $this->m_trans_form->getValueApd(),
			'askApdValue' => $this->m_trans_form->getPertanyaanApd(),
		];
		$this->load->view('trans_apd/index', $data);
	}

	public function tambah()
	{	
		$data = [
			'askApd' => $this->m_trans_form->getAskApd(),
			'subDiv' => $this->m_trans_form->getSubDivisiId(),
			'mstPPA' => $this->m_trans_form->getMstPPAId(),
		];
		$this->load->view('trans_apd/tambah', $data);
	}

	public function proses_tambah(){
		$ask_form_id = $this->input->post('ask_form_id');
		$num = $this->input->post('num');
		$denum = $this->input->post('denum');

		// $trans_form_id;
		$sub_div_id = $this->input->post('sub_div_id');
		$mst_ppa_id = $this->input->post('mst_ppa_id');
		$trans_date_actual = $this->input->post('trans_date_actual');
		$trans_date = date('Y-m-d');
		$trans_hour = date('H:i:s');
		$moment_ke = $this->input->post('moment_ke');
		$action_ke = $this->input->post('action_ke');
		$pic_nik = $this->input->post('pic_nik');
		$trans_form_st = 1;

		$data_arr = [];
		for ($i = 0; $i < sizeof($ask_form_id); $i++) {
			$data = array(
				// 'trans_form_id' => $trans_form_id,
				'sub_div_id' => $sub_div_id,
				'mst_ppa_id' => $mst_ppa_id,
				'trans_date_actual' => $trans_date_actual,
				'trans_date' => $trans_date,
				'trans_hour' => $trans_hour,
				'moment_ke' => $moment_ke,
				'action_ke' => $action_ke,
				'trans_form_st' => $trans_form_st,
				'pic_nik' => $pic_nik,
				'ask_form_id' => $ask_form_id[$i],
				'num' => $num[$i],
				'denum' => $denum[$i],
			);
			$data_arr[] = $data;
			// var_dump($data);
			
		}
		$this->m_trans_form->insert_batch_dataHhg($data_arr);
		redirect(site_url('c_trans_apd/index'));

	}

	
}

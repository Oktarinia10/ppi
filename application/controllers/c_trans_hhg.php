<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_trans_hhg extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_ask_hhg', 'm_ask_hhg');

 	}

	public function index()
	{
		$this->load->view('trans_hhg/index');
	}

	public function tambah()
	{	
		$data = [
			'askHhg' => $this->m_ask_hhg->getAskHhg(),
		];
		$this->load->view('trans_hhg/tambah', $data);
	}

	public function realtime(){
		$trans_date = date('Y-m-d');
		$trans_hour = date('H:i:s');
		var_dump($trans_date, $trans_hour);
		// 'tanggal' => $trans_date;


// Ki kalo dipisah :

// Date :


// Time :

// 'waktu' => date('H:i:s');
	}
}

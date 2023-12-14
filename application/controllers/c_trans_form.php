<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_trans_form extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();

 	}

	public function index()
	{
		$this->load->view('trans_form/index');
	}

	public function create()
	{
		$this->load->view('trans_form/tambah');
	}

}

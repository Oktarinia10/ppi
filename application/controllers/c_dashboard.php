<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dashboard extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_auth');

 	}

	public function index()
	{
		
		$this->load->view('dashboard');
	}
	public function dash_admin()
	{
		$this->load->view('dash_adm');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_master extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd');
		$this->db2 = $this->load->database('otherdb', TRUE);

 	}

	public function index()
	{
		$this->load->view('master/index');
	}

	public function create()
	{
		$this->load->view('master/tambah');
	}

	public function coba_hrd()
	{
  	// $otherdb = $this->load->database('hrd', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
	$db1 = $this->load->database('hrd');
	$coba = $db1->get('karyawan')->result_array();
	// $hrd = $this->db->get('karyawan')->result_array();
  	// $query = $hrd->select('kary_nik')->get('karyawan');
  	var_dump($coba);
	}

	public function coba_ppi()
	{
		$this->db2->select('*');
		$this->db2->from('pic');
		$query = $this->db2->get()->result_array();
		var_dump($query);
	}

}

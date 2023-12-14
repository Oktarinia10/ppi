<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_form extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd'); // hrd
		$this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}

    public function getAllData(){
    
        $this->db2->order_by('mst_form_id', 'asc');
        return  $this->db2->get('master_form')->result_array();
       
    }

    public function addData($data){
        $this->db2->insert($data);
    }
}
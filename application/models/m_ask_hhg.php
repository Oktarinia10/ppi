<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ask_hhg extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd'); // hrd
		$this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}
     public function getAskHhg(){
        $this->db2->select('*');
        $this->db2->from('ask_form');
        $this->db2->where('mst_form_id',1);
        return $this->db2->get()->result_array();
     }

    
}
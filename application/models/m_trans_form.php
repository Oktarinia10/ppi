<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_trans_form extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
         $this->db1 = $this->load->database('hrd'); // hrd
         $this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}
     public function getAllData(){

         $this->db2->select('*');
         $this->db2->from('trans_form');
         return $this->db2->get()->result_array();

        // $this->db->get('sub_divisi')->result_array();

     }

     public function insert_batch_dataHhg ($data_arr) {
        $this->db2->insert_batch('trans_form', $data_arr);
    }

    
}
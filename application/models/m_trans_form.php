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

    public function getSubDivisiId(){
        $this->db->select('sub_divisi.sub_div_id, sub_divisi.sub_div_name');
        $this->db->from('sub_divisi');
        return $this->db->get()->result_array();

    }
    public function getMstPPAId(){
        $this->db2->select('master_ppa.mst_ppa_id, master_ppa.mst_ppa_name');
        $this->db2->from('master_ppa');
        return $this->db2->get()->result_array();

    }

    // Ask HHG
    public function getAskApd(){
        $this->db2->select('*');
        $this->db2->from('ask_form');
        $this->db2->where('mst_form_id',2);
        return $this->db2->get()->result_array();
    }

    public function getFilterDateHhg($trans_date){
        $this->db2->select('trans_date'); 
        $this->db2->from('trans_form');
        $this->db2->where('trans_date', $trans_date);
        return $this->db2->get()->result_array();

    }
}
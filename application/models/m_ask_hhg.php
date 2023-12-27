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

     public function getSubDivisiId(){
         // $this->db->select('hrd.sub_divisi.sub_div_id, hrd.sub_divisi.sub_div_name, ppi.trans_form.sub_div_id');
         // $this->db->from('hrd.sub_divisi');
         // $this->db->join('ppi.trans_form', 'hrd.sub_divisi.sub_div_id = ppi.trans_form.sub_div_id', 'left');
         // // $this->db->where(['pic_nik' => $pic_nik]);
         // return $this->db->get()->result_array();
         // // $query = $this->db->get();
         // // return $query->row();

         $this->db->select('hrd.sub_divisi.sub_div_id, hrd.sub_divisi.sub_div_name');
         $this->db->from('sub_divisi');
         return $this->db->get()->result_array();

        // $this->db->get('sub_divisi')->result_array();

     }
     public function getMstPPAId(){

         $this->db2->select('ppi.master_ppa.mst_ppa_id, ppi.master_ppa.mst_ppa_name');
         $this->db2->from('master_ppa');
         return $this->db2->get()->result_array();

        // $this->db->get('sub_divisi')->result_array();

     }

    
}
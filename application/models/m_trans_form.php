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

    public function getValueHhgFarmasi(){
        $this->db2->select('mst_ppa_id, num, denum');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 1); // hhg
        $this->db2->where('trans_form.mst_ppa_id', 3); // farmasi
        $this->db2->group_by('mst_ppa_id, num, denum');

        return $this->db2->get()->result_array();

    }
    public function getValueHhgPerawat(){ // HHG
        $this->db2->select('mst_ppa_id, num, denum, trans_date');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 1); // hhg
        $this->db2->where('trans_form.mst_ppa_id', 2); // perawat
        $this->db2->group_by('mst_ppa_id, num, denum, trans_date');

        return $this->db2->get()->result_array();

    }
    // get pertanyaan HHG & tgl sesuai kategori 1 = HHG
    public function getPertanyaanHhg(){ // HHG
        $this->db2->distinct();
        $this->db2->select('ask_form.ask_form_id, ask_name, trans_form.trans_date');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 1); // hhg
        $this->db2->group_by('trans_form.trans_date, ask_form.ask_form_id');

    return $this->db2->get()->result_array();
    }


    // get num denum dari pertanyaan HHG sesuai user
    public function getDenumValues() {
        $this->db2->select('ask_form.ask_form_id, trans_form.trans_date, mst_ppa_id, num, denum');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 1); // hhg
        $this->db2->group_by('ask_form.ask_form_id, trans_form.trans_date, mst_ppa_id, num, denum');
    
        return $this->db2->get()->result_array();
    }
    
    // get num denum dari pertanyaan APD sesuai user
    public function getValueApd() {
        $this->db2->select('ask_form.ask_form_id, trans_form.trans_date, mst_ppa_id, num, denum');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 2); // apd
        $this->db2->group_by('ask_form.ask_form_id, trans_form.trans_date, mst_ppa_id, num, denum');
    
        return $this->db2->get()->result_array();
    }

    // get pertanyaan APD & tgl sesuai kategori 2 = apd
    public function getPertanyaanApd(){ // APD
        $this->db2->distinct();
        $this->db2->select('ask_form.ask_form_id, ask_name, trans_form.trans_date');
        $this->db2->from('trans_form');
        $this->db2->join('ask_form', 'trans_form.ask_form_id = ask_form.ask_form_id', 'left');
        $this->db2->where('ask_form.mst_form_id', 2); // APD
        $this->db2->group_by('trans_form.trans_date, ask_form.ask_form_id');

        return $this->db2->get()->result_array();
    }
    
}
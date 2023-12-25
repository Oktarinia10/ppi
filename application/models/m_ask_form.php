<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ask_form extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd'); // hrd
		$this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}

     public function getAllData(){ 
        // $this->db2->order_by('ask_form_id', 'asc');
        // $this->db2->where('ask_form_st', 1);
        // return  $this->db2->get('ask_form')->result_array();
        $this->db2->select('*');
        $this->db2->from('ask_form');
        $this->db2->join('master_form', 'master_form.mst_form_id = ask_form.mst_form_id');
        $this->db2->where('ask_form.ask_form_st', 1);
        return $this->db2->get()->result_array();
    }

    // public function getDataHhg(){ // hhg = 1
    //     $this->db2->select('*');
    //     $this->db2->from('ask_form');
    //     $this->db2->join('master_form', 'master_form.mst_form_id = ask_form.mst_form_id');
    //     $this->db2->where('ask_form.ask_form_st', 1);
    //     return $this->db2->get()->result_array();
    // }

    public function addData($data){
        $this->db2->insert('ask_form', $data);
    }

    public function hapusData($ask_form_id){
        $data['mstform'] = $this->db2->get_where('ask_form', ['ask_form_id' => $ask_form_id])->row_array();
        // ubah pic_st jadi N
        $updated_data = [
            'mst_form_st' => 0,
        ];
        $this->db2->where('ask_form_id', $ask_form_id);
        $this->db2->update('ask_form', $updated_data);
    }
    // public function hapusData($ask_form_id){
    //     $this->db2->where('ask_form_id', $ask_form_id);
    //     return $this->db2->delete('master_form');
    // }

    public function getDataById($id){
        return $this->db2->get_where('ask_form', ['ask_form_id' => $id])->row_array();
    }

    public function editData($id)
    {
    $data['askform'] = $this->db2->get_where('ask_form', ['ask_form_id' => $id])->row_array();

    $data = [
        "ask_name" => $this->input->post('ask_name'),
        "mst_form_id" => $this->input->post('mst_form_id'),
        "ask_form_st" => 0, // set 0
    ];

    // var_dump($data['ask_name']);

    $this->db2->where('ask_form_id', $id);
    $this->db2->update('ask_form', $data);
    }


    
}
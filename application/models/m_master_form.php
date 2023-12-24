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
        $this->db2->where('mst_form_st', 1);
        return  $this->db2->get('master_form')->result_array();
       
    }
    

    public function addData($data){
        
        $this->db2->insert('master_form', $data);
    }

    public function hapusData($mst_form_id){
        $data['mstform'] = $this->db2->get_where('master_form', ['mst_form_id' => $mst_form_id])->row_array();
        // ubah pic_st jadi N
        $updated_data = [
            'mst_form_st' => 0,
        ];
        $this->db2->where('mst_form_id', $mst_form_id);
        $this->db2->update('master_form', $updated_data);
    }
    // public function hapusData($mst_form_id){
    //     $this->db2->where('mst_form_id', $mst_form_id);
    //     return $this->db2->delete('master_form');
    // }

    public function getDataById($id){
        return $this->db2->get_where('master_form', ['mst_form_id' => $id])->row_array();
    }

    public function editData($id)
    {
    $data['mstform'] = $this->db2->get_where('master_form', ['mst_form_id' => $id])->row_array();

    $updated_data = [
        "mst_name" => $this->input->post('mst_name', true),
        "mst_form_st" => 0, // set 0
    ];

    $this->db2->where('mst_form_id', $id);
    $this->db2->update('master_form', $updated_data);
    }


    
}
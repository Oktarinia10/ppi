<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_ppa extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd'); // hrd
		$this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}

    public function getAllData(){
    
        $this->db2->order_by('mst_ppa_id', 'asc');
        return  $this->db2->get('master_ppa')->result_array();
       
    }
    //tambah data
    public function addData($data){
        $this->db2->insert('master_ppa', $data);
    }

    public function hapusData($mst_form_id){
        $this->db2->where('mst_form_id', $mst_form_id);
        return $this->db2->delete('master_form');
    }

    public function getDataById($id){
        return $this->db2->get_where('master_ppa', ['mst_ppa_id' => $id])->row_array();
    }

    public function editData($id)
    {
    // Dapatkan data berdasarkan ID
    $data['mstppa'] = $this->db2->get_where('master_ppa', ['mst_ppa_id' => $id])->row_array();

    // Ambil nilai input dari formulir
    $updated_data = [
        "mst_ppa_name" => $this->input->post('mst_name', true),
        "mst_ppa_st" => $this->input->post('mst_form_st', 0), // set 0
    ];

    // Update data di database berdasarkan ID
    $this->db2->where('mst_ppa_id', $id);
    $this->db2->update('master_ppa', $updated_data);
    }


    
}
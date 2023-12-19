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
        $this->db2->where('mst_ppa_st', 1);
        return  $this->db2->get('master_ppa')->result_array();
       
    }
    //tambah data
    public function addData($data){
        $this->db2->insert('master_ppa', $data);
    }

    public function hapusData($mst_ppa_id){
        $this->db2->where('mst_ppa_id', $mst_ppa_id);
        return $this->db2->delete('master_ppa');
    }

    public function getDataById($id){
        return $this->db2->get_where('master_ppa', ['mst_ppa_id' => $id])->row_array();
    }

    public function editData($id)
    {
    // get data by id
    $data['mstppa'] = $this->db2->get_where('master_ppa', ['mst_ppa_id' => $id])->row_array();

    // nilai dr form
    $updated_data = [
        "mst_ppa_name" => $this->input->post('mst_ppa_name', true),
        "mst_ppa_st" => (0), // set 0
    ];
    // var_dump($updated_data);

    // Update data by id
    $this->db2->where('mst_ppa_id', $id);
    $this->db2->update('master_ppa', $updated_data);
    }


    
}
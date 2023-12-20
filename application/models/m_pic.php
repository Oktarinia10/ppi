<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pic extends CI_Model {

	public function __construct()
 	{
  		parent::__construct();
        $this->db1 = $this->load->database('hrd'); // hrd
		$this->db2 = $this->load->database('otherdb', TRUE); // ppi
 	}

    public function getAllData(){
    
        $this->db2->order_by('pic_id', 'asc');
        $this->db2->where('pic_st', 'A');
        return  $this->db2->get('pic')->result_array();
       
    }
    //tambah data
    public function addData($data){
        $this->db2->insert('pic', $data);
    }

    public function hapusData($pic_id){
        $data['mstpic'] = $this->db2->get_where('pic', ['pic_id' => $pic_id])->row_array();
        // ubah pic_st jadi N
        $updated_data = [
            'pic_st' => 'N',
        ];
        $this->db2->where('pic_id', $pic_id);
        $this->db2->update('pic', $updated_data);
    }

    // public function hapusData($pic_id){
    //     $this->db2->where('pic_id', $pic_id);
    //     return $this->db2->delete('pic');
    // }

    public function getDataById($id){
        return $this->db2->get_where('pic', ['pic_id' => $id])->row_array();
    }

    public function editData($id)
    {
    // get data by id
    $data['mstpic'] = $this->db2->get_where('pic', ['pic_id' => $id])->row_array();

    // nilai dr form
    $updated_data = [
        "pic_nik" => $this->input->post('pic_nik', true),
        "pic_flag" => $this->input->post('pic_flag', true),
        "pic_st" => ('N'), // set 0
    ];
    // var_dump($updated_data);

    // Update data by id
    $this->db2->where('pic_id', $id);
    $this->db2->update('pic', $updated_data);
    }


    
}
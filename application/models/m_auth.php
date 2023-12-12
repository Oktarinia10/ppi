<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_auth extends CI_Model {

    public function __construct()
 	{
  		parent::__construct();
        // $this->db1 = $this->load->database('hrd');
		// $this->db2 = $this->load->database('otherdb', TRUE);
 	}

	public function auth() {
        // $this->db->select("db1.karyawan.kary_nik");
        // $this->db->join('db1.karyawan', 'db1.karyawan.kary_nik = db2.pic.pic_nik');
        // $query = $this->db->get();
        $db1 = $this->load->database('default', TRUE);
        $db2 = $this->load->database('otherdb', TRUE);
        $this->db->select('db1.karyawan.kary_nik, db2.pic.pic_nik');
        $this->db->join('db2.pic', 'db1.karyawan.kary_nik = db2.pic.pic_nik');
        $query = $this->db->get('db1.karyawan');
        $result = $query->result();

    }
    // public function getKaryawanPicData($pic_nik) {

    //     // $kondisi = array(
	// 	// 	'pic_nik' => $pic_nik,
	// 	// 	'kary_pwd' => $kary_pwd
	// 	// );
    //     // var_dump($pic_nik, $kary_pwd);


    //     $this->db->select('hrd.karyawan.kary_nik, hrd.karyawan.kary_pwd, ppi.pic.pic_nik');
    //     $this->db->from('hrd.karyawan');
    //     $this->db->join('ppi.pic', 'hrd.karyawan.kary_nik = ppi.pic.pic_nik', 'left');
    //     $this->db->where(['pic_nik' => $pic_nik]);
    //     // $this->db->limit(1);
	// 	// return $this->db->get();
    //     $query = $this->db->get();
    //     // var_dump($query);
    //     return $query->result();
        
    // }

    // public function getKaryawanPicData($pic_nik) {
    //     $this->db->select('hrd.karyawan.kary_nik, hrd.karyawan.kary_pwd, ppi.pic.pic_nik');
    //     $this->db->from('hrd.karyawan');
    //     $this->db->join('ppi.pic', 'hrd.karyawan.kary_nik = ppi.pic.pic_nik', 'left');
    //     $this->db->where(['pic_nik' => $pic_nik]);
    
    //     $query = $this->db->get();
        
    //     // Check if there are rows in the result set
    //     if ($query->num_rows() > 0) {
    //         return $query->row(); // Use row() instead of result() if you expect only one row
    //     } else {
    //         return false; // Return false or handle the case where no rows are found
    //     }
    // }

    public function getKaryawanPicData($pic_nik) {
        // $this->db->select('kary_nik, kary_pwd');
        // $this->db->from('hrd.karyawan');
        // $this->db->where('kary_nik', $pic_nik);
        $this->db->select('hrd.karyawan.kary_nik, hrd.karyawan.kary_pwd, ppi.pic.pic_nik, ppi.pic.pic_flag');
        $this->db->from('hrd.karyawan');
        $this->db->join('ppi.pic', 'hrd.karyawan.kary_nik = ppi.pic.pic_nik', 'left');
        $this->db->where(['pic_nik' => $pic_nik]);
    
        $query = $this->db->get();
    
        return $query->row(); // Use row() instead of result() if you expect only one row
    }
    
    
    

}

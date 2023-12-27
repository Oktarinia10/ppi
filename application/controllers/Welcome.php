<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
 	{
  		parent::__construct();
		$this->load->model('m_auth');

 	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function dashboard()
	{
		$data = [
			'title' => 'PPI',
		];
		$this->load->view('dashboard', $data);
	}

	public function autentikasi()
	{
		$cek = $this->m_auth->getKaryawanPicData();
		var_dump($cek);

	}

	// public function login() {
    //     // login form
    //     $pic_nik = $this->input->post('pic_nik');
    //     $kary_pwd = $this->input->post('kary_pwd');

    //     $user = $this->m_auth->getKaryawanPicData($pic_nik, $kary_pwd);

    //     if ($user) {
    //         // Set user session data
    //         $user_data = array(
    //             'user_id' => $user['id'],
    //             'pic_nik' => $user['pic_nik'],
    //             'logged_in' => true
    //         );
    //         $this->session->set_userdata($user_data);
    //         redirect('dashboard'); // Redirect to page
    //     } else {
    //         $this->load->view('login');
    //     }
    // }

	// public function proses_login()
	// {
	// 	$pic_nik = $this->input->post('pic_nik');
	// 	$kary_pwd = $this->input->post('kary_pwd');
	// 	// var_dump($pic_nik, $kary_pwd);

	// 	$cek = $this->m_auth->getKaryawanPicData($pic_nik, $kary_pwd);
		

	// 	if (!empty($cek) && count($cek) == 1) {
	// 		foreach ($cek->result() as $data) {
	// 			$users = array(
	// 				'pic_nik' => $data->$pic_nik,
	// 				'kary_pwd' => $data->kary_pwd,
	// 				'pic_flag' => $data->pic_flag,
	// 			);

	// 			$this->session->set_userdata($users);

	// 			if ($this->session->userdata('pic_flag') == '1') {
	// 				redirect(site_url('c_master'));
	// 			} elseif ($this->session->userdata('pic_flag') == '2') {
	// 				redirect(site_url('c_master'));
	// 			} else {
	// 				echo 'tidak masuk kategori'; 
	// 			}
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Username atau Password salah');
	// 		redirect(site_url('welcome'));
	// 	}
	// }

	// public function proses_login()
    // {
    //     $pic_nik = $this->input->post('pic_nik');
	// 	$kary_pwd = $this->input->post('kary_pwd');
	// 	// var_dump($pic_nik, $kary_pwd);
	// 	$cek = $this->m_auth->getKaryawanPicData($pic_nik);
    // 	// var_dump($cek);

    //     // cek username 
    //     if($cek->num_rows() > 0)
    //     {
    //         // ambil isi dari record
    //         $hasil = $cek->row();
    //         if(password_verify($kary_pwd, $hasil->kary_pwd))
    //         {
    //       
    //             $this->session->set_userdata('pic_id', $hasil->pic_id);
    //             $this->session->set_userdata('is_login', TRUE);

    //             // redirect 
    //             if ($this->session->userdata('pic_flag') == '1') {
	// 				redirect(site_url('c_master'));
	// 			} elseif ($this->session->userdata('pic_flag') == '2') {
	// 				redirect(site_url('c_master'));
	// 			} else {
	// 				echo 'tidak masuk kategori'; 
	// 			}
    //         }else{
    //             // jika password salah
    //             $this->session->set_flashdata('failed','Password salah !');
    //             redirect(site_url('welcome'));
    //         }
    //     }else{
    //         // jika username salah
    //         $this->session->set_flashdata('failed','Username tidak Tersedia !');
    //         redirect(site_url('welcome'));
    //     }
    // }

	public function proses_login() {
		$pic_nik = $this->input->post('pic_nik');
		$kary_pwd = $this->input->post('kary_pwd');
	
		$cek = $this->m_auth->getKaryawanPicData($pic_nik);

		if ($cek) {
			if (password_verify($kary_pwd, $cek->kary_pwd)) {
				// redirect 
                $this->session->set_userdata('pic_flag', $cek->pic_flag);
                $this->session->set_userdata('kary_name', $cek->kary_name);
                $this->session->set_userdata('kary_nik', $cek->kary_nik);
                $this->session->set_userdata('pic_nik', $cek->pic_nik);

				// Redirect based on user role
				// if ($cek->pic_flag == '1' || $cek->pic_flag == '2') {
				// 	redirect(site_url('c_dashboard'));
				// } else {
				// 	echo 'Anda tidak memiliki akses!'; 
				// }

				if ($cek->pic_flag == '1') {
					redirect(site_url('c_dashboard/index'));
				} elseif ($cek->pic_flag == '2') {
					redirect(site_url('c_dashboard/index'));
				}else {
					echo 'Anda tidak memiliki akses!'; 
				}
				
			} else {
				// Password is incorrect
				$this->session->set_flashdata('failed', 'Password salah !');
				redirect(site_url(''));
			}
		} else {
			// Username not found
			$this->session->set_flashdata('failed', 'Username tidak Tersedia !');
			redirect(site_url(''));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
    	redirect(site_url(''));
	}
	
}

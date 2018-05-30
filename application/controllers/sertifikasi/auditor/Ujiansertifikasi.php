<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianSertifikasi extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    	$this->load->helper('url');
    	$this->load->model('sertifikasi/menupage','menupage');
		$this->load->model('sertifikasi/soalujian','soalujian');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
		$data['content_page']='auditor/ujian_sertifikasi.php';
        $data['username']=$username;
		$data['soal'] = $this->acak_jawaban();
		$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
		$this->load->view( 'sertifikasi/homepage', $data);
	   //var_dump($this->acak_jawaban());
      }else{
        redirect('/');
      }
    }
	
	public function acak_jawaban(){
		$pilihan = 'PILIHAN_';
		$list = $this->soalujian->_get_soal_ujian_from_bab_mata_ajar(9);
        $data = array();
		
        foreach ($list as $soal) {
			$soal_ujian = array();
			$field_col = $pilihan.$soal->JAWABAN;
			$soal_ujian[] = $soal->$field_col;
			//get data random for all pilihan
			$input = array('1', '2', '3', '4');
			unset($input[($soal->JAWABAN)-1]);
			$rand_keys = array_rand($input, 3);
			foreach($rand_keys as $asd){
				$field_col2 = $pilihan.($asd+1);
				$soal_ujian[] = $soal->$field_col2;
			}
			array_rand($soal_ujian,4);
			$soal_ujian[] = $soal->PK_SOAL_UJIAN;
			$soal_ujian[] = $soal->PERTANYAAN;
			array_push($data,$soal_ujian);
		
		}
		return $data;
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KomponenNilai extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/LookupUjian','lookup_ujian');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');
			$nip = $this->session->userdata('nip');
      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/komponen_nilai.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function loadData(){
			$dataRows = array();
			$nip = $this->session->userdata('nip');
			$dataAll=$this->lookup_ujian->getDataNilaibyunitapip($nip);
			$dataRows[]=$dataAll;

		//output to json format
		echo json_encode($dataRows);
		}
}

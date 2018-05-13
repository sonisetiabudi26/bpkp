<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementBankSoal extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		$this->load->model('sertifikasi/menupage','menupage');
    	$this->load->model('sertifikasi/soalujian','soalujian');
		$this->load->model('sertifikasi/groupmataajar','groupmataajar');
		$this->load->model('sertifikasi/mataajar','mataajar');
		$this->load->model('sertifikasi/users','users');
		$this->load->model('sertifikasi/lookup','lookup');
		$this->load->model('sertifikasi/babmataajar','babmataajar');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/management_bank_soal.php';
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
	
	public function vw_add_group_mata_ajar(){
		$data['diklat']	= $this->lookup->_get_lookup_from_lookupgroup('DIKLAT_SERTIFIKASI');
		$this->load->view('sertifikasi/bank_soal/content/add_group_mata_ajar', $data);
	}
	
	public function vw_add_mata_ajar(){
		$data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_mata_ajar', $data);
	}
	
	public function vw_add_bab_mata_ajar(){
		$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_bab_mata_ajar', $data);
	}
	
	public function vw_review_ujian(){
		$data['mata_ajar'] = $this->babmataajar->_detail_bab_mata_ajar();
		$data['user_bank_soal']	= $this->users->_get_user_bank_soal();
		$this->load->view('sertifikasi/bank_soal/content/review_ujian', $data);
	}
}
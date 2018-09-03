<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBankSoal extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->model('sertifikasi/menupage','menupage');
			$this->load->model('sertifikasi/soalujian','soalujian');
			$this->load->model('sertifikasi/mataajar','mataajar');
			$this->load->model('sertifikasi/babmataajar','babmataajar');
			$this->load->model('sertifikasi/users','users');
			$this->load->model('sertifikasi/soalkasus','soalkasus');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/admin_bank_soal.php';
			$data['username']=$username;
			$data['mata_ajar']	= $this->mataajar->_get_all();
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }

	public function listsoal(){
		$data['soal'] = $this->soalujian->_get_soal_ujian_from_bab_mata_ajar($this->input->post('fk_bab_mata_ajar'));
		$data['jumlah_soal'] = $this->soalujian->count_all($this->input->post('fk_bab_mata_ajar'));
		$data['user_bank_soal']	= $this->users->_get_user_bank_soal();
		$this->load->view('sertifikasi/bank_soal/content/list_soal', $data);
    }

	public function add_soal(){
		$data['mata_ajar']	= $this->mataajar->_get_all();
		$this->load->view('sertifikasi/bank_soal/add_response', $data);
    }

	public function vw_add_soal(){
		$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_soal', $data);
	}

	public function vw_import_soal($param){
		$data['id_permintaan']=$param;
		$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/import_soal', $data);
	}

	public function vw_review_soal(){
		$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
		$data['user_bank_soal']	= $this->users->_get_user_bank_soal();
		$this->load->view('sertifikasi/bank_soal/content/review_soal', $data);
	}

	public function vw_add_soal_kasus(){
		$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_soal_kasus', $data);
	}

	public function insert_soal_kasus(){
		if($this->input->post('kode_kasus')!=''&&$this->input->post('soal_kasus')!=''){
		$data = array(
			'KODE_KASUS' => $this->input->post('kode_kasus'),
			'SOAL_KASUS' => $this->input->post('soal_kasus'),
			'FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar')
		);
		if($this->soalkasus->_add($data)){
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
    }

	public function check_soal(){
		print json_encode( $this->soalujian->count_all($this->input->get('fk_bab_mata_ajar')));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $filename = "soal";
	public function __construct(){
        parent::__construct();
    $this->load->library('session');
    $this->load->helper(array('form', 'url'));
		$this->load->model('sertifikasi/menupage','menupage');
    $this->load->model('sertifikasi/babmataajar','babmataajar');
		$this->load->model('sertifikasi/mataajar','mataajar');
		$this->load->model('sertifikasi/reviewsoal','reviewsoal');
		$this->load->model('sertifikasi/KonfigUjian','konfig');
		$this->load->model('sertifikasi/kodesoal','kodesoal');
	  $this->load->model('sertifikasi/permintaansoal','permintaansoal');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/admin/homepage.php';
			$data['username']=$username;
			$data['bank_soal']	= $this->babmataajar->_detail_bab_mata_ajar();
			$data['review_soal']	= $this->reviewsoal->_get_all_review_ujian();
			$datakonfig=$this->konfig->loadData();
			$datakodesoal=$this->kodesoal->view();
			$datapermintaan=$this->permintaansoal->getcount_permintaansoal();
			$data['konfig']=$datakonfig->num_rows();
			$data['kode_soal']=$datakodesoal->num_rows();
			$data['permintaan']=$datapermintaan->num_rows();
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }

	public function set_admin_role(){

	}
}

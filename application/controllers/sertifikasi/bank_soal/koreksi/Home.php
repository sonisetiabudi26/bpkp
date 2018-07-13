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
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/koreksi/homepage.php';
			$data['username']=$username;
			$data['mata_ajar'] = $this->mataajar->_detail_review_mata_ajar();
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
	
	public function set_admin_role(){
		
	}
}
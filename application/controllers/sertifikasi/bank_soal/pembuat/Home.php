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
		$this->load->model('sertifikasi/reviewsoal','reviewsoal');
		$this->load->model('sertifikasi/detailpermintaansoal','detailpermintaansoal');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/pembuat/homepage.php';
			$data['username']=$username;
			$data['bab_mata_ajar']	= $this->babmataajar->_review_bab_mata_ajar();
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
		public function soal($id){
				//
				// // $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
				// // $username = $this->session->userdata('logged_in');
				// // //$fk_bab_mata_ajar=$this->input->post('fk_bab_mata_ajar');
				// // if(isset($fk_lookup_menu) && isset($username)){
				// 	$data['id']=$id;
				// // 	$data['title_page'] = 'BPKP Web Application';
				// // 	$data['content_page']='bank_soal/pembuat/edit_soal.php';
				// // 	$data['username']=$username;
				// // 	getMenuAccessPage($data, $fk_lookup_menu);
				// // }else{
				// // 	redirect('/');
				// // }
				// $this->load->view('sertifikasi/bank_soal/pembuat/edit_soal', $data);
				$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
				$username = $this->session->userdata('logged_in');
				if(isset($fk_lookup_menu) && isset($username)){
					$data['title_page'] = 'BPKP Web Application';
					$data['content_page']='bank_soal/pembuat/edit_soal.php';
					$data['username']=$username;
					$data['id']=$id;
					$data['comment']=$this->detailpermintaansoal->getcomment($id);
					if($data['comment']!='no data'){
						$data['status']=$data['comment'][0]->STATUS;
					}else{
						$data['status']='';
						$data['comment']=[];
					}
					// $data['bab_mata_ajar']	= $this->babmataajar->_review_bab_mata_ajar();
					getMenuAccessPage($data, $fk_lookup_menu);
				}else{
					redirect('/');
				}
		}


	public function set_admin_role(){

	}
}

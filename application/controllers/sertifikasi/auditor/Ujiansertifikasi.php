<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujiansertifikasi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
    }

    public function index()
	{
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		/** check session */
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='auditor/ujiansertifikasi.php';
			$data['username']=$username;
			$menupage=$this->menupage->_get_access_menu_page($fk_lookup_menu);
			if(!empty($menupage)){
				$data['menu_page'] = $menupage;
				$this->load->view('sertifikasi/homepage', $data);
			}else{
				redirect('/');
			}
		}else{
			redirect('/');
		}
	}
}

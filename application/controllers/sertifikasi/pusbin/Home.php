<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
    }

    public function index()
    {
<<<<<<< HEAD
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='auditor/homepage.php';
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
=======
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='pusbin/homepage.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
>>>>>>> remotes/origin/dev-bpkp-v1
    }
}

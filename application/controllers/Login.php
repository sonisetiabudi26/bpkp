<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->model('sertifikasi/users','users');
		$this->load->model('sertifikasi/menupage','menupage');
    }

	public function index()
	{
		if(!$this->input->post()){
			redirectLogin(ERROR_LOGIN_PAGE_REFRESH_PROCESS);
		}else{
			$this->process();
		}
	}

	private function process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->users->_get_user_information($username);
		if(!empty($result)){
			$password_decrypt = $this->encrypt->decode($result[0]->USER_PASSWORD);
			if($password == $password_decrypt){
				$session_data = array(
					'username' => $result[0]->USER_NAME
				);
				// tambah ke session
				$this->session->set_userdata('logged_in', $result[0]->USER_NAME);
				$this->session->set_userdata('fk_lookup_menu',$result[0]->FK_LOOKUP_ROLE);
				$fk_lookup_menu=$result[0]->FK_LOOKUP_ROLE;
				//redirect('sertifikasi/home');
				$this->direct_page($fk_lookup_menu);
			}else{
				redirectLogin(ERROR_LOGIN_PAGE_PASS);
			}
		}else{
			redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
		}
	}
	
	private function direct_page($param){
		$menu_url	= $this->menupage->_get_menu_information($param);
		if (!empty($menu_url)) {
			$menu_page =strtolower($menu_url->menu_main);
			redirect("sertifikasi/".$menu_page);
		}else{
			redirectLogin(ERROR_LOGIN_PAGE_MENUROLE);
		}
	}

	public function logout(){
		// hapus session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		//$data['messages'] = 'Successfully Logout';
		redirect('/');
	}
}

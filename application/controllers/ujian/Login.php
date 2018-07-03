<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('sertifikasi/users','users');
		$this->load->helper(array('form', 'url'));
		$this->load->library('Curl');
    }

	public function index()
	{
		if(!$this->input->post()){
			redirectLoginUjian(ERROR_LOGIN_PAGE_REFRESH_PROCESS);
		}else{
			$this->processLogin();
		}
	}
	public function processLogin(){
		$url="http://163.53.185.91:8083/sibijak/dca/api/api/login";
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jsonData = array(
			'nip' => $username,
			'password' => $password
		);
		$result=getDataCurl($jsonData,$url);
		$jsonDataEncoded = json_decode($result);
		if($jsonDataEncoded->message=='login_success' && $jsonDataEncoded->data[0]->IsAuditor){
			$this->session->set_userdata('logged_in', $jsonDataEncoded->data[0]->Auditor_NamaLengkap);
			$this->session->set_userdata('logged_nip', $jsonDataEncoded->data[0]->Auditor_NIP);
			redirect("ujian-sertifikasi-jfa/ujian");
		}else{
			redirectLoginUjian(ERROR_LOGIN_PAGE_USERNAME);
		}
	}
	
	public function logout(){
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_nip', $sess_array);
		redirect('ujian-sertifikasi-jfa');
	}
}

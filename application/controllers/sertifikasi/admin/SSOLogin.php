<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

class AngkaKreditAuditor extends REST_Controller {

	public function __construct($config = 'rest'){
        // Load parent construct
        parent::__construct($config);
        $this->load->helper('form');
    		$this->load->library('form_validation');
    		$this->load->library('session');
    		$this->load->library('encryption');
    		$this->load->model('sertifikasi/Users','users');
    		$this->load->model('sertifikasi/Lookup','lookup');
    		$this->load->model('sertifikasi/MenuPage','menupage');
    		$this->load->helper(array('form', 'url'));
    		$this->load->library('Curl');
    }
			public function index(){
				$data='Sertifikasi';
				echo json_encode($data,JSON_PRETTY_PRINT);
			}
      public function SSOVerify()
    	{
        $nip= $this->input->get('nip');
        $token= $this->input->get('token');
    		if(!$this->input->get('nip')&&!$this->input->get('token')){
    			redirectLogin(ERROR_LOGIN_PAGE_REFRESH_PROCESS);
    		}else{
    			$this->processLogin($nip,$token);
    		}
    	}

      	private function process($username,$password)
      	{
      		// $username = $this->input->post('username');
      		// $password = $this->input->post('password');

      		$result = $this->users->_get_user_information($username);
      		if(!empty($result)){
      			  //$password = $this->input->post('password');
      				//$pass=$this->encryption->encrypt($password);
      			  $password_decrypt = $this->encryption->decrypt($result[0]->USER_PASSWORD);
      			if($password == $password_decrypt){
      				$session_data = array(
      					'username' => $result[0]->USER_NAME
      				);
      				// tambah ke session
      				$this->session->set_userdata('logged_in', $result[0]->USER_NAME);
      				$this->session->set_userdata('nip', $username);
      				$this->session->set_userdata('fk_lookup_menu',$result[0]->FK_LOOKUP_ROLE);
      				$fk_lookup_menu=$result[0]->FK_LOOKUP_ROLE;
      				//redirect('sertifikasi/home');
      				 // $role_menu = $this->input->post('role');
      				// if($role_menu==$fk_lookup_menu){
      				// 	$this->direct_page($fk_lookup_menu);
      				// }else if($fk_lookup_menu==18 || $fk_lookup_menu==20){
      					$this->direct_page($fk_lookup_menu);
      				// }else{
      				// 	redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
      				// }
      			}else{
      				//echo $password_decrypt;
      				redirectLogin(ERROR_LOGIN_PAGE_PASS);
      			}
      		}else{
      			redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
      		}
      	}

       public function processLogin($nip,$token){
      	 $url="http://163.53.185.91:8083/sibijak/dca/api/api/login";
      	 $username = $this->input->post('username');
      	 $password = $this->input->post('password');
      	 $role_menu = $this->input->post('role');
        if($role_menu==2 ){
      			 $jsonData = array(
      		     'nip' => $username,
      		     'password' => $password
      		 );
      		 		$result=getDataCurl($jsonData,$url);
      				//var_dump($result);

      				$jsonDataEncoded = json_decode($result);
      				if($jsonDataEncoded->message=='login_success'){
      					$url="http://163.53.185.91:8083/sibijak/dca/api/api/dtpengguna";
      					$data_login = array(
      						'nip' => $username,
      				);
      					$check=getDataCurl($data_login,$url);
      					$jsonResult=json_decode($check);

      					if($jsonResult->data[0]!=''){
      						if( $jsonResult->data[0]->RoleGroup!='Level 4' && $jsonResult->data[0]->isAdmin=="true"){
      						 $role=$jsonResult->data[0]->RoleGroup;
      						 $result = $this->lookup->_get_user_bridge_api($role);
      						// var_dump($result);
      						//echo $jsonResult->data[0][25];
      					   $this->session->set_userdata('nip', $username);
      						 $this->session->set_userdata('logged_in', $jsonResult->data[0]->NamaLengkap);
      						 $this->session->set_userdata('fk_lookup_menu',$result[0]->PK_LOOKUP);
      						 $this->session->set_userdata('kodeunitkerja',$jsonResult->data[0]->KodeUnitKerja);
      						 $this->direct_page($result[0]->PK_LOOKUP);
      				 // if($role=='Unit Kerja' && $role_menu==6){
      					//$fk_lookup_menupage='6';

      				// }else if($role=='Eselon1' && $role_menu==5){
      				// 	$fk_lookup_menupage='5';
      				// 	$this->session->set_userdata('logged_in', $jsonResult->data[0]->NamaLengkap);
      				// 	$this->session->set_userdata('fk_lookup_menu',$fk_lookup_menupage);
      				//  	$this->direct_page($fk_lookup_menupage);
      			}else if($jsonResult->data[0]->RoleGroup=='Level 4' && $jsonResult->data[0]->isAuditor=="true"){
      					$role=$jsonResult->data[0]->RoleGroup;
      					$result = $this->lookup->_get_user_bridge_api($role);
      				 // var_dump($result);
      				 $this->session->set_userdata('nip', $username);
      					$this->session->set_userdata('logged_in', $jsonResult->data[0]->NamaLengkap);
      					$this->session->set_userdata('fk_lookup_menu',$result[0]->PK_LOOKUP);
      					$this->session->set_userdata('kodeunitkerja',$jsonResult->data[0]->KodeUnitKerja);
      					$this->direct_page($result[0]->PK_LOOKUP);
      				}else{
      					redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
      				}
      				}else{
      				 	redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
      				 }
      			 }else{
      				 redirectLogin(ERROR_LOGIN_PAGE_USERNAME);
      			 }
      	 }else{
      		 	$this->process($username,$password);
      	 }
       }
      	//private function
      	private function direct_page($param){
      		$menu_url	= $this->menupage->_get_menu_information($param);
      		if (!empty($menu_url)) {
      			$menu_page =strtolower($menu_url->menu_main);
      			redirect("sertifikasi/".$menu_page);
      		}else{
      			redirectLogin(ERROR_LOGIN_PAGE_MENUROLE);
      		}
      	}

}

<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('redirectLogin')){
	function redirectLogin($messages){
		/** get main CodeIgniter object */
       $ci =& get_instance();
		$data = array(
				'messages' => $messages
			);
		$ci->load->view('homepage', $data);
	}
}

if ( ! function_exists('getMenuAccessPage')){
	function getMenuAccessPage($data, $fk_lookup_menu){
		/** get main CodeIgniter object */
		$ci =& get_instance();
		$menupage = $ci->menupage->_get_access_menu_page($fk_lookup_menu);
		if(!empty($menupage)){
			$data['menu_page'] = $menupage;
			$ci->load->view('sertifikasi/homepage', $data);
		}else{
			redirectLogin(ERROR_LOGIN_PAGE_MENU_NOT_FOUND);
		}
	}
}
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('redirectLogin')){
	function redirectLogin($messages){
		//get main CodeIgniter object
       $ci =& get_instance();
		$data = array(
				'messages' => $messages
			);
		$ci->load->view('homepage', $data);
	}
}
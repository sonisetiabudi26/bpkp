<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('sertifikasi/lookup','lookup');
		$this->load->model('sertifikasi/menupage','menupage');
    }

	public function index()
	{
		if(!empty($this->session->flashdata('logged_in'))){
			$data['title_page'] = 'BPKP Web Application';
			$fk_lookup_menu = $this->session->flashdata('fk_lookup_menu');
			$menu_url	= $this->menupage->_get_menu_information($fk_lookup_menu);
			if(!empty($menu_url)){
				$data['content_page'] =$menu_url->menu_url;
			}
			$data['lookups'] = $this->lookup->_get_all();
			$this->load->view('sertifikasi/homepage', $data);
		}else{
			redirect('/');
		}
	}
}

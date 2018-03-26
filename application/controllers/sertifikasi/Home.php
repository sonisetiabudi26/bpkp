<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){    
        // Load parent construct
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('sertifikasi/lookup');
    }
	
	public function index()
	{
		$data['title_page'] = 'BPKP Web Application';
		$data['content_page'] = 'auditor/homepage.php';
		
		$data['lookups'] = $this->lookup->_get_all();
		$this->load->view('sertifikasi/homepage', $data);
	}
}

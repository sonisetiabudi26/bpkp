<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalUjianKasus extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	$this->load->model('sertifikasi/SoalKasus','soalkasus');
    }
	
	public function listsoalkasus(){
		$data['soalkasus'] = $this->soalkasus->_get_soal_kasus_from_fk_bab_mata_ajar($this->input->get('fk_bab_mata_ajar'));
		echo json_encode($data); 
    }
}
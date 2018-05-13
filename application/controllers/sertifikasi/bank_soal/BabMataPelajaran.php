<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BabMataPelajaran extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	$this->load->model('sertifikasi/BabMataAjar','babmataajar');
    }

    public function tambah(){
		if(!empty($this->input->post('fk_mata_ajar')) && !empty($this->input->post('bab_mata_ajar'))){
			$data = array(
			'fk_mata_ajar' => $this->input->post('fk_mata_ajar'),
			'nama_bab_mata_ajar' => $this->input->post('bab_mata_ajar')
			);
			if($this->babmataajar->_add($data)){
				print json_encode(array("status"=>"success", "data"=>"success"));
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
		}else{
			print json_encode(array("status"=>"mata ajar / bab mata harus diisi", "data"=>"mata ajar / bab mata harus diisi"));
		}
    }
	
	public function listbab(){
		$data['bab'] = $this->babmataajar->_get_bab_from_fk_mata_ajar($this->input->get('fk_mata_ajar'));
		echo json_encode($data); 
    }
}
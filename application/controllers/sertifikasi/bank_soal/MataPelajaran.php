<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	$this->load->model('sertifikasi/MataAjar','mataajar');
    }

    public function tambah(){
		if(!empty($this->input->post('fk_group_mata_ajar')) && !empty($this->input->post('nama_mata_ajar'))){
			$data = array(
			'fk_group_mata_ajar' => $this->input->post('fk_group_mata_ajar'),
			'nama_mata_ajar' => $this->input->post('nama_mata_ajar')
			);
			if($this->mataajar->_add($data)){
				print json_encode(array("status"=>"success", "data"=>"success"));
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
		}else{
			print json_encode(array("status"=>"group mata ajar or bab mata harus diisi", "data"=>" group mata ajar or bab mata harus diisi"));
		}
    }
}
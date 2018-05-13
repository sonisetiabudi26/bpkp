<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupMataPelajaran extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	$this->load->model('sertifikasi/GroupMataAjar','groupmataajar');
    }

    public function tambah(){
		if(!empty($this->input->post('fk_lookup_diklat')) && !empty($this->input->post('group_mata_ajar'))){
			$data = array(
			'fk_lookup_diklat' => $this->input->post('fk_lookup_diklat'),
			'nama_group_mata_ajar' => $this->input->post('group_mata_ajar')
			);
			if($this->groupmataajar->_add($data)){
				print json_encode(array("status"=>"success", "data"=>"success"));
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
		}else{
			print json_encode(array("status"=>"jenis diklat harus dipilih terlebih dahulu", "data"=>"jenis diklat harus dipilih terlebih dahulu"));
		}
    }
}
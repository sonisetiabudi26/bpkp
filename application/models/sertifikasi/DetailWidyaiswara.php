<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailWidyaiswara extends My_Model
{
	public $_table = 'detail_nilai_wi';
	public $primary_key = 'PK_DETAIL_NILAI_WI';



  public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function insert_multiple($data){
		$insert=$this->db->insert_batch($this->_table, $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}
  public function updateData($where,$data){
		$this->db->where($where);
		$update=$this->db->update($this->_table,$data);
		if($update){
			return 'success';
		}else{
			return 'error';
		}
	}
}
?>

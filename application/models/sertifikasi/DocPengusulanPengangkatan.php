<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class DocPengusulanPengangkatan extends My_Model
{
	public $_table = 'document_pengusulan_pengangkatan';
	public $primary_key = 'PK_DOC_PENGUSULAN_PENGANGKATAN';

	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function updateData($where,$table,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}

  ?>

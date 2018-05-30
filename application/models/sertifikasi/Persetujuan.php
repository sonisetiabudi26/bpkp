<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class Persetujuan extends My_Model
{
	public $_table = 'list_persetujuan';
	public $primary_key = 'PK_PERSETUJUAN';


  public function save($data) {
		$insert=$this->db->insert("list_persetujuan", $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}


}

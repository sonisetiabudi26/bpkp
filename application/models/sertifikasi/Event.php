<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class Event extends My_Model
{
	public $_table = 'event';
	public $primary_key = 'PK_EVENT';

	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
  public function loadEvent(){
    $this->db->select('event.*,provinsi.Nama');
    $this->db->from($this->_table);
    $this->db->join('provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
    $query = $this->db->get();
  //	return $query->result();
      return $query->result();
  }
  public function remove($id){
    $this->db->where('PK_EVENT', $id);
    $this->db->delete($this->_table);
  }
}

  ?>

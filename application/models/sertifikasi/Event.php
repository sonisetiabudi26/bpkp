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
	public function saveByReturn($data) {
		$this->db->insert($this->_table, $data);
		$insert_id = $this->db->insert_id();
		 if($insert_id!=''){
			 	return  $insert_id;
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function getDataPKEvent($kodediklat,$provinsi){
		$condition = "KODE_DIKLAT =" . "'" . $kodediklat . "' and FK_PROVINSI =" . "'" . $provinsi . "' ";
		$this->db->select('PK_EVENT');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();

	//	return $query->result();
			return $query->row();
	}
  public function loadEvent(){
    $this->db->select('event.*,provinsi.Nama,jenjang.NAMA_JENJANG');
    $this->db->from($this->_table);
    $this->db->join('provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
		$this->db->join('jenjang', 'event.KODE_DIKLAT = jenjang.PK_JENJANG');
    $query = $this->db->get();
  //	return $query->result();
      return $query->result();
  }
	public function loadEventbyid($id){
		$condition = "jenjang.KODE_DIKLAT =" . "'" . $id . "'";
		$this->db->select('event.*,provinsi.Nama,jenjang.NAMA_JENJANG');
		$this->db->from($this->_table);
		$this->db->join('provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
		$this->db->join('jenjang', 'event.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		return $query = $this->db->get();

	}

  public function remove($id){
    $this->db->where('PK_EVENT', $id);
    $this->db->delete($this->_table);
  }
}

  ?>

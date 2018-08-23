<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class JadwalUjian extends My_Model
{
	public $_table = 'jadwal_ujian';
	public $primary_key = 'PK_JADWAL_UJIAN';


  public function _get_jadwal_information($datenow) {
		$condition = "start_date >" . "'" . $datenow . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
	   return $query->result();
	}
	public function getdatabyid($id) {
		$condition = "PK_JADWAL_UJIAN =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
	   return $query->result();
	}
	public function loadJadwal(){

		$this->db->select('*');
		$this->db->from($this->_table);
		$query = $this->db->get();
		return $query->result();
	}
	public function delete_by_id($id)
	 {
			 $this->db->where('PK_JADWAL_UJIAN', $id);
			 $this->db->delete($this->_table);
	 }
	 public function insert_multiple($data){
		 $insert=$this->db->insert("jadwal_ujian", $data);
 		 if($insert){
 			 	return  'Data Inserted Successfully';
 		 }else{
 			 return 'Data Inserted Failed';
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class Provinsi extends My_Model
{
	public $_table = 'provinsi';
	public $primary_key = 'PK_PROVINSI';


  public function _get_provinsi_information() {
		$this->db->select('NAMA,PK_PROVINSI');
		$this->db->from($this->_table);
		$query = $this->db->get();
	   return $query->result();
	}

	public function _getAll(){
		$this->db->select('*');
		$this->db->from($this->_table);
		$query = $this->db->get();
	   return $query->result();
	}
	public function getdataPK($pk){
		$condition = "NAMA = '" . $pk . "'";
		$this->db->select('PK_PROVINSI');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->row();
	}
}

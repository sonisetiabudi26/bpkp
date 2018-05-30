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


}

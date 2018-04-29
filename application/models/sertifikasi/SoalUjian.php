<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalUjian extends My_Model
{
	public $_table = 'soal_ujian';
	public $primary_key = 'PK_SOAL_UJIAN';
	
	public function view(){
		return $this->db->get($this->_table)->result();
	}
	
	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanSoal extends My_Model
{
	public $_table = 'permintaan_soal';
	public $primary_key = 'PK_PERMINTAAN_SOAL';
	
	public function view(){
		return $this->db->get($this->_table)->result();
	}
}

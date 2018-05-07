<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataAjar extends My_Model
{
	public $_table = 'mata_ajar';
	public $primary_key = 'PK_MATA_AJAR';
	
	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
}

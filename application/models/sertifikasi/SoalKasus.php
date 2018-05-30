<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalKasus extends My_Model
{
	public $_table = 'soal_kasus';
	public $primary_key = 'PK_SOAL_KASUS';
	
	public function view(){
		return $this->db->get($this->_table)->result();
	}
	
	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
	
	public function _get_soal_kasus_from_fk_bab_mata_ajar($fk_bab_mata_ajar)
	{
	    $query = $this->db->get_where($this->_table, array('FK_BAB_MATA_AJAR' => $fk_bab_mata_ajar));
	    return $query->result();
	}
}

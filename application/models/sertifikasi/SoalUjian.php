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
	
	public function _get_soal_ujian_from_mata_ajar($fk_bab_mata_ajar) {
	    $condition = "fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function _get_soal_ujian_from_pk($pk_soal_ujian)
	{
		$condition = $this->primary_key." = '" . $pk_soal_ujian . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
		$this->db->join('bab_mata_ajar', 'soal_ujian.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$this->db->join('mata_ajar', 'bab_mata_ajar.fk_mata_ajar = mata_ajar.pk_mata_ajar');
		$query = $this->db->get();
	    return $query->result();
	}
}

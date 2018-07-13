<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewSoal extends My_Model
{
	public $_table = 'review_soal';
	public $primary_key = 'PK_REVIEW_SOAL';
	
	public function _get_review_ujian_from_bab_mata_ajar($fk_bab_mata_ajar) {
	    $condition = "fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "' and flag=(
			select max(flag) from review_soal
		)";
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('lookup', 'review_soal.FK_LOOKUP_REVIEW_SOAL = lookup.PK_LOOKUP');
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->row();
	}
	
	public function _get_all_review_ujian() {
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('bab_mata_ajar', 'review_soal.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
		$this->db->join('lookup', 'review_soal.FK_LOOKUP_REVIEW_SOAL = lookup.PK_LOOKUP');
	    $query = $this->db->get();
	    return $query->result();
	}
}

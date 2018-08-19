<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BabMataAjar extends My_Model
{
	public $_table = 'bab_mata_ajar';
	public $primary_key = 'PK_BAB_MATA_AJAR';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
	public function getdataByID($ID){
		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
			$this->db->where('bab_mata_ajar.PK_BAB_MATA_AJAR', $ID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}

	}
	public function _get_bab_from_fk_mata_ajar_value($fk_mata_ajar){
		$condition= "FK_MATA_AJAR =" . "'" . $fk_mata_ajar . "'  group by soal_ujian.FK_BAB_MATA_AJAR";
		$this->db->select('*,count(soal_ujian.FK_BAB_MATA_AJAR)as jml_soal');
		$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
		$this->db->join('group_mata_ajar', 'group_mata_ajar.pk_group_mata_ajar = mata_ajar.fk_group_mata_ajar');
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
		$this->db->join('soal_ujian', 'bab_mata_ajar.PK_BAB_MATA_AJAR = soal_ujian.FK_BAB_MATA_AJAR');
		$this->db->where($condition);

		$query = $this->db->get();
			return $query->result();
	}
	public function _get_bab_from_fk_mata_ajar($fk_mata_ajar)
	{
		$this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
		$this->db->join('group_mata_ajar', 'group_mata_ajar.pk_group_mata_ajar = mata_ajar.fk_group_mata_ajar');
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
	    $this->db->where('FK_MATA_AJAR', $fk_mata_ajar);
		$query = $this->db->get();
	    return $query->result();
	}
	public function delete_by_id($id){
    $this->db->where('PK_BAB_MATA_AJAR', $id);
    $this->db->delete($this->_table);
  }

	public function _detail_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
		$this->db->join('group_mata_ajar', 'group_mata_ajar.pk_group_mata_ajar = mata_ajar.fk_group_mata_ajar');
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
		$query = $this->db->get();
	    return $query->result();
	}

	public function _review_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('permintaan_soal', 'permintaan_soal.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$query = $this->db->get();
	    return $query->result();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupMataAjar extends My_Model
{
	public $_table = 'jenjang';
	public $primary_key = 'PK_JENJANG';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}

	public function _detail_group_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
			$this->db->join('lookup', 'jenjang.fk_lookup_diklat = lookup.pk_lookup');
			$query = $this->db->get();
	    return $query->result();
	}

	public function _get_all_group_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
			$query = $this->db->get();
	    return $query->result();
	}
	public function loadbyuser($kode_diklat){
	   $condition = "jenjang.KODE_DIKLAT =" . "'" . $kode_diklat . "'";
		 $this->db->select('mata_ajar.NAMA_MATA_AJAR');
		 $this->db->from($this->_table);
		 $this->db->join('mata_ajar', 'jenjang.PK_JENJANG = mata_ajar.FK_JENJANG');
		 $this->db->where($condition);
		 $query = $this->db->get();
		 if ($query->num_rows() == 1) {
			 return $query->row();
		 } else {
			 return false;
		 }
	}
	public function _get_kodediklat_group_mata_ajar($kodediklat)
	{
		$condition = "KODE_DIKLAT =" . "'" . $kodediklat . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
    $this->db->where($condition);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}

}

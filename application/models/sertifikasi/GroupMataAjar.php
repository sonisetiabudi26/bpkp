<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupMataAjar extends My_Model
{
	public $_table = 'group_mata_ajar';
	public $primary_key = 'PK_GROUP_MATA_AJAR';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}

	public function _detail_group_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
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

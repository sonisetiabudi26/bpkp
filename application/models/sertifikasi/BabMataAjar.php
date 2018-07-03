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
}

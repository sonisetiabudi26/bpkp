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

	public function _detail_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
			$this->db->join('jenjang', 'jenjang.pk_jenjang = mata_ajar.fk_jenjang');
			$this->db->join('lookup', 'jenjang.fk_lookup_diklat = lookup.pk_lookup');
			$query = $this->db->get();
	    return $query->result();
	}

	public function _get_from_fk_group_mata_ajar($fk_mata_group_ajar)
	{
	    $query = $this->db->get_where($this->_table, array('KODE_DIKLAT' => $fk_mata_group_ajar));
	    return $query->result();
	}

	public function getkode_mataajar($param){
		$this->db->select('KODE_MATA_AJAR');
		$this->db->from($this->_table);
	  $this->db->where('PK_MATA_AJAR',$param);
		$query = $this->db->get();
		return $query->result();
	}
}

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
	    $query = $this->db->get_where($this->_table, array('FK_MATA_AJAR' => $fk_mata_ajar));
	    return $query->result();
	}
}

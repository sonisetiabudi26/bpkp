<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LookupUjian extends My_Model
{
	public $_table = 'lookup_ujian';
	public $primary_key = 'PK_LOOKUP_UJIAN';

	public function getdatabyuser($user) {
	    $condition = "lookup_group = '" . $lookup_group . "' and code = '" . $code . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->row();
	}
}

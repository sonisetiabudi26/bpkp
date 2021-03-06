<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lookup extends My_Model
{
	public $_table = 'lookup';
	public $primary_key = 'PK_LOOKUP';

	public function _get_lookup_from_lookupgroup_and_code($lookup_group, $code) {
	    $condition = "lookup_group = '" . $lookup_group . "' and code = '" . $code . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->row();
	}

	public function _get_lookup_api_from_userdescr($descr) {
	    $condition = "descr like '" . $descr . "|%' and is_active = 1";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->row();
	}

	public function _get_lookup_bank_soal() {
	    $condition = "lookup_group = 'USER_ROLE' and code = 'BANK_SOAL'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function _get_lookup_from_lookupgroup($lookup_group) {
	    $condition = "lookup_group = '" . $lookup_group . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}
	public function _get_user_bridge_api($roleid){
		$condition = "rolegroupid ='" . $roleid . "'";
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->join('bridge_lookup', 'bridge_lookup.pk_lookup = lookup.pk_lookup');
			$this->db->where($condition);
			$query = $this->db->get();
				return $query->result();
	}
}

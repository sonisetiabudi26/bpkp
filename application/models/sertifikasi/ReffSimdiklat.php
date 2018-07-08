<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class ReffSimdiklat extends My_Model
{
	public $_table = 'reff_simdiklat';


	public function _checkDiklat($kodediklat){
    $condition = "KodeJenisDiklat =" . "'" . $kodediklat . "'";
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

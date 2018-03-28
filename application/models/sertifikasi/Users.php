<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends My_Model
{
	public $_table = 'users';
	public $primary_key = 'PK_USER';

	// Read data using username and password
	public function _check_login($data) {
		$condition = "USER_NAME =" . "'" . $data['username'] . "' AND " . "USER_PASSWORD =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function _get_user_information($username) {
		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}

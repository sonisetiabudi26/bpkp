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

	public function _get_user_bank_soal() {
		$condition = "fk_lookup_role in (18,19,20,21,22)";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function _get_user_bank_soal_join($role) {
		$condition = "fk_lookup_role =" . "'" . $role . "'";
		$this->db->select('users.*,lookup.DESCR');
		$this->db->from($this->_table);
		$this->db->join('lookup', 'users.FK_LOOKUP_ROLE = lookup.PK_LOOKUP');
		$this->db->where($condition);
		$query = $this->db->get();
			return $query->result();

	}
	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function delete_by_id($id){
		$this->db->where('PK_USER', $id);
    $this->db->delete($this->_table);
	}
}

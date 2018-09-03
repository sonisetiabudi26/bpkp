<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model
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
public function loaddataWidyaiswarauser(){
	$condition = "FK_LOOKUP_ROLE =4";
	$this->db->select('*');
	$this->db->from($this->_table);
	$this->db->where($condition);
	$query = $this->db->get();

		return $query->result();

}
public function loaddataWidyaiswarauserbyid($id){
	$condition = "users.PK_USER =" . "'" . $id . "'";
	$this->db->select('widyaiswara_nilai.NIP,detail_nilai_wi.NILAI_1,detail_nilai_wi.NILAI_2,widyaiswara_nilai.NAMA,mata_ajar.NAMA_MATA_AJAR,widyaiswara_nilai.TGL_RELEASE_MATA_AJAR');
	$this->db->from($this->_table);
	$this->db->join('widyaiswara_nilai', 'users.PK_USER = widyaiswara_nilai.NIP_INSTRUKTUR');
	$this->db->join('detail_nilai_wi', 'widyaiswara_nilai.PK_WIDYAISWARA_NILAI =  detail_nilai_wi.FK_WIDYAISWARA_NILAI');
	$this->db->join('mata_ajar', 'widyaiswara_nilai.FK_MATA_AJAR =  mata_ajar.PK_MATA_AJAR');
	$this->db->where($condition);
	$query = $this->db->get();

		return $query->result();

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
	public function check_validator(){
		$condition = "fk_lookup_role =" . "'" . 28 . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
			return $query->result();
	}
}

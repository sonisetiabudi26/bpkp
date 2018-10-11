<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class DocPengusulanPengangkatan extends My_Model
{
	public $_table = 'document_pengusulan_pengangkatan';
	public $primary_key = 'PK_DOC_PENGUSULAN_PENGANGKATAN';

	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function delete_by_id($id){
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->_table);
	}
	public function updateData($where,$table,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function loaddoc($param,$cat){
		$condition = "document_pengusulan_pengangkatan.fk_pengusul_pengangkatan =" . "'" . $param . "' and detail_pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $cat . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('detail_pengusul_pengangkatan', 'document_pengusulan_pengangkatan.DOC_PENGUSULAN_PENGANGKATAN = detail_pengusul_pengangkatan.FILE_URUT');
		$this->db->where($condition);
		$query = $this->db->get();
	//	return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
	public function NumrowDoc($id,$desc){
		$condition = "FK_PENGUSUL_PENGANGKATAN =" . "'" . $id . "' AND " . "CATEGORY_DOC =" . "'" . $desc . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return "0";
		}
	}

	public function loaddocbypk($param){
		$condition = " pk_doc_pengusulan_pengangkatan =" . "'" . $param . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
	//	return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
}

  ?>

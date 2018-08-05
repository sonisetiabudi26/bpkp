<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class PengusulPengangkatan extends My_Model
{
	public $_table = 'pengusul_pengangkatan';
	public $primary_key = 'PK_PENGUSUL_PENGANGKATAN';


  public function _get_list_status() {
		$this->db->select('*');
		$this->db->from('status_pengusulan_pengangkatan');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function save($data) {
		$insert=$this->db->insert("pengusul_pengangkatan", $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function updateData($where,$table,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function numrowcategory($nip){
		$condition = "CREATED_AT =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "' group by FK_STATUS_PENGUSUL_PENGANGKATAN";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return "no data";
		}
	}
	public function numrowpeserta($nip){
		$condition = "CREATED_AT =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return "no data";
		}
	}
	public function load($userAdmin){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=1 and pengusul_pengangkatan.CREATED_AT =" . "'" . $userAdmin . "' group by pengusul_pengangkatan.NIP";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->where($condition);
		$query = $this->db->get();
	//	return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
	public function loadData(){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=" . "'" . 2 . "' group by pengusul_pengangkatan.CREATED_AT";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS,document_pengusulan_pengangkatan.validator');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->join('document_pengusulan_pengangkatan', 'pengusul_pengangkatan.CREATED_AT = document_pengusulan_pengangkatan.CREATED_AT');
		$this->db->where($condition);
		$query = $this->db->get();
	//	return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
 public function remove($id){
	 $this->db->where('PK_PENGUSUL_PENGANGKATAN', $id);
   $this->db->delete('pengusul_pengangkatan');

 }
}

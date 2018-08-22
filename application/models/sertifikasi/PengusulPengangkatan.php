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
	public function detail_data($nosurat){
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC');
		$this->db->from('pengusul_pengangkatan');
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->where('pengusul_pengangkatan.NO_SURAT',$nosurat);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'error_sql';
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
		$condition = "CREATED_BY =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "' group by FK_STATUS_PENGUSUL_PENGANGKATAN";
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
	public function datalistValidator($user,$doc){
		$condition = "pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $doc . "' and pengusul_pengangkatan.VALIDATOR =" . "'" . $user . "' group by pengusul_pengangkatan.UNITKERJA";
		$this->db->select('pengusul_pengangkatan.*');
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
	public function numrowpeserta($nip){
		$condition = "CREATED_BY =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "'";
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
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC!=5 and pengusul_pengangkatan.NO_SURAT='' and pengusul_pengangkatan.CREATED_BY =" . "'" . $userAdmin . "' group by pengusul_pengangkatan.NIP";
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
	public function total_pengusul($param){
		$condition = "NO_SURAT=" . "'" . $param . "'";
		$this->db->select('*');
		$this->db->from('total_pengusul');
		$this->db->where($condition);
		$query = $this->db->get();

			return $query->row();
	}
	public function total_pengusul_by_id($param){
		$condition = "PK_PERTEK=" . "'" . $param . "'";
		$this->db->select('*');
		$this->db->from('total_pengusul');
		$this->db->where($condition);
		$query = $this->db->get();

			return $query->row();
	}
	public function loadValidasi($userAdmin,$doc,$unit){
		$condition = " pengusul_pengangkatan.CREATED_BY=" . "'" . $unit . "' and pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $doc . "' and pengusul_pengangkatan.VALIDATOR =" . "'" . $userAdmin . "' group by pengusul_pengangkatan.NIP";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->where($condition);
		$query = $this->db->get();
	//	return $query->result();

			return $query->result();

	}

	public function loadResultDatabyID($id){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=2 and pengusul_pengangkatan.PK_PENGUSUL_PENGANGKATAN=" . "'" . $id . "' group by pengusul_pengangkatan.NIP";
		$this->db->select('RESULT');
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
	public function loadData(){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=" . "'" . 2 . "' group by pengusul_pengangkatan.CREATED_BY";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS,pengusul_pengangkatan.validator');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->join('document_pengusulan_pengangkatan', 'pengusul_pengangkatan.CREATED_BY = document_pengusulan_pengangkatan.CREATED_BY');
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

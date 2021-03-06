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
	public function getFormatbynip($nip){

	}
 public function getFormatDocument_belumlengkap($desc,$id,$nip){
	 $this->db->select('document_pengusulan_pengangkatan.DOC_PENGUSULAN_PENGANGKATAN');
	 $this->db->from('document_pengusulan_pengangkatan');
	 $this->db->where('document_pengusulan_pengangkatan.FK_PENGUSUL_PENGANGKATAN',$desc);
	 $query = $this->db->get();

	 $ignore=$query->result();
	 $ignores= array();
	  foreach($ignore as $row){
	     $ignores[] = $row->DOC_PENGUSULAN_PENGANGKATAN;
	   }
	 $convert_data = implode(",",$ignores);
   $ignore_data = explode(",", $convert_data);

	 $condition = "detail_pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $id . "' ";
	 $this->db->select('detail_pengusul_pengangkatan.*');
	 $this->db->from('detail_pengusul_pengangkatan');
	 $this->db->join('document_pengusulan_pengangkatan', 'detail_pengusul_pengangkatan.FILE_URUT = document_pengusulan_pengangkatan.DOC_PENGUSULAN_PENGANGKATAN','left');
	 $this->db->join('pengusul_pengangkatan', 'document_pengusulan_pengangkatan.FK_PENGUSUL_PENGANGKATAN = pengusul_pengangkatan.PK_PENGUSUL_PENGANGKATAN');
	 $this->db->where($condition);
	 $this->db->where_not_in('document_pengusulan_pengangkatan.DOC_PENGUSULAN_PENGANGKATAN', $ignore_data);

	 $query = $this->db->get();
	 if ($query->num_rows() > 0) {
		 return $query->result();
	 } else {
		 return 'error_sql';
	 }
 }
	public function getFormatDocument($id){
		$this->db->select('detail_pengusul_pengangkatan.*');
		$this->db->from('detail_pengusul_pengangkatan');
		$this->db->where('detail_pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'error_sql';
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
		$update=$this->db->update($table,$data);
		if($update){
			return 'success';
		}else{
			return 'error';
		}
	}

	public function numrowcategory($nip){
		$condition = "CREATED_BY =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "' and validator='' group by FK_STATUS_PENGUSUL_PENGANGKATAN";
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
		$condition = "CREATED_BY =" . "'" . $nip . "' AND " . "FK_STATUS_DOC =" . "'" . 2 . "' and validator=''";
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
		return $query = $this->db->get();
	//	return $query->result();
		// if ($query->num_rows() > 0) {
		// 	return $query->result();
		// } else {
		// 	return "no data";
		// }
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
		$condition = " pengusul_pengangkatan.CREATED_BY=" . "'" . $unit . "' and pengusul_pengangkatan.FK_STATUS_DOC='2'  and pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $doc . "' and pengusul_pengangkatan.VALIDATOR =" . "'" . $userAdmin . "' group by pengusul_pengangkatan.NIP";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS,detail_pertek.DOC_PERTEK');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->join('pertek', 'pengusul_pengangkatan.NO_SURAT = pertek.NO_SURAT');
		$this->db->join('detail_pertek', 'pertek.PK_PERTEK = detail_pertek.FK_PERTEK','left');
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
	public function loadbelumlengkap($userAdmin){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC!=2 and pengusul_pengangkatan.NO_SURAT!='' and pengusul_pengangkatan.CREATED_BY =" . "'" . $userAdmin . "' group by pengusul_pengangkatan.NIP";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->where($condition);
		return $query = $this->db->get();

	}
	public function loaddataResi($userAdmin){
		$condition = "pertek.NO_RESI!='' and pertek.NO_SURAT!='' and pengusul_pengangkatan.CREATED_BY =" . "'" . $userAdmin . "' group by pertek.NO_SURAT";
		$this->db->select('pertek.*');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('pertek', 'pengusul_pengangkatan.NO_SURAT = pertek.NO_SURAT');
		$this->db->where($condition);
		return $query = $this->db->get();
	//	return $query->result();

	}
	public function loadData(){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=" . "'" . 2 . "' and pengusul_pengangkatan.validator='' group by pengusul_pengangkatan.CREATED_BY";
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
	public function loadDataPengusulan($status,$nip){
		$condition = "pengusul_pengangkatan.FK_STATUS_DOC=" . "'" . 2 . "' and pengusul_pengangkatan.CREATED_BY=" . "'" . $nip . "' and pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN=" . "'" . $status . "'  group by pengusul_pengangkatan.CREATED_BY";
		$this->db->select('pengusul_pengangkatan.*,status_pengusulan_pengangkatan.DESC,status_doc.DESC_STATUS,pengusul_pengangkatan.validator');
		$this->db->from($this->_table);
		$this->db->join('status_pengusulan_pengangkatan', 'pengusul_pengangkatan.FK_STATUS_PENGUSUL_PENGANGKATAN = status_pengusulan_pengangkatan.PK_STATUS_PENGUSUL_PENGANGKATAN');
		$this->db->join('status_doc', 'pengusul_pengangkatan.FK_STATUS_DOC = status_doc.PK_STATUS_DOC');
		$this->db->join('document_pengusulan_pengangkatan', 'pengusul_pengangkatan.CREATED_BY = document_pengusulan_pengangkatan.CREATED_BY');
		$this->db->where($condition);
		return $query = $this->db->get();
	//	return $query->result();

	}
 public function remove($id){
	 $this->db->where('PK_PENGUSUL_PENGANGKATAN', $id);
   $this->db->delete('pengusul_pengangkatan');

 }
}

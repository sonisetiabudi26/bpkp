<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widyaiswara extends My_Model
{
	public $_table = 'widyaiswara_nilai';
	public $primary_key = 'PK_WIDYAISWARA_NILAI';



  public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function insert_multiple($data){
		$insert=$this->db->insert_batch($this->_table, $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}
	public function update($id,$data) {
		$this->db->where('PK_WIDYAISWARA_NILAI',$id);
	  $insert=$this->db->update($this->_table, $data);
		 if($insert){
			 	return  'Data Updated Successfully';
		 }else{
			 return 'Data Updated Failed';
		 }
	}
	public function save_nilai_wi($data){
		$insert=$this->db->insert('detail_nilai_wi', $data);
		 if($insert){
				return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function getdatabynip($nip){
		$condition = "users.USER_NAME=" . "'" . $nip . "' and detail_nilai_wi.flag='0' group by widyaiswara_nilai.PK_WIDYAISWARA_NILAI";
		$this->db->select('detail_nilai_wi.PK_DETAIL_NILAI_WI,widyaiswara_nilai.*,users.USER_NAME,mata_ajar.NAMA_MATA_AJAR,round(AVG(detail_nilai_wi.NILAI_1))as NILAI_1,round(AVG(detail_nilai_wi.NILAI_2))as NILAI_2');
		$this->db->from($this->_table);
		$this->db->join('users','widyaiswara_nilai.NIP_INSTRUKTUR=users.PK_USER');
		$this->db->join('mata_ajar','widyaiswara_nilai.FK_MATA_AJAR=mata_ajar.PK_MATA_AJAR');
		$this->db->join('detail_nilai_wi','widyaiswara_nilai.PK_WIDYAISWARA_NILAI=detail_nilai_wi.FK_WIDYAISWARA_NILAI');
		$this->db->where($condition);
		$query = $this->db->get();
		// if ($query->num_rows() > 0) {
			return $query->result();
		// } else {
		// 	return 'nodata';
		// }
	}
	public function updateDataNilai($where,$table,$data){
		$this->db->where($where);
		$update=$this->db->update($table,$data);
		if($update){
			return 'success';
		}else{
			return 'error';
		}
	}

	public function getdatabynipifnull($nip){
		$condition = "users.USER_NAME=" . "'" . $nip . "' and widyaiswara_nilai.flag='0' group by widyaiswara_nilai.PK_WIDYAISWARA_NILAI";
		$this->db->select('widyaiswara_nilai.*,users.USER_NAME,mata_ajar.NAMA_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('users','widyaiswara_nilai.NIP_INSTRUKTUR=users.PK_USER');
		$this->db->join('mata_ajar','widyaiswara_nilai.FK_MATA_AJAR=mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		// if ($query->num_rows() > 0) {
			return $query->result();
		// } else {
		// 	return 'nodata';
		// }
	}
	public function updateData($where,$data){
		$this->db->where($where);
		$update=$this->db->update($this->_table,$data);
		if($update){
			return $update;
		}else{
			return 'error';
		}
	}
  public function loadNilai($nip,$tgl,$mataajar,$instruktur){
    $condition = "NIP =" . "'" . $nip . "' and TGL_RELEASE_MATA_AJAR=" . "'" . $tgl . "' and MATA_AJAR=" . "'" . $mataajar . "' and NIP_INSTRUKTUR=" . "'" . $instruktur . "'";
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return 'nodata';
    }
  }
}

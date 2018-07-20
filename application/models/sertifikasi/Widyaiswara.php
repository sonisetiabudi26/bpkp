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
	public function update($id,$data) {
		$this->db->where('PK_WIDYAISWARA_NILAI',$id);
	  $insert=$this->db->update($this->_table, $data);
		 if($insert){
			 	return  'Data Updated Successfully';
		 }else{
			 return 'Data Updated Failed';
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

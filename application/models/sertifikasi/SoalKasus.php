<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalKasus extends My_Model
{
	public $_table = 'soal_kasus';
	public $primary_key = 'PK_SOAL_KASUS';

	public function view(){
		return $this->db->get($this->_table)->result();
	}

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}

	public function _get_soal_kasus_from_fk_bab_mata_ajar($fk_bab_mata_ajar)
	{
	    $query = $this->db->get_where($this->_table, array('FK_BAB_MATA_AJAR' => $fk_bab_mata_ajar));
	    return $query->result();
	}
 public function getdataby($pk){
	 $this->db->select('mata_ajar.NAMA_MATA_AJAR,bab_mata_ajar.NAMA_BAB_MATA_AJAR,soal_kasus.*');
	 $this->db->from($this->_table);
	 $this->db->join('bab_mata_ajar', 'soal_kasus.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
	 $this->db->join('mata_ajar', 'bab_mata_ajar.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
	 $this->db->where("soal_kasus.PK_SOAL_KASUS= '" . $pk . "' ");
	 $query = $this->db->get();
		 return $query->result();
 }
	public function view_detail(){
		$this->db->select('mata_ajar.NAMA_MATA_AJAR,bab_mata_ajar.NAMA_BAB_MATA_AJAR,soal_kasus.*');
		$this->db->from($this->_table);
		$this->db->join('bab_mata_ajar', 'soal_kasus.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
		$this->db->join('mata_ajar', 'bab_mata_ajar.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$query = $this->db->get();
			return $query->result();
}
public function delete_by_id($id){
	$this->db->where($this->primary_key, $id);
	$this->db->delete($this->_table);
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
}

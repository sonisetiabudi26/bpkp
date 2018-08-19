<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KodeSoal extends My_Model
{
	public $_table = 'kode_soal';
	public $primary_key = 'PK_KODE_SOAL';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
	public function getdataByID($ID){
		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
			$this->db->where('bab_mata_ajar.PK_BAB_MATA_AJAR', $ID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
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
	public function total_soal($id){
		$this->db->select('KODE_SOAL,sum(KEBUTUHAN_SOAL)as kebutuhan_soal,sum(total_soal)as total_soal,FK_BAB_MATA_AJAR');
			$this->db->from('total_soal_distribusi');
			$this->db->where('kode_soal', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}
	}
	public function get_data_by_id_soal($id){

		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = kode_soal.FK_MATA_AJAR');
			$this->db->where('kode_soal.PK_KODE_SOAL', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}
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
    $this->db->where('PK_KODE_SOAL', $id);
    $this->db->delete($this->_table);
  }
	public function view()
	{
		$this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$query = $this->db->get();
	    return $query->result();
	}
	public function view_cond()
	{
		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');

		$query = $this->db->get();
			return $query->result();
	}

	public function _detail_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
		$this->db->join('group_mata_ajar', 'group_mata_ajar.pk_group_mata_ajar = mata_ajar.fk_group_mata_ajar');
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
		$query = $this->db->get();
	    return $query->result();
	}

	public function _review_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('permintaan_soal', 'permintaan_soal.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$query = $this->db->get();
	    return $query->result();
	}
}

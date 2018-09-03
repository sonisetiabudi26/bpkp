<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPermintaanSoal extends My_Model
{
	public $_table = 'detail_permintaan_soal';
	public $primary_key = 'PK_DETAIL_PERMINTAAN_SOAL';
  //ar $column_search = array('TIPE_SOAL','FK_BAB_MATA_AJAR','NAMA_BAB_MATA_AJAR','TANGGAL_PERMINTAAN');
	public function view(){
		return $this->db->get($this->_table)->result();
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
	public function getcomment($id){
		$condition = " FK_PERMINTAAN_SOAL =" . "'" . $id . "' AND TUGAS!='pembuat_soal' AND permintaan_soal.flag=1";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('permintaan_soal','detail_permintaan_soal.FK_PERMINTAAN_SOAL=permintaan_soal.PK_PERMINTAAN_SOAL');
		$this->db->where($condition);
		$query = $this->db->get();
		// return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
}

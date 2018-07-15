<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JawabanPeserta extends My_Model
{
	public $_table = 'jawaban_peserta';
	public $primary_key = 'PK_JAWABAN';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
public function getALl($kodeevent,$kelas){
  $condition = "FK_KODE_EVENT =" . "'" . $kodeevent . "' AND " . "KELAS =" . "'" . $kelas . "'";
  $this->db->select('*');
  $this->db->from($this->_table);
  $this->db->where($condition);
  $query = $this->db->get();
	return $query->result();

}
public function NumrowPeserta($kodeevent,$kelas){
	$condition = "FK_KODE_EVENT =" . "'" . $kodeevent . "' AND " . "KELAS =" . "'" . $kelas . "'";
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

}?>

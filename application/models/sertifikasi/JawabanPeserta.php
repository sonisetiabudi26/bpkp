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
public function get_data_all_by_event($kodeevent,$kelas){
	$condition = "FK_KODE_EVENT =" . "'" . $kodeevent . "' AND " . "KELAS =" . "'" . $kelas . "'";
	$this->db->select('*');
	$this->db->from($this->_table);
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->result();
	} else {
		return "no data";
	}
}
public function get_data_all_by_numrows($kodesoal,$kelas){
	$condition = "KODE_SOAL =" . "'" . $kodesoal . "'";
	$this->db->select('*');
	$this->db->from('soal_distribusi');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->num_rows();
	} else {
		return "0";
	}
}
public function calculate($kodesoal,$jawaban,$no_soal){
	// soal_distribusi b on a.KODE_SOAL=b.KODE_SOAL inner join soal_ujian c on b.FK_SOAL_UJIAN=c.PK_SOAL_UJIAN
	if($jawaban=='A'){
		$jawaban="1";
	}elseif($jawaban=='B'){
		$jawaban="2";
	}elseif($jawaban=='C'){
		$jawaban="3";
	}elseif($jawaban=='D'){
		$jawaban="4";
	}elseif($jawaban=='E'){
		$jawaban="5";
	}elseif($jawaban=='F'){
		$jawaban="6";
	}elseif($jawaban=='G'){
		$jawaban="7";
	}elseif($jawaban=='H'){
		$jawaban="8";
	}
	$condition = "soal_distribusi.KODE_SOAL =" . "'" . $kodesoal . "' AND " . "soal_ujian.JAWABAN =" . "'" . $jawaban . "' AND " . "soal_distribusi.NO_UJIAN =" . "'" . $no_soal . "'";
	$this->db->select('soal_distribusi.FK_SOAL_UJIAN,soal_distribusi.NO_UJIAN,soal_ujian.JAWABAN');
	$this->db->from("soal_distribusi");
	$this->db->join('soal_ujian', 'soal_distribusi.FK_SOAL_UJIAN = soal_ujian.PK_SOAL_UJIAN');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return "benar";
	} else {
		return "salah";
	}
}
public function updateData($where,$table,$data){
	$this->db->where($where);
	$this->db->update($table,$data);
}
public function getUnit(){
	// $condition = "";
	$this->db->select('*');
	$this->db->from($this->_table);
	$this->db->group_by('KODE_UNIT'); 
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->result();
	} else {
		return "no data";
	}
}
}?>

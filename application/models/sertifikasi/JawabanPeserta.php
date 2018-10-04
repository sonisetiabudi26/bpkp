<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JawabanPeserta extends My_Model
{
	public $_table = 'jawaban_peserta';
	public $primary_key = 'PK_JAWABAN';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$insert=$this->db->insert_batch('detail_jawaban_peserta', $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}
	public function checkpinujian($nip,$fk_event,$fk_mata_ajar){
		$condition = "FK_EVENT =" . "'" . $fk_event . "' AND KODE_PESERTA =" . "'" . $nip . "' and PIN!=''";
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
	public function getPin($id){
		$condition = "PK_JAWABAN_DETAIL =" . "'" . $id . "'  and PIN!='' and flag='1'";
		$this->db->select('jawaban_peserta.*,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'jawaban_peserta.KODE_PESERTA = registrasi_ujian.NIP');
		$this->db->join('dokumen_registrasi_ujian', 'dokumen_registrasi_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return "no data";
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
	public function addSoal($data){
		$insert=$this->db->insert("jawaban_peserta", $data);
		$insert_id = $this->db->insert_id();
		 if($insert){
				return  $insert_id;
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
public function getALl($kodeevent,$kelas){
  $condition = "event.KODE_EVENT =" . "'" . $kodeevent . "' AND jawaban_peserta.KELAS =" . "'" . $kelas . "'";
  $this->db->select('jawaban_peserta.*,jenjang.NAMA_JENJANG');
  $this->db->from($this->_table);
	$this->db->join('event', 'jawaban_peserta.FK_EVENT = event.PK_EVENT');
	$this->db->join('jenjang', 'event.KODE_DIKLAT = jenjang.KODE_DIKLAT');
  $this->db->where($condition);
  $query = $this->db->get();
	return $query->result();

}
public function getALlbyUnit($kodeevent,$kode_unit){
  $condition = "FK_EVENT =" . "'" . $kodeevent . "' AND " . "KODE_UNIT =" . "'" . $kode_unit . "'";
  $this->db->select('jawaban_peserta.*,lookup_ujian.NILAI_TOTAL as nilai,lookup_ujian.STATUS,jenjang.NAMA_JENJANG,registrasi_ujian.NAMA,mata_ajar.NAMA_MATA_AJAR');
  $this->db->from($this->_table);
	$this->db->join('lookup_ujian', 'jawaban_peserta.PK_JAWABAN_DETAIL = lookup_ujian.FK_JAWABAN_DETAIL');
	$this->db->join('event', 'jawaban_peserta.FK_EVENT = event.PK_EVENT');
	$this->db->join('jenjang', 'event.KODE_DIKLAT = jenjang.KODE_DIKLAT');
	$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
	$this->db->join('registrasi_ujian', 'jawaban_peserta.KODE_PESERTA = registrasi_ujian.NIP');
  $this->db->where($condition);
  $query = $this->db->get();
	return $query->result();

}
public function NumrowPeserta($kodeevent,$kelas){
	$condition = "FK_EVENT =" . "'" . $kodeevent . "' AND " . "KELAS =" . "'" . $kelas . "'";
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
	$condition = "jawaban_peserta.FK_EVENT =" . "'" . $kodeevent . "' AND " . "jawaban_peserta.KELAS =" . "'" . $kelas . "'";
	$this->db->select('jawaban_peserta.*,kode_soal.FK_MATA_AJAR,detail_jawaban_peserta.*');
	$this->db->from($this->_table);
	$this->db->join('kode_soal', 'jawaban_peserta.KODE_SOAL = kode_soal.KODE_SOAL');
	$this->db->join('detail_jawaban_peserta', 'jawaban_peserta.PK_JAWABAN_DETAIL = detail_jawaban_peserta.FK_JAWABAN_DETAIL');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->result();
	} else {
		return "no data";
	}
}
public function getDataJawaban($fk_jawaban_detail){
$condition = "FK_JAWABAN_DETAIL =" . "'" . $fk_jawaban_detail . "'";
	$this->db->select('NO_UJIAN,JAWABAN');
	$this->db->from('detail_jawaban_peserta');
	$this->db->where($condition);
	$query = $this->db->get();

		return $query->result();
}
public function get_data_all_by_numrows($kodesoal,$kelas){
	$condition = "kode_soal.KODE_SOAL =" . "'" . $kodesoal . "'";
	$this->db->select('soal_distribusi.*,kode_soal.KODE_SOAL');
	$this->db->from('soal_distribusi');
	$this->db->join('kode_soal', 'soal_distribusi.FK_KODE_SOAL = kode_soal.PK_KODE_SOAL');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->num_rows();
	} else {
		return "0";
	}
}
public function getnoujian($kodesoal){
	$condition = "kode_soal.KODE_SOAL =" . "'" . $kodesoal . "'";
	$this->db->select('max(soal_distribusi.NO_UJIAN)as soal_ujian');
	$this->db->from('soal_distribusi');
	$this->db->join('kode_soal', 'soal_distribusi.FK_KODE_SOAL = kode_soal.PK_KODE_SOAL');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->result();
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
	$condition = "kode_soal.KODE_SOAL =" . "'" . $kodesoal . "' AND soal_distribusi.JAWABAN =" . "'" . $jawaban . "' AND soal_distribusi.NO_UJIAN=" . "'" . $no_soal . "'  ";
	$this->db->select('soal_distribusi.FK_SOAL_UJIAN,soal_distribusi.JAWABAN,kode_soal.KODE_SOAL');
	$this->db->from("soal_distribusi");
	$this->db->join('kode_soal', 'soal_distribusi.FK_KODE_SOAL = kode_soal.PK_KODE_SOAL');
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
	$condition = "lookup_ujian.flag ='0' group by jawaban_peserta.KODE_UNIT";
	$this->db->select('jawaban_peserta.*,jenjang.NAMA_JENJANG');
	$this->db->from($this->_table);
	$this->db->join('lookup_ujian', 'jawaban_peserta.PK_JAWABAN_DETAIL = lookup_ujian.FK_JAWABAN_DETAIL');
	$this->db->join('event', 'jawaban_peserta.FK_EVENT = event.PK_EVENT');
	$this->db->join('jenjang', 'event.KODE_DIKLAT = jenjang.KODE_DIKLAT');
	$this->db->where($condition);
	// $this->db->group_by('KODE_UNIT');
	$query = $this->db->get();

	return $query->result();

}
public function getPesertabyUnit($id_unit,$id_event){
	$condition = "KODE_UNIT =" . "'" . $id_unit . "' AND " . "FK_EVENT =" . "'" . $id_event . "'";
	$this->db->select('*');
	$this->db->from($this->_table);
	$this->db->where($condition);
	//$this->db->group_by('KODE_UNIT');
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
	  return $query->num_rows();
	} else {
		return "no data";
	}
}
}?>

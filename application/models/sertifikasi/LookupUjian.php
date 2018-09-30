<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LookupUjian extends My_Model
{
	public $_table = 'lookup_ujian';
	public $primary_key = 'PK_LOOKUP_UJIAN';

	public function getdatabyuser($user) {
	    $condition = "lookup_group = '" . $lookup_group . "' and code = '" . $code . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->row();
	}
	public function insert_multiple($data){
		$insert=$this->db->insert_batch('lookup_ujian', $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}
	public function insert_multiple_sertifikat($data){
		$insert=$this->db->insert_batch('detail_sertifikat', $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}
	public function getDataDetailKebutuhan($pk){
		$condition = "lookup_ujian.FK_MATA_AJAR ='" . $pk . "' and lookup_ujian.flag='0' group by provinsi.NAMA";
		$this->db->select('provinsi.NAMA,count(lookup_ujian.PK_LOOKUP_REGIS)as jml_soal');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'registrasi_ujian.PK_REGIS_UJIAN= lookup_ujian.FK_REGIS_UJIAN');
		$this->db->join('provinsi', 'registrasi_ujian.LOKASI_UJIAN= provinsi.PK_PROVINSI');
		$this->db->where($condition);
		$query = $this->db->get();
			return $query->result();
	}
	public function getjumlahdata($pk){
		$condition = "lookup_ujian.FK_MATA_AJAR ='" . $pk . "' and lookup_ujian.flag=0";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function saveSertifikat($data){
		$insert=$this->db->insert('sertifikat', $data);
		$insert_id = $this->db->insert_id();
		if($insert){
			 return  $insert_id;
		}else{
			return 'Data Inserted Failed';
		}
	}
	public function saveNilaiSertifikat(){
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function getDataNilaisertifikat($id){
		$condition = "sertifikat.FK_REGIS_UJIAN ='" . $id . "'";
		$this->db->select('detail_sertifikat.NILAI,mata_ajar.NAMA_MATA_AJAR');
		$this->db->from('detail_sertifikat');
		$this->db->join('sertifikat', 'detail_sertifikat.FK_SERTIFIKAT = sertifikat.PK_SERTIFIKAT');
		$this->db->join('mata_ajar', 'detail_sertifikat.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDataNilaibyunitapip($id){
		$condition = "lookup_ujian.CREATED_BY ='" . $id . "'";
		$this->db->select('lookup_ujian.*,mata_ajar.NAMA_MATA_AJAR,registrasi_ujian.NIP');
		$this->db->from('lookup_ujian');
		$this->db->join('registrasi_ujian', 'registrasi_ujian.PK_REGIS_UJIAN= lookup_ujian.FK_REGIS_UJIAN');
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDataidentitasSertifikat($id){
		$condition = "sertifikat.FK_REGIS_UJIAN ='" . $id . "'";
		$this->db->select('sertifikat.*,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA,jenjang.NAMA_JENJANG,registrasi_ujian.NIP');
		$this->db->from('sertifikat');
		$this->db->join('registrasi_ujian', 'sertifikat.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->join('dokumen_registrasi_ujian', 'sertifikat.FK_REGIS_UJIAN = dokumen_registrasi_ujian.FK_REGIS_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDataNilai($id){
		$condition = "lookup_ujian.FK_REGIS_UJIAN ='" . $id . "' and lookup_ujian.flag=1";
		$this->db->select('lookup_ujian.*,mata_ajar.NAMA_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getdatasertifikat($id){
		$this->db->select('MAX(FK_REGIS_UJIAN) as kodex');
		$this->db->from('sertifikat');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'false';
		}
	}
	public function checkdatasertifikat($id){
		$condition = "FK_REGIS_UJIAN ='" . $id . "' ";
		$this->db->select('MAX(FK_REGIS_UJIAN) as kodex');
		$this->db->from('sertifikat');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'false';
		}
	}
	public function checkpinujian($fk_regis,$fk_mata_ajar){
		$condition = "FK_REGIS_UJIAN =" . "'" . $fk_regis . "' AND FK_MATA_AJAR =" . "'" . $fk_mata_ajar . "' and flag='0' and FK_JAWABAN_DETAIL!='0'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return "no data";
		}
	}
	public function getdatastatus($id){
		$condition = "registrasi_ujian.PK_REGIS_UJIAN ='" . $id . "'";
		$this->db->select('jenjang.NAMA_JENJANG as nama');
		$this->db->from('registrasi_ujian');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
	public function get_data($nip){
		$condition = "registrasi_ujian.NIP ='" . $nip . "' and lookup_ujian.flag=0";
		$this->db->select('lookup_ujian.*,jenjang.NAMA_JENJANG,registrasi_ujian.FK_JADWAL_UJIAN,registrasi_ujian.PK_REGIS_UJIAN,registrasi_ujian.NIP,registrasi_ujian.KODE_DIKLAT,registrasi_ujian.PROVINSI,mata_ajar.NAMA_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'lookup_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDetailNilai($id){
		$condition = "lookup_ujian.FK_REGIS_UJIAN ='" . $id . "' group by lookup_ujian.FK_MATA_AJAR,mata_ajar.NAMA_MATA_AJAR";
		$this->db->select('lookup_ujian.*,jenjang.NAMA_JENJANG,registrasi_ujian.FK_JADWAL_UJIAN,registrasi_ujian.NIP,mata_ajar.NAMA_MATA_AJAR,round(AVG(detail_nilai_wi.NILAI_1))as NILAI_1_WI,round(AVG(detail_nilai_wi.NILAI_2))as NILAI_2_WI');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'lookup_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->join('widyaiswara_nilai','registrasi_ujian.NIP=widyaiswara_nilai.NIP');
		$this->db->join('detail_nilai_wi','widyaiswara_nilai.PK_WIDYAISWARA_NILAI=detail_nilai_wi.FK_WIDYAISWARA_NILAI');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getStatus($id,$flag){
		$condition = "FK_REGIS_UJIAN ='" . $id . "' and flag<='" . $flag . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getdataPassGrade($fk_jadwal){
		$condition = "jawaban_peserta.PK_JAWABAN_DETAIL= '" . $fk_jadwal . "'";
		$this->db->select('event.PASS_GRADE');
		$this->db->from('jawaban_peserta');
		$this->db->join('event', 'jawaban_peserta.FK_EVENT=event.PK_EVENT ');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loadNilai(){
		$condition = "lookup_ujian.flag != '' group by lookup_ujian.FK_REGIS_UJIAN";
		$this->db->select('lookup_ujian.*,registrasi_ujian.NIP,jenjang.NAMA_JENJANG');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'lookup_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getdata_lookup($pk,$mata_ajar){
		$condition = "registrasi_ujian.NIP = '" . $pk . "' and lookup_ujian.FK_MATA_AJAR = '" . $mata_ajar . "'";
		$this->db->select('registrasi_ujian.*');
		$this->db->from($this->_table);
		$this->db->join('registrasi_ujian', 'lookup_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function updateData($where,$table,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}

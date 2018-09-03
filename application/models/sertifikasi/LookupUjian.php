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
	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function getDetailNilai($id){
		$condition = "lookup_ujian.FK_REGIS_UJIAN ='" . $id . "' group by lookup_ujian.FK_MATA_AJAR,mata_ajar.NAMA_MATA_AJAR";
		$this->db->select('lookup_ujian.*,registrasi_ujian.NIP,mata_ajar.NAMA_MATA_AJAR,round(AVG(detail_nilai_wi.NILAI_1))as NILAI_1_WI,round(AVG(detail_nilai_wi.NILAI_2))as NILAI_2_WI');
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

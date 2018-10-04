<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class RegisUjian extends My_Model
{
	public $_table = 'registrasi_ujian';
	public $primary_key = 'PK_REGIS_UJIAN';


  public function save($data) {
		$insert=$this->db->insert("registrasi_ujian", $data);
		$insert_id = $this->db->insert_id();
		 if($insert){
			 	return  $insert_id;
		 }else{
			 return 'Data Inserted Failed';
		 }
	}

	public function getdataHistory($id,$nip){
		$condition = "lookup_ujian.FK_REGIS_UJIAN =" . "'" . $id . "' and registrasi_ujian.NIP=" . "'" . $nip . "' and lookup_ujian.STATUS='BELUM LULUS'";
		$this->db->select('mata_ajar.NAMA_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('lookup_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = lookup_ujian.FK_REGIS_UJIAN');
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();;
		} else {
			return 'empty';
		}

	}
	public function get_profile($nip){
		$condition = "nip =" . "'" . $nip . "' and flag=1";
		$this->db->select('dokumen_registrasi_ujian.*');
		$this->db->from($this->_table);
		$this->db->join('dokumen_registrasi_ujian', 'dokumen_registrasi_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getdataHistorybyNIP($nip,$kode_diklat){
		$condition = "registrasi_ujian.NIP=" . "'" . $nip . "' and registrasi_ujian.KODE_DIKLAT=" . "'" . $kode_diklat . "'  and lookup_ujian.status='BELUM LULUS' ";
		$this->db->select('mata_ajar.NAMA_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('lookup_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = lookup_ujian.FK_REGIS_UJIAN');
		$this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();;
		} else {
			return 'empty';
		}

	}

	public function getdatakdDiklatandProvinsi($id){
		$condition = "registrasi_ujian.PK_REGIS_UJIAN =" . "'" . $id . "' and flag=1";
		$this->db->select('KODE_DIKLAT,PROVINSI');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPKREGIS($pk){
		$condition = "registrasi_ujian.GROUP_REGIS =" . "'" . $pk . "' and flag=1";
		$this->db->select('PK_REGIS_UJIAN');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDatabypk($pk){
		$condition = "registrasi_ujian.PK_REGIS_UJIAN =" . "'" . $pk . "' and flag=1";
		$this->db->select('registrasi_ujian.NIP,provinsi.NAMA,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA,jadwal_ujian.START_DATE,jadwal_ujian.END_DATE,jenjang.NAMA_JENJANG,registrasi_ujian.KODE_DIKLAT');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->join('dokumen_registrasi_ujian', 'dokumen_registrasi_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->join('provinsi', 'registrasi_ujian.LOKASI_UJIAN = provinsi.PK_PROVINSI');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loaddatabyuser($user){
		$condition = "CREATED_BY =" . "'" . $user . "' and flag=0";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loaddatabyuserpk($user,$regis){
		$condition = "CREATED_BY =" . "'" . $user . "' and registrasi_ujian.PK_REGIS_UJIAN=" . "'" . $regis . "' and flag=0";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loaddatabyuseranddiklat($kode_diklat,$user,$flag,$param){
		$condition = "jenjang.KODE_DIKLAT =" . "'" . $kode_diklat . "' and registrasi_ujian.CREATED_BY =" . "'" . $user . "' and registrasi_ujian.flag=" . "'" . $flag . "' and registrasi_ujian.PK_REGIS_UJIAN=" . "'" . $param . "'";
		$this->db->select('registrasi_ujian.NIP,registrasi_ujian.NO_SURAT_UJIAN,jadwal_ujian.START_DATE,jadwal_ujian.END_DATE,mata_ajar.NAMA_MATA_AJAR,jenjang.NAMA_JENJANG');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->join('mata_ajar', 'mata_ajar.FK_JENJANG = jenjang.PK_JENJANG');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loaddataregis($flag){
		$condition = "registrasi_ujian.flag=" . "'" . $flag . "'";
		$this->db->select('registrasi_ujian.NIP,registrasi_ujian.NO_SURAT_UJIAN,jadwal_ujian.START_DATE,jadwal_ujian.END_DATE,jenjang.NAMA_JENJANG,registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		// $this->db->join('mata_ajar', 'mata_ajar.FK_JENJANG = jenjang.PK_JENJANG');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
 public function data_detail_peserta($flag,$id){
	 $condition = "registrasi_ujian.flag=" . "'" . $flag . "' AND registrasi_ujian.PK_REGIS_UJIAN=" . "'" . $id . "' AND lookup_ujian.flag='1'";
	 $this->db->select('mata_ajar.NAMA_MATA_AJAR,registrasi_ujian.PK_REGIS_UJIAN,mata_ajar.PK_MATA_AJAR,dokumen_persetujuan.DOKUMEN,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA');
	 $this->db->from($this->_table);
	 $this->db->join('lookup_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = lookup_ujian.FK_REGIS_UJIAN');
	 $this->db->join('mata_ajar', 'lookup_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
	 $this->db->join('dokumen_registrasi_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = dokumen_registrasi_ujian.FK_REGIS_UJIAN');
	 $this->db->join('dokumen_persetujuan', 'registrasi_ujian.GROUP_REGIS = dokumen_persetujuan.GROUP_REGIS');
	 $this->db->where($condition);
	 $query = $this->db->get();
	 if ($query->num_rows() > 0) {
		 return $query->result();
	 } else {
		 	return 'false';
	 }

 }
 public function data_detail_peserta_doc($flag,$id){
	 $condition = "registrasi_ujian.flag=" . "'" . $flag . "' AND registrasi_ujian.PK_REGIS_UJIAN=" . "'" . $id . "' AND registrasi_ujian.flag='1'";
	 $this->db->select('dokumen_persetujuan.DOKUMEN,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA');
	 $this->db->from($this->_table);
	 $this->db->join('dokumen_registrasi_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = dokumen_registrasi_ujian.FK_REGIS_UJIAN');
	 $this->db->join('dokumen_persetujuan', 'registrasi_ujian.GROUP_REGIS = dokumen_persetujuan.GROUP_REGIS');
	 $this->db->where($condition);
	 $query = $this->db->get();
	 if ($query->num_rows() > 0) {
		 return $query->row();
	 }else {
		 	return 'false';
	 }

 }
 public function data_detail_notnull($flag,$id){
	 $condition = "registrasi_ujian.flag=" . "'" . $flag . "' AND registrasi_ujian.PK_REGIS_UJIAN=" . "'" . $id . "' group by mata_ajar.PK_MATA_AJAR";
	 $this->db->select('mata_ajar.NAMA_MATA_AJAR,registrasi_ujian.PK_REGIS_UJIAN,mata_ajar.PK_MATA_AJAR,registrasi_ujian.NILAI_KSP,dokumen_persetujuan.DOKUMEN,dokumen_registrasi_ujian.DOCUMENT,dokumen_registrasi_ujian.DOC_NAMA');
	 $this->db->from($this->_table);
	 // $this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
	 $this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
	 $this->db->join('mata_ajar', 'mata_ajar.FK_JENJANG = jenjang.PK_JENJANG');
	 $this->db->join('dokumen_registrasi_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = dokumen_registrasi_ujian.FK_REGIS_UJIAN');
	 $this->db->join('dokumen_persetujuan', 'registrasi_ujian.GROUP_REGIS = dokumen_persetujuan.GROUP_REGIS');
	 $this->db->where($condition);
	 $query = $this->db->get();
	 return $query->result();
 }
	public function load($userAdmin){
		$condition = "CREATED_BY =" . "'" . $userAdmin . "' and flag=0";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.PK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loadAll(){
		$condition = "flag=1";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function loadUjian(){
		$condition = "flag=1";
		$this->db->select('registrasi_ujian.*,jenjang.NAMA_JENJANG,jadwal_ujian.CATEGORY');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	public function loadbyNIP($NIP,$kode_diklat){
		$condition = "registrasi_ujian.NIP =" . "'" . $NIP . "' and registrasi_ujian.KODE_DIKLAT=" . "'" . $kode_diklat . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('lookup_ujian', 'registrasi_ujian.PK_REGIS_UJIAN = lookup_ujian.FK_REGIS_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function loadDatabyNIP($NIP){
		$condition = "NIP =" . "'" . $NIP . "' and flag=1";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('dokumen_registrasi_ujian', 'dokumen_registrasi_ujian.FK_REGIS_UJIAN = registrasi_ujian.PK_REGIS_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}


	}
	public function loadDatabyNIP2($NIP){
		$condition = "registrasi_ujian.CREATED_BY =" . "'" . $NIP . "' and flag='1'";
		$this->db->select('registrasi_ujian.*,jenjang.NAMA_JENJANG,jadwal_ujian.CATEGORY');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'registrasi_ujian.KODE_DIKLAT = jenjang.KODE_DIKLAT');
		$this->db->where($condition);
		$query = $this->db->get();

			return $query->result();


	}
	public function updateData($group_regis){
		//extract($data);
		$this->db->where('GROUP_REGIS', $group_regis);
    $this->db->update($this->_table, array('flag' => '1'));
		return true;
	}
	public function updateDataRegis($group_regis,$admin){
		//extract($data);
		$condition = "CREATED_BY =" . "'" . $admin . "' and flag=0";
		$this->db->where($condition);
    $this->db->update($this->_table, array('GROUP_REGIS' => $group_regis));
		return true;
	}


}

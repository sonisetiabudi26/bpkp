<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertek extends My_Model
{
	public $_table = 'pertek';
	public $primary_key = 'PK_PERTEK';

	public function view($nip){
		$condition = "pertek.CREATED_BY =" . "'" . $nip . "' group by pertek.NO_SURAT,pertek.PK_PERTEK";
    $this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('detail_pertek','pertek.PK_PERTEK = detail_pertek.FK_PERTEK','Left');
		$this->db->join('detail_angka_kredit','pertek.PK_PERTEK = detail_angka_kredit.FK_PERTEK','Left');
		$query = $this->db->get();
	   return $query->result();

	}
	public function loadAngker($id_pertek){
		$condition = "pertek.PK_PERTEK =" . "'" . $id_pertek . "'";
		$this->db->select('pertek.*,angka_kredit.PENDIDIKAN_SEKOLAH,angka_kredit.DIKLAT,angka_kredit.PENGAWASAN,angka_kredit.PENGEMBANGAN_PROFESI,angka_kredit.PENUNJANG,angka_kredit.JUMLAH,pengusul_pengangkatan.NIP');
		$this->db->from($this->_table);
		$this->db->join('pengusul_pengangkatan','pertek.NO_SURAT = pengusul_pengangkatan.NO_SURAT','Left');
		$this->db->join('angka_kredit','pengusul_pengangkatan.PK_PENGUSUL_PENGANGKATAN = angka_kredit.FK_PENGUSUL_PENGANGKATAN','Left');
		$query = $this->db->get();
		 return $query->result();
	}
	public function getdatabyid($id){

    $this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('detail_pertek','pertek.PK_PERTEK = detail_pertek.FK_PERTEK','Left');
		$this->db->join('detail_angka_kredit','pertek.PK_PERTEK = detail_angka_kredit.FK_PERTEK','Left');
		$this->db->where('PK_PERTEK',$id);
		$query = $this->db->get();
	   return $query->result();

	}
	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function save_pertek_detail($data,$table) {
		$insert=$this->db->insert($table, $data);
		 if($insert){
				return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
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
}

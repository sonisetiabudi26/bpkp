<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AngkaKredit extends My_Model
{
	public $_table = 'angka_kredit';
	public $primary_key = 'PK_ANGKA_KREDIT';

	public function view($nip,$no_pertek){
			$condition = "pengusul_pengangkatan.NIP=" . "'" . $nip . "' AND pertek.NO_PERTEK =" . "'" . $no_pertek . "'";
  		$this->db->select('pertek.NO_PERTEK,pertek.DOC_PERTEK,pertek.PERTEK_DATE,pengusul_pengangkatan.NAMA,pengusul_pengangkatan.NIP,pengusul_pengangkatan.NO_SURAT,pengusul_pengangkatan.CREATED_DATE,pengusul_pengangkatan.DOC_SURAT_PENGUSULAN as date_pengusulan,angka_kredit.*');
  		$this->db->from($this->_table);
  		$this->db->join('pengusul_pengangkatan', 'angka_kredit.FK_PENGUSUL_PENGANGKATAN = pengusul_pengangkatan.PK_PENGUSUL_PENGANGKATAN');
			$this->db->join('pertek', 'pertek.NO_SURAT = pengusul_pengangkatan.NO_SURAT');
  		$this->db->where($condition);
  		$query = $this->db->get();
  	//	return $query->result();
  		if ($query->num_rows() > 0) {
  			return $query->result();
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
}

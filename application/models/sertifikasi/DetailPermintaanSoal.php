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
	
}

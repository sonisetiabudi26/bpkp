<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfigUjian extends My_Model
{
	public $_table = 'konfigurasi_ujian';
	public $primary_key = 'PK_KONFIG_UJIAN';

	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$insert=$this->db->insert_batch('konfigurasi_ujian', $data);
		if($insert){
			return 'success';
		}else{
			return 'failed';
		}
	}

  public function loadData(){
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('mata_ajar', 'konfigurasi_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
    $this->db->join('jadwal_ujian', 'konfigurasi_ujian.FK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
  	$query = $this->db->get();
  	return $query->result();
  }
}
?>

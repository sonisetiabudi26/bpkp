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
	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
				return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function CheckPin($pin,$pk_event,$fk_mata_ajar){
		$condition="PIN=" . "'" . $pin . "' and FK_EVENT=" . "'" . $pk_event . "' and FK_MATA_AJAR=" . "'" . $fk_mata_ajar . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
  	$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return '0';
		}

		}
		public function getConfig($pin){
			$condition="PIN=" . "'" . $pin . "'";
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->where($condition);
	  	$query = $this->db->get();

				return $query->row();

		}
  public function loadData(){
    $this->db->select('konfigurasi_ujian.*,mata_ajar.NAMA_MATA_AJAR,mata_ajar.PK_MATA_AJAR,provinsi.NAMA,jadwal_ujian.*');
    $this->db->from($this->_table);
    $this->db->join('mata_ajar', 'konfigurasi_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
    $this->db->join('event', 'konfigurasi_ujian.FK_EVENT = event.PK_EVENT');
		$this->db->join('Provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
		$this->db->join('batch', 'event.PK_EVENT = batch.FK_EVENT');
		$this->db->join('jadwal_ujian', 'batch.FK_JADWAL = jadwal_ujian.PK_JADWAL_UJIAN');
  	$query = $this->db->get();
  	return $query->result();
  }
	public function updateData($where,$data){
		$this->db->where($where);
		$update=$this->db->update($this->_table,$data);
		if($update){
			return $update;
		}else{
			return 'error';
		}
	}
	public function delete_by_id($id){
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->_table);
	}
	public function get_data_all_by($id){
		$condition="konfigurasi_ujian.PK_KONFIG_UJIAN =" . "'" . $id . "'";
		$this->db->select('konfigurasi_ujian.*,mata_ajar.NAMA_MATA_AJAR,mata_ajar.PK_MATA_AJAR,provinsi.*,jadwal_ujian.*,jenjang.NAMA_JENJANG');
		$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'konfigurasi_ujian.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->join('event', 'konfigurasi_ujian.FK_EVENT = event.PK_EVENT');
		$this->db->join('Provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
		$this->db->join('batch', 'event.PK_EVENT = batch.FK_EVENT');
		$this->db->join('jadwal_ujian', 'batch.FK_JADWAL = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->join('jenjang', 'mata_ajar.FK_JENJANG = jenjang.PK_JENJANG');
		$this->db->where($condition);
  	$query = $this->db->get();
  	return $query->result();
	}
}
?>

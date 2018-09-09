<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class Batch extends My_Model
{
	public $_table = 'batch';
	public $primary_key = 'PK_BATCH';

	public function save($data) {
		$insert=$this->db->insert($this->_table, $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
  public function loadBatch(){
    $this->db->select('batch.*,provinsi.Nama,jadwal_ujian.*,event.KODE_EVENT,event.FK_PROVINSI');
    $this->db->from($this->_table);
    $this->db->join('jadwal_ujian', 'batch.FK_JADWAL = jadwal_ujian.PK_JADWAL_UJIAN');
    $this->db->join('event', 'batch.FK_EVENT = event.PK_EVENT');
		$this->db->join('provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
    $query = $this->db->get();
  //	return $query->result();
      return $query->result();
  }
	public function loadBatchbyid($id){
		$condition="event.KODE_EVENT =" . "'" . $id . "'";
    $this->db->select('batch.*,provinsi.Nama,jadwal_ujian.*,event.KODE_EVENT,event.FK_PROVINSI');
    $this->db->from($this->_table);
    $this->db->join('jadwal_ujian', 'batch.FK_JADWAL = jadwal_ujian.PK_JADWAL_UJIAN');
    $this->db->join('event', 'batch.FK_EVENT = event.PK_EVENT');
		$this->db->join('provinsi', 'event.FK_PROVINSI = provinsi.PK_PROVINSI');
		$this->db->where($condition);
    $query = $this->db->get();
  //	return $query->result();
      return $query->result();
  }
  public function remove($id){
    $this->db->where('PK_BATCH', $id);
    $this->db->delete($this->_table);
  }
	public function get_batch_by_id($id){
		$condition = "PK_BATCH =" . "'" . $id . "'";
		$this->db->select('batch.*,event.KODE_EVENT');
		$this->db->from($this->_table);
		$this->db->join('event', 'batch.FK_EVENT = event.PK_EVENT');
    $this->db->where($condition);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}
	}
}

  ?>

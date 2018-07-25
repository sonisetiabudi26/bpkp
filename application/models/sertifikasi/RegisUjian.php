<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class RegisUjian extends My_Model
{
	public $_table = 'registrasi_ujian';
	public $primary_key = 'PK_REGIS_UJIAN';


  public function save($data) {
		$insert=$this->db->insert("registrasi_ujian", $data);
		 if($insert){
			 	return  'Data Inserted Successfully';
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function load($userAdmin){
		$condition = "CREATED_AT =" . "'" . $userAdmin . "' and flag=0";
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
		$this->db->join('jadwal_ujian', 'registrasi_ujian.PK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	public function loadbyNIP($NIP,$flag){
		$condition = "NIP =" . "'" . $NIP . "' and flag=" . "'" . $flag . "'";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.PK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function loadDatabyNIP($NIP){
		$condition = "NIP =" . "'" . $NIP . "' and flag=2";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('jadwal_ujian', 'registrasi_ujian.PK_JADWAL_UJIAN = jadwal_ujian.PK_JADWAL_UJIAN');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "no data";
		}


	}
	public function updateData($group_regis){
		//extract($data);
		$this->db->where('GROUP_REGIS', $group_regis);
    $this->db->update($this->_table, array('flag' => '2'));
		return true;
	}
	public function updateDataRegis($group_regis,$admin){
		//extract($data);
		$condition = "CREATED_AT =" . "'" . $admin . "' and flag=1";
		$this->db->where($condition);
    $this->db->update($this->_table, array('GROUP_REGIS' => $group_regis));
		return true;
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class PengusulPengangkatan extends My_Model
{
	public $_table = 'pengusul_pengangkatan';
	public $primary_key = 'PK_PENGUSUL_PENGANGKATAN';


  public function _get_list_status() {
		$this->db->select('*');
		$this->db->from('status_pengusulan_pengangkatan');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


}

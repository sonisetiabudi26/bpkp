<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class MenuPage extends MY_Model
{
	public $_table = 'menu_page';
	public $primary_key = 'PK_MENU_PAGE';


  public function _get_menu_information($lookup_menu) {
		$condition = "fk_lookup_menu =" . "'" . $lookup_menu . "'";
		$this->db->select('menu_main');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function _get_access_menu_page($lookup_menu) {
		$condition = "fk_lookup_menu =" . "'" . $lookup_menu . "' and menu_name <> menu_main";
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
}

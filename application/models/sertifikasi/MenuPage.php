<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class MenuPage extends CI_Model
{
	var $table = 'Menu_Page';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
 
 
	public function get_all_menu_page()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}
 
 
	public function get_by_id($pk_menu_page)
	{
		$this->db->from($this->table);
		$this->db->where('pk_menu_page',$pk_menu_page);
		$query = $this->db->get();
 
		return $query->row();
	}
 
	public function menu_page_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
 
	public function menu_page_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
 
	public function delete_by_id($pk_menu_page)
	{
		$this->db->where('pk_menu_page', $pk_menu_page);
		$this->db->delete($this->table);
	}
 
 
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class My_Model extends CI_Model
{
	protected $_table;
	
	protected $primary_key = 'id';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('inflector');
		$this->load->database();
		$this->_fetch_table();
	}
 
 
	public function _get_all()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
 
 
	public function _get_by_id($primary_val)
	{
		return $this->get_by($this->primary_key, $primary_val);
	}
 
	public function _add($data)
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
 
	public function _update($where, $data)
	{
		$this->db->update($this->_table, $data, $where);
		return $this->db->affected_rows();
	}
 
	public function _delete_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		return $this->db->delete($this->_table);
	}
 
	private function _fetch_table()
    {
        if ($this->_table == NULL)
        {
            $this->_table = plural(preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this))));
        }
    }
 
}
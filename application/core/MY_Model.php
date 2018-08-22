<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
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
	    $query = $this->db->get_where($this->_table, array($this->primary_key => $primary_val));
	    return $query->row();
	}

	public function _add($data)
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}

	public function _update($where, $data)
	{
		$this->db->trans_start();
		$this->db->update($this->_table, $data, $where);
		$this->db->trans_complete();
		return $this->db->trans_status();
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

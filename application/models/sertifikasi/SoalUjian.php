<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalUjian extends My_Model
{
	public $_table = 'soal_ujian';
	public $primary_key = 'PK_SOAL_UJIAN';
	var $column_order = array('PERTANYAAN','PILIHAN_1','PILIHAN_2','PILIHAN_3', 'PILIHAN_4', 'JAWABAN', 'PARENT_SOAL', null);
    var $column_search = array('PERTANYAAN','JAWABAN','PARENT_SOAL');
    var $order = array('PK_SOAL_UJIAN' => 'desc'); // default order 
	
	public function view(){
		return $this->db->get($this->_table)->result();
	}
	
	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
	
	public function _get_soal_ujian_from_mata_ajar($fk_bab_mata_ajar) {
	    $condition = "fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function _get_soal_ujian_from_pk($pk_soal_ujian)
	{
		$condition = $this->primary_key." = '" . $pk_soal_ujian . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
		$this->db->join('bab_mata_ajar', 'soal_ujian.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$this->db->join('mata_ajar', 'bab_mata_ajar.fk_mata_ajar = mata_ajar.pk_mata_ajar');
		$query = $this->db->get();
	    return $query->result();
	}
	
	private function _get_datatables_query()
    {
         
        $this->db->from($this->_table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function count_all()
    {
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
	
	function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
}

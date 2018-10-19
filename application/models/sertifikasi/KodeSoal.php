<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KodeSoal extends My_Model
{
	public $_table = 'kode_soal';
	public $primary_key = 'PK_KODE_SOAL';
	var $column_order = array('KODE_SOAL','NAMA_MATA_AJAR', null);
	var $column_search = array('KODE_SOAL','NAMA_MATA_AJAR');
	var $order = array('PK_KODE_SOAL' => 'asc'); // default order
	/** ini fungsi untuk melakukan insert lebih dari 1 data */
	public function insert_multiple($data){
		$this->db->insert_batch($this->_table, $data);
	}
	public function getdataByID($ID){
		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
			$this->db->where('bab_mata_ajar.PK_BAB_MATA_AJAR', $ID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}

	}
	public function getdataByIDjenjang($ID){
		$this->db->select('kode_soal.*,mata_ajar.NAMA_MATA_AJAR,jenjang.NAMA_JENJANG');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'kode_soal.fk_mata_ajar = mata_ajar.PK_MATA_AJAR');
		$this->db->join('jenjang', 'mata_ajar.fk_jenjang = jenjang.PK_JENJANG');
			$this->db->where('kode_soal.PK_KODE_SOAL', $ID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}

	}
	public function updateData($where,$table,$data){
		$this->db->where($where);
		$update=$this->db->update($table,$data);
		if($update){
			return 'success';
		}else{
			return 'error';
		}
	}
	public function total_soal($id,$bab_mata_ajar){
			$condition = " kode_soal =" . "'" . $id . "' and FK_BAB_MATA_AJAR=" . "'" . $bab_mata_ajar . "' group by FK_BAB_MATA_AJAR";
		$this->db->select('KODE_SOAL,sum(KEBUTUHAN_SOAL)as kebutuhan_soal,sum(total_soal)as total_soal,FK_BAB_MATA_AJAR');
			$this->db->from('total_soal_distribusi');
			$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}
	}
	public function total_soal_row($id){
			$condition = " kode_soal =" . "'" . $id . "'";
		$this->db->select('KODE_SOAL,sum(KEBUTUHAN_SOAL)as kebutuhan_soal,sum(total_soal)as total_soal,FK_BAB_MATA_AJAR');
			$this->db->from('total_soal_distribusi');
			$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
		}
	}
	public function getdatakode($param1,$param2){
		$condition = " KODE_MATA_AJAR =" . "'" . $param1 . "' group by mata_ajar.KODE_MATA_AJAR";
		$this->db->select('MAX(KODE_SOAL) as kodex');
		$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = kode_soal.fk_mata_ajar');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'false';
		}
	}
	public function get_data_by_id_soal($id){

		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = kode_soal.FK_MATA_AJAR');
			$this->db->where('kode_soal.PK_KODE_SOAL', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "nodata";
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
  public function delete_by_id($id){
    $this->db->where('PK_KODE_SOAL', $id);
    $this->db->delete($this->_table);
  }
	public function view()
	{
		$this->db->select('*');
	  $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		return $query = $this->db->get();
	  // return $query->result();
	}
	public function view_cond()
	{
		$this->db->select('*');
			$this->db->from($this->_table);
		$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');

		$query = $this->db->get();
			return $query->result();
	}

	public function _detail_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('mata_ajar', 'mata_ajar.pk_mata_ajar = bab_mata_ajar.FK_MATA_AJAR');
		$this->db->join('group_mata_ajar', 'group_mata_ajar.pk_group_mata_ajar = mata_ajar.fk_group_mata_ajar');
		$this->db->join('lookup', 'group_mata_ajar.fk_lookup_diklat = lookup.pk_lookup');
		$query = $this->db->get();
	    return $query->result();
	}

	public function _review_bab_mata_ajar()
	{
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('permintaan_soal', 'permintaan_soal.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$query = $this->db->get();
	    return $query->result();
	}

	//function get datatable
	public function _get_datatables_query_kode_soal()
    {


			$this->db->from($this->_table);


        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_kode_soal()
    {
        $this->_get_datatables_query_kode_soal();
				$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $query = $this->db->get();
        // return $query->result();
    }

    public function count_filtered_kode_soal()
    {
        $this->_get_datatables_query_kode_soal();
				$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kode_soal()
    {
        $this->_get_datatables_query_kode_soal();
				$this->db->join('mata_ajar', 'kode_soal.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
        return $this->db->count_all_results();
    }
}

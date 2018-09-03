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

	public function _get_soal_ujian_from_bab_mata_ajar($fk_bab_mata_ajar) {
	    $condition = "fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}
	public function _get_soal_ujian_from_permintaan_soal($pk_soal,$flag) {
	    $condition = "FK_PERMINTAAN_SOAL = '" . $pk_soal . "' AND TAMPIL_UJIAN=0 AND permintaan_soal.flag='" . $flag . "'";
	    $this->db->select('soal_ujian.*,permintaan_soal.STATUS');
	    $this->db->from($this->_table);
				$this->db->join('permintaan_soal', 'soal_ujian.FK_PERMINTAAN_SOAL = permintaan_soal.PK_PERMINTAAN_SOAL');
	    $this->db->where($condition);
	    $query = $this->db->get();
	    return $query->result();
	}
	public function _get_soal_ujian_from_soal($pk_soal,$flag) {
			$condition = "PK_SOAL_UJIAN = '" . $pk_soal . "' AND TAMPIL_UJIAN=0 AND permintaan_soal.flag='" . $flag . "'";
			$this->db->select('soal_ujian.*,permintaan_soal.STATUS');
			$this->db->from($this->_table);
				$this->db->join('permintaan_soal', 'soal_ujian.FK_PERMINTAAN_SOAL = permintaan_soal.PK_PERMINTAAN_SOAL');
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

	private function _get_datatables_query($fk_bab_mata_ajar=null)
    {
		$this->db->from($this->_table);
		if($fk_bab_mata_ajar!=null){
			$this->db->where(" FK_BAB_MATA_AJAR = '" . $fk_bab_mata_ajar . "'");
		}

        $i = 0;
        foreach ($this->column_search as $item)
        {
			/** if datatable send POST for search */
            if($_POST['search']['value'])
            {
                /** first loop */
                if($i===0)
                {
					/** open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. */
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

				/** last loop */
                if(count($this->column_search) - 1 == $i)
					/** close bracket */
                    $this->db->group_end();
            }
            $i++;
        }

		/** here order processing */
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

	function get_datatables($fk_bab_mata_ajar=null)
    {
		if($fk_bab_mata_ajar!=null){
			$this->_get_datatables_query($fk_bab_mata_ajar);
		}else{
			$this->_get_datatables_query();
		}

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

	public function count_all($fk_bab_mata_ajar=null)
    {
        $this->db->from($this->_table);
		if($fk_bab_mata_ajar!=null){
			$this->db->where(" FK_BAB_MATA_AJAR = '" . $fk_bab_mata_ajar . "'");
		}
        return $this->db->count_all_results();
    }

	function count_filtered($fk_bab_mata_ajar=null)
    {
        $this->_get_datatables_query($fk_bab_mata_ajar);
        $query = $this->db->get();
        return $query->num_rows();
    }

	function update_all_for_ready_ujian($where, $data){
		$this->db->trans_start();
		$this->db->update($this->_table, $data, $where);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	function update_all_for_not_ready_ujian($where, $data){
		$this->db->trans_start();
		$this->db->update($this->_table, $data, $where);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	function get_random_soal($fk_bab_mata_ajar, $jumlah_tampil=1)
	{
		$condition = "fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
	    $this->db->where($condition);
		$this->db->order_by('rand()');
		$this->db->limit($jumlah_tampil);
	    $query = $this->db->get();
	    return $query->result();
	}

	public function _get_ready_soal_ujian($fk_bab_mata_ajar) {
	    $condition = "soal_ujian.fk_bab_mata_ajar = '" . $fk_bab_mata_ajar . "' and soal_ujian.tampil_ujian='1'";
	    $this->db->select('*');
	    $this->db->from($this->_table);
		$this->db->join('bab_mata_ajar', 'soal_ujian.fk_bab_mata_ajar = bab_mata_ajar.pk_bab_mata_ajar');
		$this->db->join('mata_ajar', 'bab_mata_ajar.fk_mata_ajar = mata_ajar.pk_mata_ajar');
		$this->db->join('soal_kasus', 'soal_ujian.parent_soal = soal_kasus.pk_soal_kasus', 'left');
		$this->db->where($condition);
		$this->db->order_by('parent_soal, rand()');
	    $query = $this->db->get();
	    return $query->result();
	}
}

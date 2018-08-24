<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanSoal extends My_Model
{
	public $_table = 'permintaan_soal';
	public $primary_key = 'PK_PERMINTAAN_SOAL';
  var $column_search = array('TIPE_SOAL','FK_BAB_MATA_AJAR','NAMA_BAB_MATA_AJAR','TANGGAL_PERMINTAAN');
	public function view(){
		return $this->db->get($this->_table)->result();
	}
	public function addPermintaan($data){
		$insert=$this->db->insert("permintaan_soal", $data);
		$insert_id = $this->db->insert_id();
		 if($insert){
				return  $insert_id;
		 }else{
			 return 'Data Inserted Failed';
		 }
	}
	public function getdata_diklat(){
		$this->db->select('permintaan_soal.*,bab_mata_ajar.NAMA_BAB_MATA_AJAR,mata_ajar.NAMA_MATA_AJAR,jenjang.NAMA_JENJANG');
		$this->db->from($this->_table);
		$this->db->join('bab_mata_ajar','permintaan_soal.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
		$this->db->join('mata_ajar','bab_mata_ajar.FK_MATA_AJAR = mata_ajar.PK_MATA_AJAR');
		$this->db->join('jenjang','jenjang.PK_JENJANG = mata_ajar.FK_JENJANG');
		$query = $this->db->get();
		 return $query->result();
	}
	public function getDatabyPembuat($id){
		$this->db->select('permintaan_soal.*,bab_mata_ajar.NAMA_BAB_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('bab_mata_ajar','permintaan_soal.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
			$this->db->where('STATUS',$id);
		// if($id=='pembuat_soal'){
		// 		$this->db->where('PEMBUAT_SOAL',$id);
		// 		$this->db->where('FK_LOOKUP_STATUS_PERMINTAAN','27');
		// }elseif($id=='review1'){
		// 	$this->db->where('REVIEW1',$id);
		// 	$this->db->where('FK_LOOKUP_STATUS_PERMINTAAN','24');
		// }
		$query = $this->db->get();
		 return $query->result();
	}
	public function numsoal($id){
		$this->db->select('count(*) as total_soal');
		$this->db->from($this->_table);
		$this->db->join('soal_ujian','permintaan_soal.PK_PERMINTAAN_SOAL = soal_ujian.FK_PERMINTAAN_SOAL');
		$this->db->where('PK_PERMINTAAN_SOAL',$id);
		$query = $this->db->get();
		 return $query->result();
	}
	public function getDatabyid($id){
		$this->db->select('permintaan_soal.*,bab_mata_ajar.NAMA_BAB_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('bab_mata_ajar','permintaan_soal.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
		$this->db->where('PK_PERMINTAAN_SOAL',$id);
		$query = $this->db->get();
		 return $query->result();
	}
	public function getDatabyidlimit($id){
		$this->db->select('permintaan_soal.*,bab_mata_ajar.NAMA_BAB_MATA_AJAR');
		$this->db->from($this->_table);
		$this->db->join('bab_mata_ajar','permintaan_soal.FK_BAB_MATA_AJAR = bab_mata_ajar.PK_BAB_MATA_AJAR');
		$this->db->where('PK_PERMINTAAN_SOAL',$id);
		$this->db->limit(1);
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
		public function updateData($where,$data){
			$this->db->where($where);
			$update=$this->db->update($this->_table,$data);
			if($update){
				return $update;
			}else{
				return 'error';
			}
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
}
}

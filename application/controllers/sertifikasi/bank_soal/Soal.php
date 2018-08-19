<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	private $filename = "soal";

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    		$this->load->model('sertifikasi/soalujian','soalujian');
				$this->load->model('sertifikasi/permintaansoal','permintaansoal');
				$this->load->model('sertifikasi/soaldistribusi','soal_distribusi');
    }


	public function insert_soal(){
		if($this->input->post('parent_soal')==0){
			$parent_soal=NULL;
		}
		$data = array(
			'PERTANYAAN' => $this->input->post('pertanyaan'),
			'PILIHAN_1' => $this->input->post('pilihan1'),
			'PILIHAN_2' => $this->input->post('pilihan2'),
			'PILIHAN_3' => $this->input->post('pilihan3'),
			'PILIHAN_4' => $this->input->post('pilihan4'),
			'PILIHAN_5' => $this->input->post('pilihan5'),
			'PILIHAN_6' => $this->input->post('pilihan6'),
			'PILIHAN_7' => $this->input->post('pilihan7'),
			'PILIHAN_8' => $this->input->post('pilihan8'),
			'JAWABAN' => $this->input->post('jawaban'),
			'PARENT_SOAL' => $parent_soal,
			'FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar')
		);
		if($this->soalujian->_add($data)){
			$data = array(
				'FK_LOOKUP_STATUS_PERMINTAAN' => 23
			);
			$where = array(
				'pk_soal_ujian' => $this->input->post('pk_soal_ujian')
			);
			$this->permintaansoal->_update();
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
    }

	public function update_soal(){
		if($this->input->post('parent_soal')==0){
			$parent_soal=NULL;
		}
		$data = array(
			'PERTANYAAN' => $this->input->post('pertanyaan'),
			'PILIHAN_1' => $this->input->post('pilihan1'),
			'PILIHAN_2' => $this->input->post('pilihan2'),
			'PILIHAN_3' => $this->input->post('pilihan3'),
			'PILIHAN_4' => $this->input->post('pilihan4'),
			'PILIHAN_5' => $this->input->post('pilihan5'),
			'PILIHAN_6' => $this->input->post('pilihan6'),
			'PILIHAN_7' => $this->input->post('pilihan7'),
			'PILIHAN_8' => $this->input->post('pilihan8'),
			'JAWABAN' => $this->input->post('jawaban'),
			'PARENT_SOAL' => $parent_soal
		);
		$where = array(
			'pk_soal_ujian' => $this->input->post('pk_soal_ujian')
		);

		if($this->soalujian->_update($where, $data)){
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
	}

	public function hapus_soal(){
		if($this->soalujian->_delete_by_id($this->input->post('pk_soal_ujian'))){
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
	}

	public function upload_soal(){
		$upload = $this->do_upload($this->input->post('fk_bab_mata_ajar'));
		$data = array('FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar'));
		if($upload['result'] == "success"){
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('uploads/'.$this->filename.'.xlsx');
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data['sheet'] = $this->import($sheet, $data);
		}else{
			$data['upload_error'] = $upload['error'];
		}
		print json_encode(array("status"=>$upload['result'], "data"=>$data));
	}

	public function do_upload($fk_bab_mata_ajar){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
		if($fk_bab_mata_ajar==0){
			return array('result' => 'input tidak boleh ada yang kosong', 'file' => '', 'error' => 'input tidak boleh ada yang kosong');
		}else{
			if (! $this->upload->do_upload('soalfile')){
				return array('result' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
			}else{
				return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			}
		}
	}

	public function import($sheet, $data){
		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
		$datasheet = [];
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($datasheet, [
				'PERTANYAAN'=>$row['A'],
				'PILIHAN_1'=>$row['B'],
				'PILIHAN_2'=>$row['C'],
				'PILIHAN_3'=>$row['D'],
				'PILIHAN_4'=>$row['E'],
				'PILIHAN_5'=>$row['F'],
				'PILIHAN_6'=>$row['G'],
				'PILIHAN_7'=>$row['H'],
				'PILIHAN_8'=>$row['I'],
				'JAWABAN'=>$row['J'],
				'PARENT_SOAL'=>NULL,
				'FK_BAB_MATA_AJAR'=>$data['FK_BAB_MATA_AJAR']
				]);
			}
			$numrow++;
		}
		/** Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model */
		if($this->soalujian->insert_multiple($datasheet)){
			return array('datasheet' => $datasheet, 'file' => '', 'response' => "success");
		}else{
			return array('datasheet' => $datasheet, 'file' => '', 'response' => "error");
		}
	}

	function build_ujian(){
		$datex=date('Y-m-d');
		$param = explode('~',$this->input->post('fk_bab_mata_ajar'));
		$bab_mata_ajar=$param[0];
		$jml_soal=$param[1];
		$jumlah_soal = $this->input->post('jumlah_soal');
		$kode_soal = $this->input->post('kode_soal');
		$id_kode_soal = $this->input->post('id_kode_soal');
		$mata_ajar = $this->input->post('mata_ajar');
		$datasheet1 = [];
		if(empty($jumlah_soal)){
				$output= array('msg' => "error");
		}else{
			if($jml_soal>=$jumlah_soal){
				$data['soal'] = $this->soalujian->get_random_soal($bab_mata_ajar, $jumlah_soal);
					foreach($data['soal'] as $row){
					//	$indexbatch=$indexbatch+1;
						array_push($datasheet1, [
							'FK_KODE_SOAL'=>$id_kode_soal,
							'FK_SOAL_UJIAN'=>$row->PK_SOAL_UJIAN,
							'CREATED_AT'=>$this->session->userdata('logged_in'),
							'CREATED_DATE'=>$datex
						]);
					}
					$upload=$this->soal_distribusi->insert_multiple($datasheet1);
						if($upload=='success'){
								$output= array('msg' => "success");
							}else{
								$output= array('msg' => "error");
							}
			}else{
				$output= array('msg' => "error");
			}

		}
			print json_encode($output);
	}
}

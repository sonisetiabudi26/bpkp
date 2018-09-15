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
				  $this->load->model('sertifikasi/JawabanPeserta','jawaban');
    }


	public function insert_soal(){
		if($this->input->post('parent_soal')==0){
			$parent_soal=NULL;
		}
		$pk_permintaan_soal=$this->input->post('pk_permintaan');
		$data=$this->permintaansoal->getDatabyid($pk_permintaan_soal);
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
			'FK_BAB_MATA_AJAR' => $data[0]->FK_BAB_MATA_AJAR,
			'FK_PERMINTAAN_SOAL' => $data[0]->PK_PERMINTAAN_SOAL,
		);
		if($this->soalujian->_add($data)){
			// $data = array(
			// 	'FK_LOOKUP_STATUS_PERMINTAAN' => 23
			// );
			// $where = array(
			// 	'pk_soal_ujian' => $this->input->post('pk_soal_ujian')
			// );
			// $this->permintaansoal->_update();
			print json_encode(array("msg"=>"success"));
		}else{
			print json_encode(array("msg"=>"error"));
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
			'PK_SOAL_UJIAN' => $this->input->post('pk_soal'),
			'tampil_ujian' => '0'
		);

		if($this->soalujian->_update($where, $data)){
			print json_encode(array("status"=>"success", "msg"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "msg"=>"Data gagal insert"));
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
		$upload = $this->do_upload();
		$id_permintaan=$this->input->post('id_permintaan');
		$data_bab_mata_ajar=$this->permintaansoal->getDatabyidlimit($id_permintaan);
		$fk_bab_mata_ajar=$data_bab_mata_ajar[0]->FK_BAB_MATA_AJAR;
		$data = array('PK_PERMINTAAN_SOAL' => $id_permintaan,
										'FK_BAB_MATA_AJAR' =>$fk_bab_mata_ajar);
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

	public function do_upload(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// if($fk_bab_mata_ajar==0){
		// 	return array('result' => 'input tidak boleh ada yang kosong', 'file' => '', 'error' => 'input tidak boleh ada yang kosong');
		// }else{
			if (! $this->upload->do_upload('soalfile')){
				return array('result' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
			}else{
				return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		}
	}

	public function import($sheet, $data){
		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
		$datasheet1 = [];
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($datasheet1, [
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
				'FK_PERMINTAAN_SOAL'=>$data['PK_PERMINTAAN_SOAL'],
				'FK_BAB_MATA_AJAR'=>$data['FK_BAB_MATA_AJAR']
				]);
			}
			$numrow++;
		}
		/** Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model */
		if($numrow >1){
			if($this->soalujian->insert_multiple($datasheet1)){
					return array('datasheet' => $datasheet1, 'file' => '', 'response' => "success");
				}else{
					return array('datasheet' => $datasheet1, 'file' => '', 'response' => "error");
				}

			}else{
				return array('datasheet' => $datasheet1, 'file' => '', 'response' => 'error_row');
			}
	}

	function build_ujian(){
		$datex=date('Y-m-d');
		$a=1;
		if($this->input->post('fk_bab_mata_ajar')!=''){
		$parameter = $this->input->post('fk_bab_mata_ajar');
		$param=explode('~',$parameter);
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
				$no_ujian=$this->jawaban->getnoujian($kode_soal);
				$no_ujians=($no_ujian=='0'? '' : $no_ujian[0]->soal_ujian);
				if($no_ujians!=''){
					$no_ujianss=$no_ujians+1;
				}else{
					$no_ujianss=1;
				}

					foreach($data['soal'] as $row){

						// unset($input);
						// unset($inputAll);
						// unset($pilihan_keys);
						// unset($pilihan);
						$jawaban='PILIHAN_'.$row->JAWABAN;
						$input = array('0' => $row->PILIHAN_1,'1' => $row->PILIHAN_2,'2' => $row->PILIHAN_3,'3' => $row->PILIHAN_4,'4' => $row->PILIHAN_5,'5' => $row->PILIHAN_6,'6' => $row->PILIHAN_7,'7' => $row->PILIHAN_8, );
						$inputAll = array('0' => $row->PILIHAN_1,'1' => $row->PILIHAN_2,'2' => $row->PILIHAN_3,'3' => $row->PILIHAN_4,'4' => $row->PILIHAN_5,'5' => $row->PILIHAN_6,'6' => $row->PILIHAN_7,'7' => $row->PILIHAN_8, );

						unset($input[($row->JAWABAN-1)]);
						$pilihan_keys = array_rand($input, 3);
						$pilihan_key123=array_push($pilihan_keys,($row->JAWABAN-1));
						shuffle($pilihan_keys);

							  $jwb=$row->JAWABAN-1;
						  	$pilihan_1=$inputAll[$pilihan_keys[0]];
								$pilihan_2=$inputAll[$pilihan_keys[1]];
								$pilihan_3=$inputAll[$pilihan_keys[2]];
								$pilihan_4=$inputAll[$pilihan_keys[3]];
								if($inputAll[$jwb]==$inputAll[$pilihan_keys[0]]){
									$jawaban=1;
								}else if($inputAll[$jwb]==$inputAll[$pilihan_keys[1]]){
									$jawaban=2;
								}else if($inputAll[$jwb]==$inputAll[$pilihan_keys[2]]){
									$jawaban=3;
								}else if($inputAll[$jwb]==$inputAll[$pilihan_keys[3]]){
									$jawaban=4;
								}
								//$jawaban=$inputAll[$jwb];

						array_push($datasheet1, [
							'FK_KODE_SOAL'=>$id_kode_soal,
							'FK_SOAL_UJIAN'=>$row->PK_SOAL_UJIAN,
							'NO_UJIAN'=>$no_ujianss,
							'PILIHAN_1'=>$pilihan_1,
							'PILIHAN_2'=>$pilihan_2,
							'PILIHAN_3'=>$pilihan_3,
							'PILIHAN_4'=>$pilihan_4,
							'JAWABAN'=>$jawaban,
							'CREATED_AT'=>$this->session->userdata('logged_in'),
							'CREATED_DATE'=>$datex
						]);
						$no_ujianss++;
					}
					$upload=$this->soal_distribusi->insert_multiple($datasheet1);
						if($upload=='success'){
								$output= array('msg' => "success", 'file' => $pilihan_keys, 'data'=> $pilihan_keys);
							}else{
								$output= array('msg' => "error");
							}
			}else{
				$output= array('msg' => "error");
			}

		}
	}else{
		$output= array('msg' => "error");
	}
			print json_encode($output);
	}
}

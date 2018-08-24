<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	  $this->load->model('sertifikasi/permintaansoal','permintaansoal');
				$this->load->model('sertifikasi/detailpermintaansoal','detailpermintaansoal');
    }

	public function loadPermintaan(){
		$username = $this->session->userdata('logged_in');
		$list=$this->permintaansoal->getDatabyPembuat($username);
		$data = array();
		$no =1;
		foreach ($list as $soal) {


				$row = array();
				$row[] =$no;
				$row[] = $soal->NAMA_BAB_MATA_AJAR;
				$row[] = $soal->TIPE_SOAL;
				$row[] = $soal->TANGGAL_PERMINTAAN;
				$data_soal=$this->permintaansoal->numsoal($soal->PK_PERMINTAAN_SOAL);
				$row[] = $data_soal[0]->total_soal.'/'.$soal->JUMLAH_SOAL;
				if($data_soal[0]->total_soal==$soal->JUMLAH_SOAL&&$username=='pembuat_soal'){
					$disable="style='display:none'";
				}else{
					$disable='';
				}

				$row[] = '<div style="text-align:center;"><a data-var="pk_permintaan_soal" '.$disable.' data-id='.$soal->PK_PERMINTAAN_SOAL.' class="btn btn-sm btn-success" onclick="getModalWithParam(this)" id="btn-edit-soal"
					data-href="'. base_url('sertifikasi')."/bank_soal/permintaan/vw_create_soal".'" data-toggle="modal" data-target="#modal-content"
					><i class="glyphicon glyphicon-plus"></i> Buat Soal</a>
					<a '.$disable.' ata-var="id_permintaan" data-id='.$soal->PK_PERMINTAAN_SOAL.' class="btn btn-sm btn-default" onclick="getModal(this)" id="btn-import-soal" data-href="'.base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal/".$soal->PK_PERMINTAAN_SOAL.'" data-toggle="modal" data-target="#modal-content"
						><i class="glyphicon glyphicon-pencil"></i> Import Soal</a>
						<a  href="javascript:void(0)" class="btn btn-sm btn-primary"  title="Hapus" onclick="update_data('."'".$soal->PK_PERMINTAAN_SOAL."'".')"><i class="fa fa-paper-plane"></i> Kirim</a>
					</div>';

				$data[] = $row;
					$no++;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $no,
			"recordsFiltered" => $no,
			"data" => $data,
						);
		echo json_encode($output);
	}
	public function vw_create_soal(){
		$data['pk_permintaan_soal']=$this->input->post('pk_permintaan_soal');
			$this->load->view('sertifikasi/bank_soal/content/add_soal', $data);

	}
	public function insert_permintaan(){
		$data = array(
			'FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar'),
			'TIPE_SOAL' => $this->input->post('tipe_soal'),
			// 'PEMBUAT_SOAL' => $this->input->post('pembuat'),
			// 'REVIEW1' => $this->input->post('review1'),
			'STATUS' => 'pembuat_soal',
			'TANGGAL_PERMINTAAN' => $this->input->post('tanggal_permintaan'),
			'JUMLAH_SOAL' => $this->input->post('jumlah_soal'),
			'FK_LOOKUP_STATUS_PERMINTAAN' => 27
		);
		$insert=$this->permintaansoal->addPermintaan($data);
		if($insert!='Data Inserted Failed'){
			$dataid=$insert;
			$data_detail[0] =$this->input->post('pembuat');
			$tugas[0]='pembuat_soal';
			$data_detail[1] =$this->input->post('review1');
			$tugas[1]='review1';
			$data_detail[2] =$this->input->post('review2');
			$tugas[2]='review2';
			$data_detail[3] =$this->input->post('review3');
			$tugas[3]='review3';
			$data_detail[4] =$this->input->post('review4');
			$tugas[4]='review4';
			$data_insert=count($data_detail);
			for ($i=0; $i < $data_insert; $i++) {

				$datainsert = array('FK_PERMINTAAN_SOAL' => $dataid,
			 											'TUGAS'=>$tugas[$i],
														'PETUGAS'=>$data_detail[$i]);
				$insertdata=$this->detailpermintaansoal->_add($datainsert);
			}

			print json_encode(array("status"=>"success", "msg"=>"Data berhasil disimpan"));
		}else{
			print json_encode(array("status"=>"error", "msg"=>"Data gagal disimpan"));
		}
    }

	public function update_soal(){
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
			'PARENT_SOAL' => $this->input->post('parent_soal')
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
	public function list_permintaan(){
		$list=$this->permintaansoal->getdata_diklat();
		$data = array();
		$no =1;
		foreach ($list as $soal) {
				$row = array();
				$row[] =$no;
				$row[] = $soal->NAMA_JENJANG;
				$row[] = $soal->NAMA_MATA_AJAR;
				$row[] = $soal->NAMA_BAB_MATA_AJAR;
				$row[] = $soal->TIPE_SOAL;
				$row[] = $soal->TANGGAL_PERMINTAAN;
				$row[] = $soal->JUMLAH_SOAL;
				$row[] = $soal->STATUS;
				// $data_soal=$this->permintaansoal->numsoal($soal->PK_PERMINTAAN_SOAL);
				// $row[] = $data_soal[0]->total_soal.'/'.$soal->JUMLAH_SOAL;
				// if($data_soal[0]->total_soal==$soal->JUMLAH_SOAL&&$id=='pembuat_soal'){
				// 	$disable="style='display:none'";
				// }else{
				// 	$disable='';
				// }

				// $row[] = '<div style="text-align:center;"><a data-var="pk_permintaan_soal" '.$disable.' data-id='.$soal->PK_PERMINTAAN_SOAL.' class="btn btn-sm btn-success" onclick="getModalWithParam(this)" id="btn-edit-soal"
				// 	data-href="'. base_url('sertifikasi')."/bank_soal/permintaan/vw_create_soal".'" data-toggle="modal" data-target="#modal-content"
				// 	><i class="glyphicon glyphicon-plus"></i> Buat Soal</a>
				// 	<a '.$disable.' ata-var="id_permintaan" data-id='.$soal->PK_PERMINTAAN_SOAL.' class="btn btn-sm btn-default" onclick="getModal(this)" id="btn-import-soal" data-href="'.base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal/".$soal->PK_PERMINTAAN_SOAL.'" data-toggle="modal" data-target="#modal-content"
				// 		><i class="glyphicon glyphicon-pencil"></i> Import Soal</a>
				// 		<a  href="javascript:void(0)" class="btn btn-sm btn-primary"  title="Hapus" onclick="update_data('."'".$soal->PK_PERMINTAAN_SOAL."'".')"><i class="fa fa-paper-plane"></i> Kirim</a>
				// 	</div>';

				$data[] = $row;
					$no++;
	}
	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $no,
		"recordsFiltered" => $no,
		"data" => $data,
					);
	echo json_encode($output);
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
	public function review($id){
		$data_update = array(
			'FK_LOOKUP_STATUS_PERMINTAAN' => 24
		);
		$where = array(

			'PK_PERMINTAAN_SOAL' => $id
		);
		$update=$this->permintaansoal->updateData($where,$data_update);
		 if($update=='success'){
			$output = array('msg' => 'success' , );
		}else{
			$output = array('msg' => 'error' , );
		}
		print json_encode($output);
	}

	function build_ujian(){
		$fk_bab_mata_ajar = $this->input->post('fk_bab_mata_ajar');
		$jumlah_soal = $this->input->post('jumlah_soal');
		if(!empty($jumlah_soal)){
			$data_update = array(
				'TAMPIL_UJIAN' => 0
			);
			$where = array(
				'fk_bab_mata_ajar' => $this->input->post('fk_bab_mata_ajar')
			);
			if($this->soalujian->update_all_for_not_ready_ujian($where, $data_update)){
				$data['soal'] = $this->soalujian->get_random_soal($fk_bab_mata_ajar, $jumlah_soal);
				foreach($data['soal'] as $row){
					$data_randow_row = array(
						'TAMPIL_UJIAN' => 1
					);
					$where = array(
						'pk_soal_ujian' => $row->PK_SOAL_UJIAN
					);
					$this->soalujian->update_all_for_ready_ujian($where, $data_randow_row);
				}
				$this->load->view('sertifikasi/bank_soal/content/list_soal', $data);
			}
		}else{
			$data['soal'] = $this->soalujian->_get_soal_ujian_from_bab_mata_ajar($fk_bab_mata_ajar);
			$this->load->view('sertifikasi/bank_soal/content/list_soal', $data);
		}
	}
}

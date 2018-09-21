<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementUjian extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->model('sertifikasi/menupage','menupage');
      $this->load->model('sertifikasi/event','event');
			$this->load->model('sertifikasi/Batch','batch');
      $this->load->model('sertifikasi/groupmataajar','groupmataajar');
      $this->load->model('sertifikasi/mataajar','mataajar');
      $this->load->model('sertifikasi/provinsi','provinsi');
      $this->load->model('sertifikasi/jadwalujian','jadwal');
      $this->load->model('sertifikasi/KonfigUjian','konfig');
      $this->load->model('sertifikasi/babmataajar','babmataajar');
    }
    public function index(){
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');
      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='bank_soal/admin/management_ujian.php';
        $data['username']=$username;
        getMenuAccessPage($data, $fk_lookup_menu);
      }else{
        redirect('/');
      }
    }
    public function loadKonfig(){
      $list = $this->konfig->loadData();
          $data = array();
          $no = $_POST['start'];
          $a=1;
          foreach ($list as $row) {
              $no++;
              $rows = array();
              $rows[] = $a;
              $rows[] = $row->START_TIME;
              $rows[] = $row->END_TIME;
              $rows[] = $row->NAMA_MATA_AJAR;
							$rows[] = $row->PIN;
              $rows[] = $row->CATEGORY."(".$row->START_DATE." - ".$row->END_DATE.")";
							$rows[] = $row->NAMA;
							$rows[] = $row->JUMLAH_SOAL;
              $rows[] = '<div style="text-align:center;"><a data-var="pk_konfig_ujian" data-id='.$row->PK_KONFIG_UJIAN.' class="btn btn-sm btn-warning" onclick="getModalWithParam(this)" id="btn-edit-konfig"
        data-href="'. base_url('sertifikasi')."/bank_soal/admin/managementujian/vw_edit_konfig".'" data-toggle="modal" data-target="#modal-content"
        ><i class="glyphicon glyphicon-pencil"></i> Edit</a>
        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data('."'".$row->PK_KONFIG_UJIAN.'~babmataajar'."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></div>';

              $data[] = $rows;
              $a++;
          }

          $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
                  );
          echo json_encode($output);
    }
		public function vw_edit_konfig(){
			$datex=date('m/d/Y');
			$dataAll = $this->konfig->get_data_all_by($this->input->post('pk_konfig_ujian'));
			foreach ($dataAll as $key) {
				$data['waktu_mulai']=$key->START_TIME;
				$data['waktu_selesai']=$key->END_TIME;
				$data['nama_jenjang']=$key->NAMA_JENJANG;
				$data['nama_mata_ajar']=$key->NAMA_MATA_AJAR;
				$data['jadwal_edit']=$key->PK_JADWAL_UJIAN;
				$data['lokasi_edit']=$key->PK_PROVINSI;
				$data['pk_konfig_ujian']=$key->PK_KONFIG_UJIAN;
				$data['jml_soal']=$key->JUMLAH_SOAL;
			}
			$data['jadwal']	= $this->jadwal->_get_jadwal_information($datex);
    	$data['provinsi']	= $this->provinsi->_get_provinsi_information();
			$this->load->view('sertifikasi/bank_soal/content/edit_konfig_data', $data);
		}
    public function vw_add_konfig(){
			$datex=date('m/d/Y');
      $data['jadwal']	= $this->jadwal->_get_jadwal_information($datex);
      $data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
			$data['provinsi']	= $this->provinsi->_get_provinsi_information();
  		$this->load->view('sertifikasi/bank_soal/content/add_konfig_ujian', $data);
    }
		private function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
	public function edit_konfig_ujian(){
		$waktu_mulai=$this->input->post('waktu_mulai');
		$waktu_selesai=$this->input->post('waktu_selesai');
		$jml_soal=$this->input->post('jml_soal');
		$pk_konfig_ujian=$this->input->post('pk_konfig_ujian');
		$datakonfig = array(
		'START_TIME' => $waktu_mulai,
		'END_TIME' => $waktu_selesai,
		'JUMLAH_SOAL' => $jml_soal,
		);
		$where = array('PK_KONFIG_UJIAN' => $pk_konfig_ujian,);
		$update=$this->konfig->updateData($where,$datakonfig);

			$data = array(
										"status" => "success",
										"msg" =>"Data berhasil disimpan"
						);


		print json_encode($data);
	}
		public function tambah_konfig_ujian(){
			$creator = $this->session->userdata('nip');
			$month=date('m');
			$years=substr(date('Y'),2,4);
			$datex=date('Y-m-d');
			$kode_diklat=$this->input->post('fk_group_mata_ajar');
			$kode_event=$kode_diklat.''.$month.''.$years;
			$provinsi=$this->input->post('fk_provinsi');
			$pass_grade='70';
			$kelas='Online';
			$jadwal=$this->input->post('fk_jadwal_ujian');
			$tanggal=$this->input->post('tanggal');
			$jml_soal=$this->input->post('jml_soal');
			$waktu_mulai=$this->input->post('waktu_mulai');
			$waktu_selesai=$this->input->post('waktu_selesai');
			$mata_ajar=$this->input->post('fk_mata_ajar');
			$data = array(
			 'KODE_EVENT' => $kode_event,
			 'KODE_DIKLAT' => $kode_diklat,
			 'URAIAN' => 'Online',
			 'FK_PROVINSI' => $provinsi,
			 'PASS_GRADE' => $pass_grade,
			 'CREATED_BY' => $creator,
			 'CREATED_DATE' => $datex
		 );
		 $insert=$this->event->saveByReturn($data);
		 if($insert!='Data Inserted Failed'){
			 $databatch = array(
				'FK_EVENT' => $insert,
				'KELAS' => $kelas,
				'FK_JADWAL' => $jadwal,
				'REFF' => 'Online',
				'CREATED_BY' => $creator,
				'CREATED_DATE' => $datex
			);
			$insertbatch=$this->batch->save($databatch);
			if($insertbatch=='Data Inserted Successfully'){
				$datakonfig = array(
				'DATE_TIME' => $tanggal,
				'START_TIME' => $waktu_mulai,
 				'END_TIME' => $waktu_selesai,
 				'PIN' => $this->generatePIN(6),
 				'FK_MATA_AJAR' => $mata_ajar,
				'FK_EVENT' => $insert,
				'JUMLAH_SOAL' => $jml_soal,
 				'CREATED_BY' => $creator,
 				'CREATED_DATE' => $datex
 			);
				$insertkonfig=$this->konfig->save($datakonfig);
				if($insertkonfig=='Data Inserted Successfully'){
					 $data = array(
												 "status" => "success",
												 "msg" =>"Data berhasil disimpan"
								 );
				}else{
					 $data = array(
												 "status" => "error",
												 "msg" => "Data gagal disimpan konfig"
								 );
				}
			}else{
				 $data = array(
											 "status" => "error",
											 "msg" => "Data gagal disimpan batch"
							 );
			}
			 // print json_encode(array("status"=>"success", "data"=>'Data Berhasil disimpan'));
		 }else{
			 $data = array(
										 "status" => "error",
										 "msg" => "Data gagal disimpan event");
		 }
		 print json_encode($data);
		}
		public function delete($id)
		{
				$this->konfig->delete_by_id($id);

				echo json_encode(array("status" => TRUE));
		}
  }
  ?>

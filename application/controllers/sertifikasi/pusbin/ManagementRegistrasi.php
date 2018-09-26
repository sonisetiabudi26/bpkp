<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementRegistrasi extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/RegisUjian','regis');
				$this->load->model('sertifikasi/JadwalUjian','jadwal');
				$this->load->model('sertifikasi/Users','user');
				$this->load->model('sertifikasi/GroupMataAjar','groupmataajar');
				$this->load->model('sertifikasi/SoalUjian','soal');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='pusbin/ManagementRegistrasi.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function loadDataKebutuhanSoal(){
			$dataAll=$this->soal->loadsoalkebutuhan();
			 $data = array();
			 //$no = $_POST['start'];
			 $a=1;
			 foreach ($dataAll as $field) {
				 // $status=($datex>$field->START_DATE?'Expired':'Available');

					 $row = array();
					 $row[] = $a;
					 $row[] = $field->KODE_MATA_AJAR;
					 $row[] = $field->NAMA_MATA_AJAR;
					 $row[] = '0';
					 $url=base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_edit_jadwal/".$field->PK_MATA_AJAR;
					 $row[] = '<a class="btn btn-sm btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Lihat Detail</a>
                  ';

					 $data[] = $row;
					 $a++;
			 }

			 $output = array(
					 "draw" => 'dataKebSoal',
					 "recordsTotal" => $a,
					 "recordsFiltered" => $a,
					 "data" => $data,
			 );
			 //output dalam format JSON
			 echo json_encode($output);
		}
		public function loadDatawidyaiswara(){
			$datas=$this->user->loaddataWidyaiswarauser();
			$no=1;
			$datarow = array();
			foreach ($datas as $key) {
				$data = array();
				$data[]=$no;
				$data[]=$key->USER_NAME;
				$dataSUM=$this->user->loaddataWidyaiswarauserSum($key->PK_USER);
				$data[]=$dataSUM->total;
				$url=base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_show_data_wi/".$key->PK_USER;
				$url_detail=base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_show_data_detail_wi/".$key->PK_USER;
				$data[]='<a class="btn btn-sm btn-success" onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="fa fa-upload"></i> Unggah Data WI </a>
				<a class="btn btn-sm btn-primary" onclick="getModal(this)" id="btn-lihat_wi-doc" data-href="'.$url_detail.'" data-toggle="modal" data-target="#modal-content"><i class="fa fa-eye"></i> Lihat Data Detail </a>';
					$datarow[]=$data;
					$no++;
				}
				$output = array(
						"draw" => 'dataJadwal',
						"recordsTotal" => $no,
						"recordsFiltered" => $no,
						"data" => $datarow,
				);
				//output dalam format JSON
				echo json_encode($output);
		}
		public function vw_show_data_detail_wi($id){
			// $data['id_wi']=$id;
			$data['dataALL']=$this->user->loaddataWidyaiswarauserbyid($id);
			$this->load->view('sertifikasi/pusbin/content/view_data_nilai_wi',$data);
		}
		public function vw_show_data_wi($id){
			$data['id_wi']=$id;
			$data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
			$this->load->view('sertifikasi/pusbin/content/view_data_wi',$data);
		}
		public function vw_add_jadwal(){
		//	$data['mata_ajar']	= $this->mataajar->_detail_mata_ajar();
			$this->load->view('sertifikasi/pusbin/content/add_jadwal');
		}
		public function vw_edit_jadwal($param){
			$data	= $this->jadwal->getdatabyid($param);
			foreach ($data as $key ) {
				$data['PK_JADWAL_UJIAN']=$key->PK_JADWAL_UJIAN;
				$data['START_DATE']=$key->START_DATE;
				$data['END_DATE']=$key->END_DATE;
				$data['CATEGORY']=$key->CATEGORY;
				// $data['PASS_GRADE']=$key->PASS_GRADE;
			}
			$this->load->view('sertifikasi/pusbin/content/edit_jadwal',$data);
		}

		public function loadData(){

				$datas=$this->regis->loaddataregis('1');
				foreach ($datas as $key) {
					$data['NIP']=$key->NIP;
					$data['NAMA_JENJANG']=$key->NAMA_JENJANG;
					$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$key->NIP;
					$check=file_get_contents($url);
					$jsonResult=json_decode($check);
					$kodeunitkerja = $this->session->userdata('kodeunitkerja');
						if($jsonResult->message=='get_data_success'){
							$data['unitkerja']=$jsonResult->data[0]->UnitKerja_Nama;
							$data['nama_peserta']=$jsonResult->data[0]->Auditor_NamaLengkap;
						}
					$url=base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_show_detail/".$key->PK_REGIS_UJIAN;
					$data['action']='<a class="btn btn-sm btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>';
						$output[]=$data;

				}
			echo json_encode($output);
		}
		public function vw_show_detail($id){
			$data_detail=$this->regis->data_detail_peserta('1',$id);
			if($data_detail[0]!='false'){
				$data['data_detail']=$this->regis->data_detail_notnull('1',$id);
			}else{
				$data['data_detail']=$data_detail;
			}
			// return $data;
			$this->load->view('sertifikasi/pusbin/content/show_data_detail_peserta',$data);
		}
		// public function load_detail(){
		//
		// }
		public function loadDataJadwal(){
			//$date = date('Ymd');
			$datex=date('m/d/Y');
			$dataAll=$this->jadwal->loadJadwal();
			 $data = array();
			 //$no = $_POST['start'];
			 $a=1;
			 foreach ($dataAll as $field) {
				 $status=($datex>$field->START_DATE?'Expired':'Available');

					 $row = array();
					 $row[] = $a;
					 $row[] = $field->CATEGORY;
					 $row[] = $field->START_DATE;
					 $row[] = $field->END_DATE;
					 $row[] = $status;
					 // $row[] = $field->PASS_GRADE;
					 $url=base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_edit_jadwal/".$field->PK_JADWAL_UJIAN;
					 $row[] = '<a class="btn btn-sm btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jadwal('."'".$field->PK_JADWAL_UJIAN."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';

					 $data[] = $row;
					 $a++;
			 }

			 $output = array(
					 "draw" => 'dataJadwal',
					 "recordsTotal" => $a,
					 "recordsFiltered" => $a,
					 "data" => $data,
			 );
			 //output dalam format JSON
			 echo json_encode($output);
			//echo json_encode($dataAll);
		}
		public function ajax_delete($id)
    {
        $this->jadwal->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
		public function edit_jadwal()
		{
			$PK_JADWAL_UJIAN=$this->input->post('id_ujian');
			$CATEGORY=$this->input->post('category');
			$START_DATE=$this->input->post('start_date');
			$END_DATE=$this->input->post('end_date');
			// $PASS_GRADE=$this->input->post('pass_grade');
			if($PK_JADWAL_UJIAN!='' && $CATEGORY!=''){
				$data_where = array('PK_JADWAL_UJIAN' =>$PK_JADWAL_UJIAN );
				$data_update = array('CATEGORY' => $CATEGORY,
			 										'START_DATE' => $START_DATE,
													'END_DATE' => $END_DATE);
				$update=$this->jadwal->updateData($data_where,$data_update);
				if($update=='success'){
					print json_encode(array("status"=>"success", "msg"=>"Data berhasil disimpan"));
				}else{
						print json_encode(array("status"=>"error", "msg"=>"Data gagal disimpan didatabase"));
				}
			}else{
				print json_encode(array("status"=>"error", "msg"=>"category harus diisi"));
			}
		}

		public function tambah(){
		if(!empty($this->input->post('category'))){
			$data = array(
				'category' => $this->input->post('category'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),

			);
			$insert=$this->jadwal->insert_multiple($data);
			if($insert=='Data Inserted Successfully'){
				print json_encode(array("status"=>"success", "msg"=>$insert));
			}else{
				print json_encode(array("status"=>"error", "msg"=>$insert));
			}
		}else{
			print json_encode(array("status"=>"error", "msg"=>"category harus diisi"));
		}
		}
}

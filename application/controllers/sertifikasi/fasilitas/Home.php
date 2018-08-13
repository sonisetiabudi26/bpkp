<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		//$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
				$this->load->model('sertifikasi/AngkaKredit','angker');
				$this->load->helper(array('url','download'));
    }

    public function index()
    {
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		//$unit_kerja=$this->session->userdata('unit_kerja');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='fasilitas/homepage.php';
			$data['username']=$username;

			$data['validators']=$this->pengusul->datalistValidator($this->session->userdata('logged_in'),1);
		//	}
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
    public function loadperpindahan(){
      	$username = $this->session->userdata('logged_in');
      	$datas=$this->pengusul->loadValidasi($username,2);
         $data = array();
          $a=1;
  			foreach ($datas as $key) {
					if($key->RESULT==''){
						$result='';
					}elseif($key->RESULT==1){
						$result='<i class="glyphicon glyphicon-remove"></i> Reject';
					}else{
						$result='<i class="glyphicon glyphicon-ok"></i> Accept';
					}
          $dataRow = array();
  				$dataRow[]=$a;
					$dataRow[]=$key->NO_SURAT;
  				$dataRow[]=$key->NIP;
  				$dataRow[]=$key->NAMA;
  				$dataRow[]=$key->DESC;
					$dataRow[]=$result;
  				$url=base_url('sertifikasi')."/fasilitas/home/vw_show_doc/".$key->PK_PENGUSUL_PENGANGKATAN;
					$accept=$key->PK_PENGUSUL_PENGANGKATAN."~0";
					$reject=$key->PK_PENGUSUL_PENGANGKATAN."~1";

					$dataRow[]='<td><a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-primary">
							View Doc</a><a class="btn btn-sm btn-success" href="javascript:void(0)" title="accept" onclick="action('."'".$accept."'".')"> Accept</a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="reject" onclick="action('."'".$reject."'".')"> Reject</a></td>';
					$data[]=$dataRow;
  				$a++;
  			}
        $output = array(
            "draw" => 'dataperpindahan',
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
        );
  	 	 //output to json format
  	 	 echo json_encode($output);
    }
    public function loadpertama($obj){
		  	//$unitkerja=$this->session->set_userdata('unit_kerja',$obj);
      	$username = $this->session->userdata('logged_in');

        $datas=$this->pengusul->loadValidasi($username,1,$obj);
         $data = array();
          $a=1;
  			foreach ($datas as $key) {
					if($key->RESULT==''){
						$result='';
					}elseif($key->RESULT==1){
						$result='<i class="glyphicon glyphicon-remove"></i> Reject';
					}else{
						$result='<i class="glyphicon glyphicon-ok"></i> Accept';
					}
          $dataRow = array();
          $dataRow[]=$a;
					$dataRow[]=$key->NO_SURAT;
				  $dataRow[]=$key->NIP;
          $dataRow[]=$key->NAMA;
          $dataRow[]=$key->DESC;
					$dataRow[]=$result;


          $url=base_url('sertifikasi')."/fasilitas/home/vw_show_doc/".$key->PK_PENGUSUL_PENGANGKATAN;
					$url_angker=base_url('sertifikasi')."/fasilitas/home/vw_show_angker/".$key->PK_PENGUSUL_PENGANGKATAN;
					$accept=$key->PK_PENGUSUL_PENGANGKATAN."~0";
					$reject=$key->PK_PENGUSUL_PENGANGKATAN."~1";

					$dataRow[]='<td><a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-primary">
							View Doc</a><a class="btn btn-sm btn-success" href="javascript:void(0)" title="accept" onclick="action('."'".$accept."'".')"> Accept</a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="reject" onclick="action('."'".$reject."'".')"> Reject</a>
							<a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url_angker.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-warning">
									Input Angka Kredit</a></td>';
					$data[]=$dataRow;
  				$a++;
  			}
        $output = array(
            "draw" => 'dataEvent',
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
        );
  	 	 //output to json format
  	 	 echo json_encode($output);
    }
		public function download($param){
			$data=$this->doc_pengusul->loaddocbypk($param);
			foreach ($data as $key) {
				force_download('uploads/'.$key->DATA_DOC,NULL);
			}

			redirect("sertifikasi/fasilitas");
		}
		public function vw_show_doc($param){


			$data['data']=$this->doc_pengusul->loaddoc($param);
			$this->load->view('sertifikasi/fasilitas/content/modal_view_doc',$data);
		}
		public function vw_show_angker($param){
			// $data['data']=$this->doc_pengusul->loaddoc($param);
			$data['id_pengusul']=$param;
			$this->load->view('sertifikasi/fasilitas/content/modal_angka_kredit',$data);
		}
		public function update($obj){
			$parameter=explode('~',$obj);

			$where=array(
				'PK_PENGUSUL_PENGANGKATAN'=>$parameter[0],

			);
			$data_update=array(
				'RESULT'=>$parameter[1]
			);
		$update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);

			$data = array(
										 "msg" => "success",
						 );

		 //output to json format
		 echo json_encode($data);

		}
		public function AngkaKredit(){
				$data=$this->angker->view();
				$doc=array();
				if($data!='no data'){
					$status=200;
					$message='get_data_success';
						foreach ($data as $key) {
							$id_pengusul=$key->FK_PENGUSUL_PENGANGKATAN;
							//$dataAngker=$this->doc_pengusul->loaddoc($param);
							$apiuser=$this->apiuser($id_pengusul);
							$doc['NIP']= $key->NIP;
							$doc['Nama']=$key->NAMA;
							$doc['No_Surat']=$key->NO_SURAT;
							$doc['Tgl_Pengusul_Pengangkatan']=$key->date_pengusulan;
							$doc['Pangkat'] = $apiuser->data[0]->Pangkat_Nama;
							$doc['Golongan'] = $apiuser->data[0]->Golongan_Kode;
							$doc['TMT_Kepangkatan'] = $apiuser->data[0]->Pangkat_TglSuratKeputusan;
							$doc['Jabatan'] = $apiuser->data[0]->Jabatan_nama;
							$doc['Pendidikan_Sekolah'] = $apiuser->data[0]->PENDIDIKAN_SEKOLAH;
							$doc['Diklat'] = $apiuser->data[0]->DIKLAT;
							$doc['Pengawasan'] = $apiuser->data[0]->PENGAWASAN;
							$doc['Pengembangan_Profesi'] = $apiuser->data[0]->PENGAMBANGAN_PROFESI;
							$doc['Penunjang'] = $apiuser->data[0]->PENUNJANG;
							$doc['Jumlah'] = $apiuser->data[0]->JUMLAH;
							$doc['Tunjangan_Jabatan'] = $key->TUNJANGAN_JABATAN;
							$data_angker[]=$doc;

						}
			}else{
				$status=200;
				$message='get_data_success';
				$data_angker='empty data';
			}
			$data_list = array('status' => $status ,
														'message' => $message,
														'data' => $data_angker);
			echo json_encode($data_list);
		}
		public function apiuser($param){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$param;
			$check=file_get_contents($url);
			$jsonResult=json_decode($check);
			return $jsonResult;
		}
		public function add_angka_kredit(){

					$datex=date('Y-m-d');
					$pendidikan_sekolah=$this->input->post('pendidikan_sekolah');
					$diklat=$this->input->post('diklat');
					$pengawasan=$this->input->post('pengawasan');
					$pengembangan_profesi=$this->input->post('pengembangan_profesi');
					$penunjang=$this->input->post('penunjang');
					$jumlah=$this->input->post('jumlah');
					$tunjangan_jabatan=$this->input->post('tunjangan_jabatan');
					$id_pengusul=$this->input->post('id_pengusul');
					//$apiuser=$this->apiuser($this->session->userdata('nip'));
				//	$kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
					$data = array(
					 'PENDIDIKAN_SEKOLAH' => $pendidikan_sekolah,
					 'DIKLAT' => $diklat,
					 'FK_PENGUSUL_PENGANGKATAN' => $id_pengusul,
					 'PENGAWASAN' => $pengawasan,
					 'PENGEMBANGAN_PROFESI' => $pengembangan_profesi,
					 'PENUNJANG' => $penunjang,
					 'JUMLAH' => $jumlah,
					 'TUNJANGAN_JABATAN' => $tunjangan_jabatan,
					 'CREATED_AT' => $this->session->userdata('nip'),
					 'CREATED_DATE' => $datex
				 );
					$insert=$this->angker->save($data);
					if($insert=='Data Inserted Successfully'){
						print json_encode(array("status"=>"success", "data"=>$insert));
					}else{
						print json_encode(array("status"=>"error", "data"=>$insert));
					}
			}

}

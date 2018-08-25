<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

class AngkaKreditAuditor extends REST_Controller {

	public function __construct($config = 'rest'){
        // Load parent construct
        parent::__construct($config);
        $this->load->library('session');
    		header('Content-Type: application/json');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
				$this->load->model('sertifikasi/AngkaKredit','angker');
				$this->load->helper(array('url','download'));
    }
			public function index_get(){
				$data='Api Angka Kredit';
				echo json_encode($data,JSON_PRETTY_PRINT);
			}

			public function index_post(){
				 	$nip = $this->post('nip');
					$no_pertek = $this->post('no_pertek');
					$data_list_angker = array();;
			    $data_angker=$this->angker->view($nip,$no_pertek);
			    $doc=array();
			    if($data_angker!='no data'){
			      $status=200;
			      $message='get_data_success';
			        foreach ($data_angker as $key) {
			          $id_pengusul=$key->NIP;
			          $apiuser=$this->apiuser($id_pengusul);
									if(!empty($apiuser->data)){
					          // print_r($apiuser);
					          $doc['NIP']= $key->NIP;
					          $doc['Nama']=$apiuser->data[0]->Auditor_NamaLengkap;
					          $doc['No_Surat']=$key->NO_SURAT;
					          $doc['Tgl_Pengusul_Pengangkatan']=$key->date_pengusulan;
					          $doc['Pangkat'] = $apiuser->data[0]->Pangkat_Nama;
					          $doc['Golongan'] = $apiuser->data[0]->Golongan_Kode;
					          $doc['TMT_Kepangkatan'] = $apiuser->data[0]->Pangkat_TglSuratKeputusan;
					          $doc['Jabatan'] = $apiuser->data[0]->Jabatan_Nama;
					          $doc['Pendidikan_Sekolah'] = $key->PENDIDIKAN_SEKOLAH;
					          $doc['Diklat'] = $key->DIKLAT;
					          $doc['Pengawasan'] = $key->PENGAWASAN;
					          $doc['Pengembangan_Profesi'] = $key->PENGEMBANGAN_PROFESI;
					          $doc['Penunjang'] = $key->PENUNJANG;
					          $doc['Jumlah'] = $key->JUMLAH;
										$doc['SK_Pengangkatan'] = '';
										$doc['NO_PERTEK'] = $key->NO_PERTEK;
										$doc['PERTEK'] = $key->DOC_PERTEK;
										$doc['TGL_PERTEK'] = $key->PERTEK_DATE;
					          $data_list_angker[]=$doc;
									}else{
										$status=200;
								    $message='get_data_empty';
								    $data_list_angker='';
									}
			        }
			  }else{
			    $status=200;
			    $message='get_data_empty';
			    $data_list_angker='';
			  }

			  $data_list = array('status' => $status ,
			                        'message' => $message,
			                        'data' => $data_list_angker);
			  echo json_encode($data_list,JSON_PRETTY_PRINT);
			}

			public function apiuser($param){
			   	$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$param;
			    $check=file_get_contents($url);
			    $jsonResult=json_decode($check);
			    return $jsonResult;
			  }
			}
?>

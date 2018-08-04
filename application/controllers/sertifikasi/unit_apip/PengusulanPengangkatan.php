<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengusulanPengangkatan extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/pengusulan_pengangkatan.php';
        $data['username']=$username;
				$data['status']	= $this->pengusul->_get_list_status();
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function remove($obj){
			$delete=$this->pengusul->remove($obj);

				print json_encode(array("status"=>"success", "data"=>$delete));


		}
		public function submit(){
				$datex=date('Y-m-d');
				$nip=$this->input->post('nip');
				$nama=$this->input->post('nama');
				$status=$this->input->post('status');
				// $username = $this->session->userdata('logged_in');
				$data = array(
				 'NIP' => $nip,
				 'NAMA' => $nama,
				 'FK_STATUS_PENGUSUL_PENGANGKATAN' => $status,
				 'FK_STATUS_DOC' => '1',
				 'CREATED_AT' => $this->session->userdata('nip'),
				 'CREATED_DATE' => $datex
			 );
			 	$insert=$this->pengusul->save($data);
				if($insert=='Data Inserted Successfully'){
					print json_encode(array("status"=>"success", "data"=>$insert));
				}else{
					print json_encode(array("status"=>"error", "data"=>$insert));
				}
		}
		public function loadData(){
	 		$userAdmin=$this->session->userdata('nip');
	 		$datas=$this->pengusul->load($userAdmin);
			$a=1;
			if($datas!='no data'){
			foreach ($datas as $key) {
				$dataRow['no']=$a;
				$dataRow['nama']=$key->NAMA;
				$dataRow['nip']=$key->NIP;
				$dataRow['desc']=$key->DESC;
				$dataRow['desc_status']=$key->DESC_STATUS;
				$url=base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN;
				$dataRow['action']="<td><button onclick='getModal(this)' id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
						<span>Upload Doc</span></button><button onclick='remove(".$key->PK_PENGUSUL_PENGANGKATAN.")' class='btn btn-primary'>Delete</button><button class='btn btn-primary'>View</button></td>";
				$data[]=$dataRow;
				$a++;
			}
		}else{
			$data = array(
										 "msg" => "Data tidak ada",
						 );
		}
	 	 //output to json format
	 	 echo json_encode($data);
	 		// $data['provinsi']=$this->provinsi->_get_provinsi_information();
	  }
		public function vw_upload_doc($desc){
			$data['desc']=$desc;
			$this->load->view('sertifikasi/unit_apip/content/modal_upload_pengusulan',$data);
			// echo 'asd';
		}
		public function add_data(){

			$date = date('Ymd');
			$datex=date('Y-m-d');
			$nip=$this->input->post('nip');
			$dataCheckPeserta=$this->regis->loadbyNIP($nip,'1');
			if(!$dataCheckPeserta){
					$folder='doc_registrasi/'.$nip.'_'.$date;
					$docksp='doc_ksp';
					$docfoto='doc_foto';
					$uploadpdf = $this->do_upload_pdf($folder,$docksp);
					$uploadimg = $this->do_upload_img($folder,$docfoto);
					//$uploadimg = $this->do_upload_img($folder);
					// $uploadpdf='';

					// $this->session->set_userdata('group_regis', $group_regis);
					// $uploadpdf['result_upload_pdf']="success";
					if($uploadpdf['result_upload_pdf'] == "success" && $uploadimg['result_upload_img']){
						$doc_ksp=$folder.'/'.$_FILES['doc_ksp']['name'];
						$doc_foto=$folder.'/'.$_FILES['doc_foto']['name'];
						$data = array(
						 'NIP' => $this->input->post('nip'),
						 'GROUP_REGIS' => '',
						 'LOKASI_UJIAN' => $this->input->post('lokasi'),
						 'PK_JADWAL_UJIAN' => $this->input->post('jadwal'),
						 'NO_SURAT_UJIAN' => $this->input->post('no_surat'),
						 'NILAI_KSP' => $this->input->post('nilai_ksp'),
						 'DOC_NILAI_KSP' => $doc_ksp,
						 'DOC_FOTO' => $doc_foto,
						 'CREATED_AT' => $this->session->userdata('logged_in'),
						 'CREATED_DATE' => $datex,
						 'PROVINSI' => 'unknown',
						 'FLAG' => '1'
					 );
					 $insert=$this->regis->save($data);
					 if($insert=='Data Inserted Successfully'){
						 print json_encode(array("status"=>"success", "data"=>$insert));
					 }else{
						 print json_encode(array("status"=>"error", "data"=>$insert));
					 }
					}else{
						$data['upload_error1'] = $uploadpdf['error'];
						$data['upload_error2'] = $uploadimg['error'];
					}
					echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
			}else{
				echo json_encode(array("status"=>'gagal'));
			}
		}
		public function upload_submit(){
				$desc = $this->input->post('desc');
				$folder='doc_pengangkatan/'.$desc;
				$data = array('category' => 'pengusulan',
							'id_pengusul' => '1',
							'created_at' => 'admin',
							'created_date' => ''
							);
				if($desc=='1'){
					$data_upload = array(
						'0' => 'doc_cpns',
						'1' => 'doc_pns',
						'2' => 'doc_ijazah',
						'3' => 'doc_prajab',
						'4' => 'doc_sk_diklat',
						'5' => 'doc_skp',
						'6' => 'doc_sk_lulus',
						'7' => 'doc_penugasan'
				 );

				}elseif($desc=='2'){
					$data_upload = array(
						'0' => 'doc_cpns',
						'1' => 'doc_pns',
						'2' => 'doc_ijazah',
						'3' => 'doc_prajab',
						'4' => 'doc_sk_diklat',
						'5' => 'doc_skp',
						'6' => 'doc_sk_lulus',
						'7' => 'doc_penugasan',
						'8' => 'doc_pangkat_terakhir'
				 );
				}elseif($desc=='3'){

				}elseif($desc=='4'){

				}
				$uploadpdf = $this->do_upload_pdf($folder,$data_upload,$data);
		}

		public function do_upload_pdf($folder,$doc,$data){
			$array_length = count($doc);
			for ($i=0; $i < $array_length; $i++) {
					if (!is_dir('uploads/'.$folder)) {
						mkdir('./uploads/'.$folder, 0777, TRUE);
					}
					$config['upload_path']          = './uploads/'.$folder.'/';
					$config['allowed_types']        = 'pdf';
					$config['max_size']             = 2048;
					$config['max_width']            = 2048;
					$config['max_height']           = 768;
					$this->load->library('upload', $config);

						if (! $this->upload->do_upload($doc[$i])){
							return array('result_upload_pdf' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
						}else{
							$datas = array(
							 'STATUS_DOC' => '',
							 'CATEGORY_DOC' => $data['category'],
							 'DOC_PENGUSULAN_PENGANGKATAN' => $doc[$i],
							 'FK_PENGUSUL_PENGANGKATAN' => $data['id_pengusul'],
							 'CREATED_AT' => $data['created_at'],
							 'CREATED_DATE' => $data['created_date'],
						 );
						 $insert=$this->doc_pengusul->save($datas);
								 if($insert=='Data Inserted Successfully'){
									 $output = array(
																 "msg" => $doc[$i],
												 );
											 echo json_encode($output);
								 }else{
									 return array('result_upload_pdf' => 'error saveing data', 'file' => '', 'error' => '');
								 }

						}
				}
		}


		public function search($nip){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/pengguna?nip=".$nip;
			$check=file_get_contents($url);
			$jsonResult=json_decode($check);
			$kodeunitkerja = $this->session->userdata('kodeunitkerja');
			if($jsonResult->message=='get_data_success'  && $jsonResult->data[0]->isAuditor=='false'){
				// $data['NIP'] = $jsonResult->data[0]->NIP;
				// $data['NamaLengkap'] = $jsonResult->data[0]->NamaLengkap;
				$url_auditor="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$nip;
				$check_auditor=file_get_contents($url_auditor);
				$jsonResult_auditor=json_decode($check_auditor);
				$output = array(
											 "nip" => $jsonResult->data[0]->NIP,
											 "nama" => $jsonResult->data[0]->NamaLengkap,
											 "ttl" => $jsonResult->data[0]->TanggalLahir,
											 "unit" => $jsonResult->data[0]->NamaUnitKerja,
											 "pendidikan" => $jsonResult_auditor->data[0]->Pendidikan_Tingkat,
											 "jabatan" => $jsonResult_auditor->data[0]->Jabatan_Nama,
											 "golongan" => $jsonResult_auditor->data[0]->Golongan_Kode,

											 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
											 // "TanggalLahir" => $jsonResult->data[0]->TempatLlahir,
											 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
											 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
											 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
											 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
							 );
			 //output to json format
			 echo json_encode($output);
		 }else{
			 $output = array(
											"msg" => "NIP tidak sesuai dengan unit kerja",
							);
						echo json_encode($output);
		 }
		}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengusulanPengangkatan extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/PengusulPengangkatan','pengusul');
				$this->load->model('sertifikasi/Pertek','pertek');
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
		public function loadDatabelumlengkap(){
			$userAdmin=$this->session->userdata('nip');
			$datas=$this->pengusul->loadbelumlengkap($userAdmin);
			$a=1;
			if($datas!='no data'){
			foreach ($datas as $key) {
				$dataRow['no']=$a;
				//$nama=$this->apiuser($key->NIP);
				$dataRow['nama']=$key->NAMA;
				$dataRow['nip']=$key->NIP;
				$dataRow['desc']=$key->DESC;
				$dataRow['desc_status']=$key->DESC_STATUS;
				$disable=($key->FK_STATUS_DOC=='2'?'style="display:none"':'');
				$url=base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
				$dataRow['action']="<td><button onclick='getModal(this)' $disable id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
						<span>Unggah Dokumen</span></button><button onclick='remove(".$key->PK_PENGUSUL_PENGANGKATAN.")' class='btn btn-danger'>Hapus</button></td>";
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
		public function submit(){
				$datex=date('Y-m-d');
				$nip=$this->input->post('nip');
				//$nama=$this->input->post('nama');
				$status=$this->input->post('status');
				if($nip!='' && $status!=''){
				$apiuser=$this->apiuser($this->input->post('nip'));
        $kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
				$nama = $apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
				$data = array(
				 'NIP' => $nip,
				 'NAMA' => $nama,
				 'FK_STATUS_PENGUSUL_PENGANGKATAN' => $status,
				 'FK_STATUS_DOC' => '1',
				 'UNITKERJA' => $kodeunitkerja,
				 'CREATED_BY' => $this->session->userdata('nip'),
				 'CREATED_DATE' => $datex
			 );
			 	$insert=$this->pengusul->save($data);
				if($insert=='Data Inserted Successfully'){
					print json_encode(array("status"=>"success", "data"=>$insert));
				}else{
					print json_encode(array("status"=>"error", "msg"=>'Data Gagal disimpan ke database'));
				}
			}else{
				print json_encode(array("status"=>"error", "msg"=>'NIP dan status tidak boleh kosong'));
			}
		}
		public function apiuser($param){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$param;
			$check=file_get_contents($url);
			$jsonResult=json_decode($check);
			return $jsonResult;
		}
		public function loadData(){
	 		$userAdmin=$this->session->userdata('nip');
	 		$datas=$this->pengusul->load($userAdmin);
			$a=1;
			if($datas!='no data'){
			foreach ($datas as $key) {
				$dataRow['no']=$a;
				//$nama=$this->apiuser($key->NIP);
				$dataRow['nama']=$key->NAMA;
				$dataRow['nip']=$key->NIP;
				$dataRow['desc']=$key->DESC;
				$dataRow['desc_status']=$key->DESC_STATUS;
				$disable=($key->FK_STATUS_DOC=='2'?'style="display:none"':'');
				$url=base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
				$dataRow['action']="<td><button onclick='getModal(this)' $disable id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
						<span>Unggah Dokumen</span></button><button onclick='remove(".$key->PK_PENGUSUL_PENGANGKATAN.")' class='btn btn-danger'>Hapus</button></td>";
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
		public function vw_upload_doc($param){

			$parameter=explode('~',$param);
			$data['desc']=$parameter[0];
			$data['id_pengusul']=$parameter[1];
			$data['nip']=$parameter[2];
			$dataAll=$this->pengusul->getFormatDocument($parameter[0]);
			if($dataAll!='error_sql'){
				foreach ($dataAll as $key) {
					$datarow[]=$key->FILE_NAMA_DOC;
				}
				$data['file_format']=$datarow;
			}
			$this->load->view('sertifikasi/unit_apip/content/modal_upload_pengusulan',$data);
			// echo 'asd';
		}
		// public function add_data(){
		//
		// 	$date = date('Ymd');
		// 	$datex=date('Y-m-d');
		// 	$nip=$this->input->post('nip');
		// 	$dataCheckPeserta=$this->regis->loadbyNIP($nip,'1');
		// 	if(!$dataCheckPeserta){
		// 			$folder='doc_registrasi/'.$nip.'_'.$date;
		// 			$docksp='doc_ksp';
		// 			$docfoto='doc_foto';
		// 			$uploadpdf = $this->do_upload_pdf($folder,$docksp);
		// 			$uploadimg = $this->do_upload_img($folder,$docfoto);
		// 			//$uploadimg = $this->do_upload_img($folder);
		// 			// $uploadpdf='';
		//
		// 			// $this->session->set_userdata('group_regis', $group_regis);
		// 			// $uploadpdf['result_upload_pdf']="success";
		// 			if($uploadpdf['result_upload_pdf'] == "success" && $uploadimg['result_upload_img']){
		// 				$doc_ksp=$folder.'/'.$_FILES['doc_ksp']['name'];
		// 				$doc_foto=$folder.'/'.$_FILES['doc_foto']['name'];
		// 				$data = array(
		// 				 'NIP' => $this->input->post('nip'),
		// 				 'GROUP_REGIS' => '',
		// 				 'LOKASI_UJIAN' => $this->input->post('lokasi'),
		// 				 'PK_JADWAL_UJIAN' => $this->input->post('jadwal'),
		// 				 'NO_SURAT_UJIAN' => $this->input->post('no_surat'),
		// 				 'NILAI_KSP' => $this->input->post('nilai_ksp'),
		// 				 'DOC_NILAI_KSP' => $doc_ksp,
		// 				 'DOC_FOTO' => $doc_foto,
		// 				 'CREATED_BY' => $this->session->userdata('logged_in'),
		// 				 'CREATED_DATE' => $datex,
		// 				 'PROVINSI' => 'unknown',
		// 				 'FLAG' => '1'
		// 			 );
		// 			 $insert=$this->regis->save($data);
		// 			 if($insert=='Data Inserted Successfully'){
		// 				 print json_encode(array("status"=>"success", "data"=>$insert));
		// 			 }else{
		// 				 print json_encode(array("status"=>"error", "data"=>$insert));
		// 			 }
		// 			}else{
		// 				$data['upload_error1'] = $uploadpdf['error'];
		// 				$data['upload_error2'] = $uploadimg['error'];
		// 			}
		// 			echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
		// 	}else{
		// 		echo json_encode(array("status"=>'gagal'));
		// 	}
		// }
		public function upload_submit(){
				$desc = $this->input->post('desc');
				$id_pengusul = $this->input->post('id_pengusul');
				$nip = $this->input->post('nip');
				$datex=date('Y-m-d');
				$folder='doc_pengangkatan/'.$desc.'_'.$nip;
				$data = array('category' => $desc,
							'id_pengusul' => $id_pengusul,
							'created_by' => $this->session->userdata('nip'),
							'created_date' => $datex
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
				$uploadpdf = $this->do_upload_pdf($folder,$data_upload,$data,$desc);
				if($uploadpdf=='success'){
						$output = array('status' =>'success' ,'msg'=>'Berhasil');
				}else{
					 $output = array('status' =>'error' ,'msg'=>'Gagal upload');
				}
				print json_encode($output);
		}

		public function submit_nosurat(){
			$datex=date('Ymd');
			$no_surat = $this->input->post('no_surat');
			$nip_unitapip= $this->session->userdata('nip');
			$data_pengusul=$this->pengusul->numrowpeserta($nip_unitapip);

			if($no_surat!='' && $_FILES['doc_surat']['name']!=''){
				if($data_pengusul!='no data'){
				$folder='doc_surat_pengusulan/'.$datex.'/'.$datex.'_'.$nip_unitapip;
				$doc='doc_surat';
				$uploadpdf = $this->do_upload_pdf_surat($folder,$doc,$nip_unitapip,$no_surat);
				print json_encode(array('status'=>'success','msg'=>'Data berhasil disimpan ke database'));
			}else{
				print json_encode(array('status'=>'error','msg'=>'Tidak ada/kurang lengkap dokumen calon peserta'));
			}
			}else{
				print json_encode(array('status'=>'error','msg'=>'Data gagal disimpan ke database'));
			}


		}
		public function do_upload_pdf_surat($folder,$doc,$nip,$no){

					if (!is_dir('uploads/'.$folder)) {
						mkdir('./uploads/'.$folder, 0777, TRUE);
					}
					$config['upload_path']          = './uploads/'.$folder.'/';
					$config['allowed_types']        = 'pdf';
					$config['max_size']             = 2048;
					$config['max_width']            = 2048;
					$config['max_height']           = 768;
					$this->load->library('upload', $config);

						if (! $this->upload->do_upload($doc)){
							return array('msg' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
						}else{
							$doc_loc=$folder.'/'.$_FILES[$doc]['name'];
							$where=array(
								'CREATED_BY'=>$nip,
								'NO_SURAT'=>''
							);
							$data_update=array(
								'DOC_SURAT_PENGUSULAN'=>$doc_loc,
								'NO_SURAT'=>$no
							);
							$update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);
							$datas = array(
							 'NO_SURAT' => $no,
						 );
						 $insert=$this->pertek->save($datas);
									 $output = array(
																 "msg" => "success",
												 );
											// echo json_encode($output);
								return json_encode($output);
						}
		}

		public function do_upload_pdf($folder,$doc,$data,$desc){
			$array_length = count($doc);
			$no=1;
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
							$outout= array('result_upload_pdf' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
						}else{
							$doc_loc=$folder.'/'.$_FILES[$doc[$i]]['name'];
							$datas = array(
							 'STATUS_DOC' => '',
							 'CATEGORY_DOC' => $data['category'],
							 'DOC_PENGUSULAN_PENGANGKATAN' => $doc[$i],
							 'DATA_DOC' => $doc_loc,
							 'FK_PENGUSUL_PENGANGKATAN' => $data['id_pengusul'],
							 'CREATED_BY' => $data['created_by'],
							 'CREATED_DATE' => $data['created_date'],
						 );
						 $insert=$this->doc_pengusul->save($datas);
								 if($insert=='Data Inserted Successfully'){
									 $no++;
								 }

						}
				}
				$where=array(
					'PK_PENGUSUL_PENGANGKATAN'=>$data['id_pengusul'],

				);
				$data_update=array(
					'FK_STATUS_DOC'=>'2'
				);
				if($desc=='1'){
					if($no>6){
						 $update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);
						 return 'success';
					}
				}elseif($desc='2'){
					if($no>7){
						$update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);
						return 'success';
					}
				}elseif($desc='3'){
					if($no<7){

					}
				}elseif($desc='4'){
					if($no<7){

					}
				}
		}


		public function search($nip){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/dtpengguna";
			$data_login = array(
				'nip' => $nip,
		);
			$check=getDataCurl($data_login,$url);
			$jsonResult=json_decode($check);
			if($jsonResult->message=='get_data_success'){
			$kodeunitkerja = $this->session->userdata('kodeunitkerja');
			if($jsonResult->message=='get_data_success'&&$kodeunitkerja==$jsonResult->data[0]->KodeUnitKerja){

				$url_auditor="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$nip;
				$check_auditor=file_get_contents($url_auditor);
				$jsonResult_auditor=json_decode($check_auditor);
				$date= date('Y-m-d');
				$diff = date_diff( date_create($jsonResult->data[0]->TanggalLahir), date_create($date) );
				$umur =$diff->y  . ' Tahun ' . $diff->m .' Bulan';
				$output = array(
											 "nip" => $jsonResult->data[0]->NIP,
											 "nama" => $jsonResult->data[0]->NamaLengkap,
											 "umur" => $umur,
											 "gelarDepan" => $jsonResult_auditor->data[0]->Auditor_GelarDepan,
											 "gelarbelakang" => $jsonResult_auditor->data[0]->Auditor_GelarBelakang,
											 "ttl" => $jsonResult->data[0]->TanggalLahir,
											 "unit" => $jsonResult->data[0]->NamaUnitKerja,
											 "pendidikan" => $jsonResult_auditor->data[0]->Pendidikan_Tingkat,
											 "jabatan" => $jsonResult_auditor->data[0]->Jabatan_Nama,
											 "golongan" => $jsonResult_auditor->data[0]->Golongan_Kode,
											 "Tmtpangkat" => $jsonResult_auditor->data[0]->Pangkat_TglMulaiTugas,
							 );
			 //output to json format
			 // echo json_encode($output);
		 }else{
			 $output = array(
				 							"status" => 'error',
											"msg" => "NIP tidak sesuai dengan unit kerja",
							);

		 }
	 }else{
		 $output = array(
										"status" => 'error',
										"msg" => "NIP tidak ditemukan",
						);
	 }
	 echo json_encode($output);
		}

}

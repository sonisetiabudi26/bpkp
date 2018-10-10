<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper(array('form', 'url'));
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/Provinsi','provinsi');
				$this->load->model('sertifikasi/JadwalUjian','jadwal');
				$this->load->model('sertifikasi/RegisUjian','regis');
				$this->load->model('sertifikasi/Persetujuan','setuju');
				$this->load->model('sertifikasi/GroupMataAjar','groupmataajar');
				$this->load->model('sertifikasi/DocRegistrationUjian','doc_regis');
				$this->load->model('sertifikasi/MataAjar','mataajar');
				$this->load->model('sertifikasi/LookupUjian','lookup_ujian');
				$this->load->library('form_validation');
    }

    public function index()
    {
			$datenow=date('m/d/Y');
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/registrasi.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
				$data['provinsi']=$this->provinsi->_get_provinsi_information();
				$data['diklat']= $this->groupmataajar->_get_all_group_mata_ajar();
				$data['jadwal']=$this->jadwal->_get_jadwal_information($datenow);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function apiuser($nip){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$nip;
			$check=file_get_contents($url);
			if($check){
				$output=json_decode($check);
			}else{
				$output = array(
 				 							"status" => "error",
 											"msg" => "NIP tidak ditemukan",
 							);
			}
			return $output;
		}

		public function search($nip){
			$apiuser=$this->apiuser($nip);
			if($apiuser->message=='get_data_success'){
			$namaunitkerja = $apiuser->data[0]->UnitKerja_Nama;
			$kodeunitkerja = $this->session->userdata('kodeunitkerja');
			if($apiuser->message=='get_data_success' && $apiuser->data[0]->UnitKerja_Kode==$kodeunitkerja && $apiuser->data[0]->IsAuditor=='true'){
				$output = array(
											 "nip" => $apiuser->data[0]->Auditor_NIP,
											 "nama" => $apiuser->data[0]->Auditor_NamaLengkap,
											 "gelarDepan" => $apiuser->data[0]->Auditor_GelarDepan,
											 "gelarBelakang" => $apiuser->data[0]->Auditor_GelarBelakang,
											 "ttl" => $apiuser->data[0]->Auditor_TglLahir,
											 "pendidikan" => $apiuser->data[0]->Pendidikan_Tingkat,
											 "unit" => $apiuser->data[0]->UnitKerja_Nama,
											 "jabatan" => (!empty($apiuser->data[0]->Jabatan_Nama)?$apiuser->data[0]->Jabatan_Nama:'-'),
											 "jenjangjabatan" => $apiuser->data[0]->JenjangJabatan_Nama,
							 );
			 //output to json format
		 }else{
			 $output = array(
				 							"status" => "error",
											"msg" => "NIP tidak sesuai dengan unit kerja",
							);
		 }
	 }else{
		 $output = array(
										"status" => "error",
										"msg" => "NIP tidak ditemukan",
						);
	 }
		 print json_encode($output);
		}

		 public function loadData(){
			 $dataRows=array();
			  $userAdmin=$this->session->userdata('nip');
			 	$datas=$this->regis->loaddatabyuser($userAdmin);
				// foreach ($datas as $key ) {
				//  $dataRow=$this->regis->getdataHistory($key->PK_REGIS_UJIAN,$userAdmin);
				//  if($dataRow=='empty'){
				// 	 $dataRow=$this->regis->loaddatabyuseranddiklat($key->KODE_DIKLAT,$key->CREATED_BY,0);
				//  }
				 foreach ($datas as $key) {
					$row['NIP']=$key->NIP;

					// $apiuser=$this->apiuser($key->NIP);
					// if($apiuser->message!='auditor_not_found' ){
					$row['NAMA'] = $key->NAMA;
					// }else{
					// $row['NAMA'] ='unknown';
					// }
					$row['NO_SURAT_UJIAN']=$key->NO_SURAT_UJIAN;
					$row['JADWAL']=$key->START_DATE.' - '.$key->END_DATE;
					$url=base_url('sertifikasi')."/unit_apip/Registrasi/vw_detail_peserta/".$key->PK_REGIS_UJIAN;
					$row['ACTION']="<td><a onclick='getModal(this)' id='data_detail' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
		            <span>Lihat Data</span></a></td>";
				  $dataRows[]=$row;
				 }

			//	}
			 //output to json format
			 echo json_encode($dataRows);
		 }
		 public function vw_detail_peserta($param){
			  $userAdmin=$this->session->userdata('nip');
				$dataRow['dataPeserta']=$this->regis->getdataHistory($param,$userAdmin);
				if($dataRow['dataPeserta']=='empty'){
					$datas=$this->regis->loaddatabyuserpk($userAdmin,$param);
				 //foreach ($datas as $key ) {
					$dataRow['dataPeserta']=$this->regis->loaddatabyuseranddiklat($datas[0]->KODE_DIKLAT,$datas[0]->CREATED_BY,0,$param);
				//}
				}
		//}
		 $this->load->view('sertifikasi/unit_apip/content/view_detail_peserta',$dataRow);
	 }
		 public function add_data(){
    	 $date = date('Ymd');
			 $datex=date('Y-m-d');
				 $nip=$this->input->post('nip');
				 $dataCheckPeserta=$this->regis->loadbyNIP($nip,$this->input->post('diklat'));
				 if(!$dataCheckPeserta){
				 		$dataCheckPeserta='empty';
			 		}else{
							$dataRow=$this->regis->getdataHistorybyNIP($nip,$this->input->post('diklat'));
						if($dataRow!='empty'){
							$dataCheckPeserta='empty';
						}else{
							$dataCheckPeserta='not empty';
						}
					}
				 $apiuser=$this->apiuser($nip);
	 			if($apiuser->message=='get_data_success'){
	 					$provinsiNama = $apiuser->data[0]->Provinsi;
						$dataProvisi=$this->provinsi->getdataPK($provinsiNama);
						$provinsiId=$dataProvisi->PK_PROVINSI;
						$nama=$apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
					}
				 if($dataCheckPeserta=='empty'){
						 $folder='doc_registrasi/'.$nip.'_'.$date;
						 $data_doc[0]='doc_ksp';
						 $data_doc[1]='doc_foto';

						 $uploadpdf = $this->do_upload_pdf($folder,'doc_ksp');
						 $uploadimg = $this->do_upload_img($folder,'doc_foto');

						 if($this->input->post('checkpindah')){
							 $data_doc[2]='doc_loc';
							 $data_url_doc['doc_url_foto']=$folder.'/'.$_FILES['doc_loc']['name'];
							 $pindah_berkas=1;
							 $uploadpdf2 = $this->do_upload_pdf($folder,'doc_loc');
						 }else{
							  $pindah_berkas=0;
						 }

						 if($uploadpdf['result_upload_pdf'] == "success" && $uploadimg['result_upload_img']=='success'){
							 $data_url_doc[0]=$folder.'/'.$_FILES['doc_ksp']['name'];
							 $data_url_doc[1]=$folder.'/'.$_FILES['doc_foto']['name'];

							 $data = array(
					 			'NIP' => $this->input->post('nip'),
								'NAMA' => $nama,
								'GROUP_REGIS' => '',
								'KODE_DIKLAT' => $this->input->post('diklat'),
					 			'LOKASI_UJIAN' => ($this->input->post('lokasi')==''?$provinsiId:$this->input->post('lokasi')),
					 			'FK_JADWAL_UJIAN' => $this->input->post('jadwal'),
					 			'NO_SURAT_UJIAN' => $this->input->post('no_surat'),
					 			'NILAI_KSP' => $this->input->post('nilai_ksp'),
					 			'PINDAH_BERKAS' => $pindah_berkas,
					 			'CREATED_BY' => $this->session->userdata('nip'),
								'CREATED_DATE' => $datex,
								'PROVINSI' => $provinsiId,
								'FLAG' => '0'
					 		);
							$insert=$this->regis->save($data);
							if($insert!='Data Inserted Failed'){
								$count=count($data_doc);
								for ($i=0; $i < $count ; $i++) {
									$data_insert = array('DOCUMENT' => str_replace(' ', '_', $data_url_doc[$i]),
								 												'DOC_NAMA'=> $data_doc[$i],
																				'FK_REGIS_UJIAN' => $insert);
									$insertdoc=$this->doc_regis->save($data_insert);
								}

								if($insertdoc='Data Inserted Successfully'){
									$output = array(
					 				 							"status" => "success",
					 											"msg" => $insert,
					 							);
								}else{
									$output = array(
					 				 							"status" => "error",
					 											"msg" => "Gagal simpan data ke database",
					 							);
								}
							}else{
								$output = array(
				 				 							"status" => "error",
				 											"msg" => "Gagal simpan data ke database",
				 							);
							}
						 }else{
							 $output = array(
								 							"status" => "error",
															"msg" => $uploadimg['result_upload_img'],
											);
						 }
				 }else{
					 $output = array(
						 							"status" => "error",
													"msg" => "NIP sudah terdaftar",
									);
				 }

			 print json_encode($output);
		 }

		 public function do_upload_pdf($folder,$doc){

			 if (!is_dir('uploads/'.$folder)) {
				 mkdir('./uploads/'.$folder, 0777, TRUE);
			 }
			 $config['upload_path']          = './uploads/'.$folder.'/';
			 $config['allowed_types']        = 'pdf';
			 $config['max_size']             = 2048;
			 $config['max_width']            = 2048;
			 $config['max_height']           = 768;
			 $config['overwrite'] = TRUE;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);

				 if (! $this->upload->do_upload($doc)){
					 return array('result_upload_pdf' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
				 }else{
					 return array('result_upload_pdf' => 'success', 'file' => $this->upload->data(), 'error' => '');
				 }
		 }
		 public function do_upload_img($folder,$doc){
			 if (!is_dir('uploads/'.$folder)) {
				 mkdir('./uploads/'.$folder, 0777, TRUE);
			 }
			 $config2['upload_path']          = './uploads/'.$folder.'/';
			 $config2['allowed_types']        = 'JPG|JPEG|jpg|jpeg|png|PNG';
			 $config2['max_size'] 						= '0';
       $config2['max_filename']					= '255';
			 $config2['overwrite'] 						= TRUE;
			 $this->load->library('upload', $config2);
			 $config2['file_name'] = $_FILES['doc_foto']['name'];

        $this->upload->initialize($config2);


				 if (!$this->upload->do_upload('doc_foto')){
					 return array('result_upload_img' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
				 }else{
					 $image_data = $this->upload->data();
					 $config3['image_library'] = 'gd2';
					 $config3['source_image'] = $image_data['full_path']; //get original image
					 $config3['maintain_ratio'] = TRUE;
					 $config3['width'] = 354;
					 $config3['height'] = 472;
					 $this->load->library('image_lib', $config3);
					 if (!$this->image_lib->resize()) {
							 $this->handle_error($this->image_lib->display_errors());
					 }
					 return array('result_upload_img' => 'success', 'file' => $this->upload->data(), 'error' => '');
				 }
		 }
		 public function add_persetujuan(){
			 $dates = date('ymdHis');
			 $timex= date('His');
			 $datex=date('Y-m-d');

					 $admin=$this->session->userdata('nip');
					 $group_regis=$this->session->userdata('kodeunitkerja').'_'.$dates;
					 $update=$this->regis->updateDataRegis($group_regis,$admin);

					 $folder='doc_setuju/'.$group_regis;
					 $docpersetujuan='doc_persetujuan';
					 $uploadpdf = $this->do_upload_pdf($folder,$docpersetujuan);

					 if($uploadpdf['result_upload_pdf'] == "success"){
						 $doc_persetujuan='doc_setuju/'.$group_regis.'_'.$dates.'/'.$_FILES['doc_persetujuan']['name'];
						 // $doc_foto='doc_registrasi/'.$folder.'/'.$_FILES['doc_foto']['name'];
						 $data = array(
				 			'GROUP_REGIS' => $group_regis,
						  'DOKUMEN' => $doc_persetujuan,
				 			'CREATED_BY' => $this->session->userdata('nip'),
							'CREATED_DATE' => $datex
				 		);
						$update=$this->regis->updateData($group_regis);

						$insert=$this->setuju->save($data);
						if($insert=='Data Inserted Successfully'){
							$data_ujians = array();
							$dataregis=$this->regis->getPKREGIS($group_regis);
							foreach ($dataregis as $key) {
								$id_regis=$key->PK_REGIS_UJIAN;
								$data_ujian=$this->regis->data_detail_peserta(1,$id_regis);
								if($data_ujian[0]!='false'){
									$data_ujians=$this->regis->data_detail_notnull('1',$id_regis);
								}else{
									$data_ujians=$data_ujian;
								}

								foreach ($data_ujians as $key ) {
									// $nilai_ksp=ceil($key->NILAI_KSP*20/100);
									$data_insert = array('FK_REGIS_UJIAN' => $key->PK_REGIS_UJIAN,
																				'FK_MATA_AJAR'=>$key->PK_MATA_AJAR,
																				'NILAI_KSP'=>$key->NILAI_KSP,
																				'CREATED_BY' => $this->session->userdata('nip'),
																				'CREATED_DATE' => $datex);
										$inser_lookup=$this->lookup_ujian->save($data_insert);
								}

							}

							print json_encode(array("status"=>"success", "msg"=>'Data Berhasil disimpan'));
						}else{
							print json_encode(array("status"=>"error", "msg"=>'Gagal simpan data ke database'));
						}
					 }else{
						 $data['upload_error1'] = $uploadpdf['error'];
						 // $data['upload_error2'] = $uploadimg['error'];
						 print json_encode(array("status"=>'error','msg'=>'gagal upload'));
					 }

			 // }else{
				//  echo json_encode(array("status"=>'gagal'));
			 // }
		 }

}

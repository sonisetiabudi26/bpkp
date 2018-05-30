<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/provinsi','provinsi');
				$this->load->model('sertifikasi/jadwalujian','jadwal');
				$this->load->model('sertifikasi/regisujian','regis');
				$this->load->model('sertifikasi/persetujuan','setuju');
    }

    public function index()
    {
			$datenow=date('Y-m-d');
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/registrasi.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
				$data['provinsi']=$this->provinsi->_get_provinsi_information();
				//$data['daftar_peserta']=$this->regis->load($username);
				$data['jadwal']=$this->jadwal->_get_jadwal_information($datenow);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function search($nip){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$nip;
			$check=file_get_contents($url);
			$jsonResult=json_decode($check);
			$kodeunitkerja = $this->session->userdata('kodeunitkerja');
			if($jsonResult->message=='get_data_success' && $jsonResult->data[0]->UnitKerja_Kode==$kodeunitkerja){
				// $data['NIP'] = $jsonResult->data[0]->NIP;
				// $data['NamaLengkap'] = $jsonResult->data[0]->NamaLengkap;
				$output = array(
											 "nip" => $jsonResult->data[0]->Auditor_NIP,
											 "nama" => $jsonResult->data[0]->Auditor_NamaLengkap,
											 "ttl" => $jsonResult->data[0]->Auditor_TglLahir,
											 "pendidikan" => $jsonResult->data[0]->Pendidikan_Tingkat,
											 "unit" => $jsonResult->data[0]->UnitKerja_Nama,
											 "jabatan" => (!empty($jsonResult->data[0]->Jabatan_Nama)?$jsonResult->data[0]->Jabatan_Nama:'-'),
											 "jenjangjabatan" => $jsonResult->data[0]->JenjangJabatan_Nama,
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

		 public function loadData(){
			  $userAdmin=$this->session->userdata('logged_in');
			 	$data=$this->regis->load($userAdmin);
				//$this->load->view('sertifikasi/unit_apip/registrasi', $data);
				// $output = array(
				// 			 "nip" => $data[0]->Auditor_NIP,
				// 			 "nama" => $jsonResult->data[0]->Auditor_NamaLengkap,
				// 			 "no_surat" => $jsonResult->data[0]->Auditor_TglLahir,
				// 			 "tgl_ujian" => $jsonResult->data[0]->Pendidikan_Tingkat,
				// 			 // "unit" => $jsonResult->data[0]->UnitKerja_Nama,
				// 			 // "jabatan" => (!empty($jsonResult->data[0]->Jabatan_Nama)?$jsonResult->data[0]->Jabatan_Nama:'-'),
				// 			 // "jenjangjabatan" => $jsonResult->data[0]->JenjangJabatan_Nama,
				// 			 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 // "TanggalLahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 // "TempatLlahir" => $jsonResult->data[0]->TempatLlahir,
				// 			 );
			 //output to json format
			 echo json_encode($data);
				// $data['provinsi']=$this->provinsi->_get_provinsi_information();
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

		 public function do_upload_pdf($folder,$doc){
			 if (!is_dir('uploads/'.$folder)) {
				 mkdir('./uploads/'.$folder, 0777, TRUE);
			 }
			 $config['upload_path']          = './uploads/'.$folder.'/';
			 $config['allowed_types']        = 'pdf|png';
			 $config['max_size']             = 2048;
			 $config['max_width']            = 2048;
			 $config['max_height']           = 768;
			 $this->load->library('upload', $config);

				 if (! $this->upload->do_upload($doc)){
					 return array('result_upload_pdf' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
				 }else{
					 return array('result_upload_pdf' => 'success', 'file' => $this->upload->data(), 'error' => '');
				 }
		 }
		 public function do_upload_img($folder){
			 if (!is_dir('uploads/'.$folder)) {
				 mkdir('./uploads/'.$folder, 0777, TRUE);
			 }
			 $config2['upload_path']          = './uploads/'.$folder.'/';
			 $config2['allowed_types']        = 'png';
			 $config2['max_size']             = '100';
			 $config2['max_width']            = '1024';
		   $config2['max_height']           = '768';
			 $this->load->library('upload', $config2);

				 if (! $this->upload->do_upload('doc_foto')){
					 return array('result_upload_img' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
				 }else{
					 return array('result_upload_img' => 'success', 'file' => $this->upload->data(), 'error' => '');
				 }
		 }
		 public function add_persetujuan(){
			 $dates = date('ymdHis');
			 $timex= date('His');
			 $datex=date('Y-m-d');
			 // $nip=$this->input->post('nip');
			 // $dataCheckPeserta=$this->regis->loadbyNIP($nip);
			 // if(!$dataCheckPeserta){
			 	   // $group_regis=$this->session->userdata('group_regis');
					 $admin=$this->session->userdata('logged_in');
					 $group_regis=$this->session->userdata('kodeunitkerja').'_'.$dates;

					 $update=$this->regis->updateDataRegis($group_regis,$admin);
					 $folder='doc_setuju/'.$group_regis;

					 $docpersetujuan='doc_persetujuan';
					 // $docfoto='doc_foto';
					 $uploadpdf = $this->do_upload_pdf($folder,$docpersetujuan);
					 // $uploadimg = $this->do_upload_img($folder,$docfoto);
					 //$uploadimg = $this->do_upload_img($folder);
					 // $uploadpdf='';

					 // $group_regis='REGIS_'.$this->session->userdata('kodeunitkerja');
					 // $this->session->set_userdata('group_regis', $group_regis);
					 // $uploadpdf['result_upload_pdf']="success";
					 if($uploadpdf['result_upload_pdf'] == "success"){
						 $doc_persetujuan='doc_setuju/'.$group_regis.'_'.$dates.'/'.$_FILES['doc_persetujuan']['name'];
						 // $doc_foto='doc_registrasi/'.$folder.'/'.$_FILES['doc_foto']['name'];
						 $data = array(
				 			'GROUP_REGIS' => $group_regis,
						  'DOC_PERSETUJUAN' => $doc_persetujuan,
				 			'CREATED_AT' => $this->session->userdata('logged_in'),
							'CREATED_DATE' => $datex
				 		);


						$update=$this->regis->updateData($group_regis);
						$insert=$this->setuju->save($data);
						if($insert=='Data Inserted Successfully'){
							print json_encode(array("status"=>"success", "data"=>$insert));
						}else{
							print json_encode(array("status"=>"error", "data"=>$insert));
						}
					 }else{
						 $data['upload_error1'] = $uploadpdf['error'];
						 // $data['upload_error2'] = $uploadimg['error'];
					 }
					 echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
			 // }else{
				//  echo json_encode(array("status"=>'gagal'));
			 // }
		 }

}

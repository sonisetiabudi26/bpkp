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
		public function loadDataResi(){
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$userAdmin=$this->session->userdata('nip');
			$datas=$this->pengusul->loaddataResi($userAdmin);
			$a=1;
			$data = array();
			foreach ($datas->result() as $key) {
				$dataRow = array();
				$dataRow[]=$a;
				//$nama=$this->apiuser($key->NIP);
				$dataRow[]=$key->EKSPEDISI;
				$dataRow[]=$key->NO_RESI;
				$data[]=$dataRow;
				$a++;
			}
			$output = array(
				 "draw" => $draw,
				 "recordsTotal" => $datas->num_rows(),
				 "recordsFiltered" => $datas->num_rows(),
				 "data" => $data
			);

		 //output to json format
		 echo json_encode($output);
		}
		public function loadDatabelumlengkap(){
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$userAdmin=$this->session->userdata('nip');
			$datas=$this->pengusul->loadbelumlengkap($userAdmin);
			$a=1;
      $data = array();
			foreach ($datas->result() as $key) {
				$dataRow = array();
				$dataRow[]=$a;
				//$nama=$this->apiuser($key->NIP);
				$dataRow[]=$key->NAMA;
				$dataRow[]=$key->NIP;
				$dataRow[]=$key->DESC;
				$dataRow[]=$key->DESC_STATUS;
				$disable=($key->FK_STATUS_DOC=='2'?'style="display:none"':'');
				$url=base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/vw_upload_doc_belum_lengkap/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
				$dataRow[]="<td><button onclick='getModal(this)' $disable id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
						<span>Unggah Dokumen</span></button><button onclick='remove(".$key->PK_PENGUSUL_PENGANGKATAN.")' class='btn btn-danger'>Hapus</button></td>";
				$data[]=$dataRow;
				$a++;
			}
			$output = array(
				 "draw" => $draw,
				 "recordsTotal" => $datas->num_rows(),
				 "recordsFiltered" => $datas->num_rows(),
				 "data" => $data
			);
		 //output to json format
		 echo json_encode($output);
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
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
	 		$userAdmin=$this->session->userdata('nip');
	 		$datas=$this->pengusul->load($userAdmin);
			$a=1;
			$data = array();
			foreach ($datas->result() as $key) {
				$dataRow = array();
				$dataRow[]=$a;
				//$nama=$this->apiuser($key->NIP);
				$dataRow[]=$key->NAMA;
				$dataRow[]=$key->NIP;
				$dataRow[]=$key->DESC;
				$dataRow[]=$key->DESC_STATUS;
				$disable=($key->FK_STATUS_DOC=='2'?'style="display:none"':'');
				$url=base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
				$dataRow[]="<td><button onclick='getModal(this)' $disable id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
						<span>Unggah Dokumen</span></button><button onclick='remove(".$key->PK_PENGUSUL_PENGANGKATAN.")' class='btn btn-danger'>Hapus</button></td>";
				$data[]=$dataRow;
				$a++;
			}
			$output = array(
				 "draw" => $draw,
				 "recordsTotal" => $datas->num_rows(),
				 "recordsFiltered" => $datas->num_rows(),
				 "data" => $data
			);
	 	 //output to json format
	 	 echo json_encode($output);

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
		public function vw_upload_doc_belum_lengkap($param){

			$parameter=explode('~',$param);
			$data['desc']=$parameter[0];
			$data['id_pengusul']=$parameter[1];
			$data['nip']=$parameter[2];

			$dataAll=$this->pengusul->getFormatDocument_belumlengkap($parameter[1],$parameter[0],$parameter[2]);
			if($dataAll!='error_sql'){
				foreach ($dataAll as $key) {
					$datarow[]=$key->FILE_NAMA_DOC;
				}
				$data['file_format']=$datarow;
			}
			$this->load->view('sertifikasi/unit_apip/content/modal_upload_pengusulan_data_belum_lengkap',$data);
			// echo 'asd';
		}

		public function upload_submit(){
				$desc = $this->input->post('desc');
				$id_pengusul = $this->input->post('id_pengusul');
				$nip = $this->input->post('nip');
				$total = $this->input->post('count_format');
				$datex=date('Y-m-d');
				$folder='doc_pengangkatan/'.$desc.'_'.$nip;
				$data = array('category' => $desc,
							'id_pengusul' => $id_pengusul,
							'created_by' => $this->session->userdata('nip'),
							'created_date' => $datex
							);


				$uploadpdf = $this->do_upload_pdf($folder,$total,$data,$desc);
				if($uploadpdf=='success'){
						$output = array('status' =>'success' ,'msg'=>'Berhasil');
				}else{
					 $output = array('status' =>'error' ,'msg'=>$uploadpdf);
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
								'DOC_SURAT_PENGUSULAN'=>str_replace(' ','_',$doc_loc),
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
			//$array_length = count($doc);
			$no=0;
			for ($i=1; $i <= $doc; $i++) {
					if (!is_dir('uploads/'.$folder)) {
						mkdir('./uploads/'.$folder, 0777, TRUE);
					}
					$config['upload_path']          = './uploads/'.$folder.'/';
					$config['allowed_types']        = 'pdf';
					$config['max_size']             = 2048;
					$config['max_width']            = 2048;
					$config['max_height']           = 768;
					$this->load->library('upload', $config);
					$dokumen='file_'.$i;
						if (! $this->upload->do_upload($dokumen)){
							$output= array('result_upload_pdf' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
						}else{
							$doc_loc=$folder.'/'.$_FILES[$dokumen]['name'];
							$datas = array(
							 'STATUS_DOC' => '',
							 'CATEGORY_DOC' => $data['category'],
							 'DOC_PENGUSULAN_PENGANGKATAN' => $dokumen,
							 'DATA_DOC' => str_replace(' ','_',$doc_loc),
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
				if($doc==$no){
				$where=array(
					'PK_PENGUSUL_PENGANGKATAN'=>$data['id_pengusul'],

				);
				$data_update=array(
					'FK_STATUS_DOC'=>'2'
				);

						 $update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);
						 return 'success';

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

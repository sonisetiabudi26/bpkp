<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
define('DOMPDF_ENABLE_AUTOLOAD', false);
// require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

class ManagementPertek extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
				$this->load->helper('file');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
				$this->load->model('sertifikasi/Pertek','pertek');
				$this->load->helper(array('url','download'));
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='fasilitas/ManagementPertek.php';
        $data['username']=$username;
        $data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function apiuser($param){
			$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$param;
			$check=file_get_contents($url);
			$jsonResult=json_decode($check);
			return $jsonResult;
		}
		public function vw_create_pertek($param){

			$datas=$this->pertek->getdatabyid($param);
			foreach ($datas as $key) {
				$data['id_pertek']=$key->PK_PERTEK;
				$data['nosurat']=$key->NO_SURAT;
				$data['data_doc']=($key->DOC_PERTEK==''?'0':'1');
			}
			$this->load->view('sertifikasi/fasilitas/content/modal_view_pertek',$data);

		}
		public function vw_show_angker($param){

			$datas=$this->pertek->getdatabyid($param);
			foreach ($datas as $key) {
				$data['id_pertek']=$key->PK_PERTEK;
				$data['nosurat']=$key->NO_SURAT;
				$data['data_doc']=($key->DOC_ANGKER==''?'0':'1');
			}
			$this->load->view('sertifikasi/fasilitas/content/modal_angker',$data);

		}
		public function create_pertek(){

			$data['datex']=date('Y F d');
			$data['dates']=date('Y-m-d');

			$data['no_pertek']=$this->input->post('nopertek');
			$data['id_pertek']=$this->input->post('id_pertek');
		  $data['yth']=$this->input->post('yth');
			$data['isi']=$this->input->post('body_pertek');
			$data['tempat']=$this->input->post('tempat');
			$data['kepala']=$this->input->post('kepala');
			$data['tembusan']=$this->input->post('tembusan');
			$data['nosurat']=$this->input->post('no_surat');
			$apiuser=$this->apiuser($this->input->post('kepala'));
			$jadwal_mulai = explode('-',$data['dates']);
			$months = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
			for ($i=1; $i < 13 ; $i++) {
				if($i==$jadwal_mulai[1]){
					$data['periode']=$months[$i].' '.$jadwal_mulai[0];
				}
			}

			if($apiuser->message!='auditor_not_found'){
				$data['nama'] = $apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
			}else{
				$data['nama']='unnamed';
			}
			$data['tembusan_surat']=explode(',',$data['tembusan']);
			// $where=array(
			// 	'PK_PERTEK'=>$data['id_pertek'],
			// );
			$data_insert=array(
				'FK_PERTEK'=>$data['id_pertek'],
				'NO_PERTEK'=>$data['no_pertek'],
				'YTH'=>$data['yth'],
				'ISI'=>$data['isi'],
				'TEMPAT'=>$data['tempat'],
				'KEPALA'=>$data['kepala'],
				'TEMBUSAN'=>$data['tembusan'],

			);
			$insert_detail_pertek=$this->pertek->save_pertek_detail($data_insert,'detail_pertek');
			if($insert_detail_pertek=='Data Inserted Successfully'){

			$data_pengusul=$this->pengusul->total_pengusul_by_id($data['id_pertek']);
			if($data_pengusul->qualified==$data_pengusul->total){
			$data_auditor=$this->pengusul->detail_data($data['nosurat']);

				$data['status_pengusulan']=$data_auditor[0]->DESC;
				$data['unitapip']=$data_auditor[0]->UNITKERJA;
				$no_file=str_replace('/','',$this->input->post('no_surat'));
				$namafile='pertek_'.$no_file;
				$dompdf = new Dompdf\Dompdf();
				//$datapertek['data']=$this->pertek->datapertek();
		  	$html = $this->load->view('sertifikasi/doc_pdf/pertek',$data,true);

				 $dompdf->loadHtml($html);

				 // (Optional) Setup the paper size and orientation
				 $dompdf->setPaper('A4', 'portrait');

				 // Render the HTML as PDF
				 $dompdf->render();

				 // Get the generated PDF file contents
				 $pdf = $dompdf->output();
				 if($this->input->post('doc')=='0'){
						 if (!is_dir('uploads/doc_pertek/')) {
							 	mkdir('./uploads/doc_pertek/', 0777, TRUE);
						 }
						 if ( ! write_file(FCPATH."/uploads/doc_pertek/".str_replace(' ','_',$namafile).".pdf", $pdf))
						 {
							 		 $output = array('msg' => 'error' , 'value'=>'Unable to write the file');
						 }
						 else
						 {
									 $where=array(
										 'FK_PERTEK'=>$data['id_pertek'],
									 );
									 $data_update=array(
										 'DOC_PERTEK'=>base_url()."uploads/doc_pertek/".str_replace(' ','_',$namafile).".pdf",
										 'PERTEK_DATE'=>$data['dates'],
										 'ISI'=>$data['isi'],
										 'NO_PERTEK'=>$data['no_pertek'],
										 // 'CREATED_BY'=> $this->session->userdata('nip'),
										 // 'CREATED_DATE'=> $data['dates']
									 );
									 $update=$this->pertek->updateData($where,'detail_pertek',$data_update);
						 }
						 $output = array('status' => 'success' , 'msg' => "Data berhasil disimpan");
					 }
			 }else{
				$output = array('status' => 'error' , 'msg' => "Data gagal disimpan");
			 }
		 }else{
			  $output = array('status' => 'error' , 'msg' => "Data gagal disimpan");
		 }
		 print json_encode($output);
		 }
		 public function create_angker(){

			 $data['datex']=date('Y F d');
			 $data['dates']=date('Y-m-d');
			 $data['year']=date('Y');

			 $data['id_pertek']=$this->input->post('id_pertek');

			 $data['kepala']=$this->input->post('kepala');
			 $data['jabatan']=$this->input->post('jabatan');
			 $data['nosurat']=$this->input->post('no_surat');
			 // $data['tanggal']=
			 $jadwal_mulai = explode('-',$data['dates']);
			 $months = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
			 for ($i=1; $i < 13 ; $i++) {
				 if($i==$jadwal_mulai[1]){
					 $data['tanggal']=$months[$i].' '.$jadwal_mulai[0];
				 }
			 }
			 $data_isi=$this->pertek->loadAngker($data['id_pertek']);
			 foreach ($data_isi as $keys) {
				  $apiuser=$this->apiuser($keys->NIP);
				 if($apiuser->message!='auditor_not_found'){
					$tmtkepangkatan = $apiuser->data[0]->Pangkat_TglMulaiTugas;
					$pangkat= $apiuser->data[0]->Pangkat_TglMulaiTugas;
					$golongan= $apiuser->data[0]->Golongan_Kode;
					$jabatan= $apiuser->data[0]->Jabatan_Nama;
					$nama= $apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
				}else{
					$tmtkepangkatan='-';
					$pangkat='-';
					$golongan='-';
					$jabatan='-';
					$nama='-';
				}
			 	$datarow[] = array('nama' => $nama,
			 											'nip' =>$keys->NIP,
														'pangkat'=>$pangkat,
														'golongan'=>$golongan,
														'tmtkepangkatan'=>$tmtkepangkatan,
														'jabatan'=>$jabatan,
														'pendidikan_sekolah'=>$keys->PENDIDIKAN_SEKOLAH,
														'diklat'=>$keys->DIKLAT,
														'pengawasan'=>$keys->PENGAWASAN,
														'pengembangan'=>$keys->PENGEMBANGAN_PROFESI,
														'penunjang'=>$keys->PENUNJANG,
														'jumlah'=>$keys->JUMLAH
														);
			 }
			 $data['isi']=$datarow;
			 $apiuser=$this->apiuser($this->input->post('kepala'));
			 if($apiuser->message!='auditor_not_found'){
				 $data['nama'] = $apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
			 }else{
				 $data['nama']='unnamed';
			 }
			// $data['tembusan_surat']=explode(',',$data['tembusan']);
			 // $where=array(
			 // 	'PK_PERTEK'=>$data['id_pertek'],
			 // );
			 $data_insert=array(
				 'FK_PERTEK'=>$data['id_pertek'],
				 'SURAT_NOMOR'=>$data['nosurat'],
				 'TANGGAL'=>$data['datex'],
				 'KEPALA'=>$data['jabatan'],
				 'NIP_KEPALA'=>$data['kepala'],
			 );
			 $insert_detail_pertek=$this->pertek->save_pertek_detail($data_insert,'detail_angka_kredit');
			 if($insert_detail_pertek=='Data Inserted Successfully'){

			 $data_pengusul=$this->pengusul->total_pengusul_by_id($data['id_pertek']);
			 if($data_pengusul->qualified==$data_pengusul->total){
			 $data_auditor=$this->pengusul->detail_data($this->input->post('nosurat'));

				 $data['status_pengusulan']=$data_auditor[0]->DESC;
				 $data['unitapip']=$data_auditor[0]->UNITKERJA;
				// $no_file=str_replace('/','',$this->input->post('no_surat'));
				 $namafile='angker'.$data['id_pertek'];
				 $dompdf = new Dompdf\Dompdf();
				 //$datapertek['data']=$this->pertek->datapertek();
				 $html = $this->load->view('sertifikasi/doc_pdf/angker',$data,true);

					$dompdf->loadHtml($html);

					// (Optional) Setup the paper size and orientation
					$dompdf->setPaper('A4', 'landscape');

					// Render the HTML as PDF
					$dompdf->render();

					// Get the generated PDF file contents
					$pdf = $dompdf->output();
					if($this->input->post('doc')=='0'){
							if (!is_dir('uploads/doc_angker/')) {
								 mkdir('./uploads/doc_angker/', 0777, TRUE);
							}
							if ( ! write_file(FCPATH."/uploads/doc_angker/".str_replace(' ','_',$namafile).".pdf", $pdf))
							{
										$output = array('msg' => 'error' , 'value'=>'Unable to write the file');
							}
							else
							{
										$where=array(
											'FK_PERTEK'=>$data['id_pertek'],
										);
										$data_update=array(
											'DOC_ANGKER'=>base_url()."uploads/doc_angker/".str_replace(' ','_',$namafile).".pdf",
											// 'CREATED_BY'=> $this->session->userdata('nip'),
											// 'CREATED_DATE'=> $data['dates']
										);
										$update=$this->pertek->updateData($where,'detail_angka_kredit',$data_update);
							}
							$output = array('status' => 'success' , 'msg' => "Data berhasil disimpan");
						}
				}else{
				 $output = array('status' => 'error' , 'msg' => "Data gagal disimpan");
				}
			}else{
				 $output = array('status' => 'error' , 'msg' => "Data gagal disimpan");
			}
			print json_encode($output);
			}

    public function delete(){
        $data=$this->pusbin->delete_product();
        echo json_encode($data);
    }
		public function vw_create_resi($param){
			$datas=$this->pertek->getdatabyid($param);
			foreach ($datas as $key) {
				$data['id_pertek']=$key->PK_PERTEK;
				$data['nosurat']=$key->NO_SURAT;
				// $data['data_doc']=($key->DOC_ANGKER==''?'0':'1');
			}
			$this->load->view('sertifikasi/fasilitas/content/noresi',$data);
		}
		public function create_resi(){
			$data['id_pertek']=$this->input->post('id_pertek');
			$data['noresi']=$this->input->post('no_resi');
			$data['nosurat']=$this->input->post('no_surat');
			$where=array(
				'PK_PERTEK'=>$data['id_pertek'],
			);
			$data_update=array(
				'NO_RESI'=>$data['noresi'],
				// 'CREATED_BY'=> $this->session->userdata('nip'),
				// 'CREATED_DATE'=> $data['dates']
			);
			$update=$this->pertek->updateData($where,'pertek',$data_update);
			$output = array('status' => 'success' , 'msg' => "Data berhasil disimpan");
			echo json_encode($output);
		}
    public function loadData(){
			 $nip = $this->session->userdata('logged_nip');
       $datas=$this->pertek->view($nip);
         $data = array();
          $a=1;
       foreach ($datas as $key) {
				  $data_pengusul=$this->pengusul->total_pengusul($key->NO_SURAT);
          $dataRow = array();
          $dataRow[]=$a;
          $dataRow[]=$key->NO_SURAT;
          $dataRow[]=$key->DOC_PERTEK;
          $dataRow[]=$key->DOC_ANGKER;
          $dataRow[]=$key->NO_RESI;
					$dataRow[]=$data_pengusul->qualified.'/'.$data_pengusul->total;

					$viewpertek=($key->DOC_PERTEK!=''?'1':'0');
					$param=$key->PK_PERTEK;
        //  $url=base_url('sertifikasi')."/fasilitas/ManagementPertek/create_pertek/".$param;
	         $url_angker=base_url('sertifikasi')."/fasilitas/ManagementPertek/vw_show_angker/".$key->PK_PERTEK;
					 $url_create=base_url('sertifikasi')."/fasilitas/ManagementPertek/vw_create_pertek/".$param;
					 $url_resi=base_url('sertifikasi')."/fasilitas/ManagementPertek/vw_create_resi/".$param;
					 $url_view=$key->DOC_PERTEK;
					 $url_view_angker=$key->DOC_ANGKER;
					 $create="id='btn-pertek-doc' onclick='getModal(this)' data-href='".$url_create."' data-toggle='modal' data-target='#modal-content' class='btn btn-sm btn-primary'";
					 $view="id='btn-pertek_view-doc'  href='".$url_view."' target='_blank' class='btn btn-sm btn-primary'";

					 $create_angker="id='btn-angker-doc' onclick='getModal(this)' data-href='".$url_angker."' data-toggle='modal' data-target='#modal-content' class='btn btn-sm btn-success'";
				   $view_angker="id='btn-angker_view-doc'  href='".$url_view_angker."' target='_blank' class='btn btn-sm btn-success'";

					 $url= ($key->DOC_PERTEK==""? $create:$view);
					 $url2= ($key->DOC_ANGKER==""? $create_angker:$view_angker);

	         $namapertek=($key->DOC_PERTEK==''?'Create DOC PERTEK':'View DOC PERTEK');
	         $namaangker=($key->DOC_ANGKER==''?'Create DOC Angka Kredit':'View DOC Angka Kredit');
	         $resi=($key->NO_RESI==''?'Input No Resi':'Update No Resi');
					 $styledisable='style="display:none"';
					 $disable=($key->DOC_ANGKER==''||$key->DOC_PERTEK==''?$styledisable:"");

	         $dataRow[]='<td><a '.$url.' >
             '.$namapertek.'</a>
						 <a '.$url2.' >
               '.$namaangker.'</a>
             <a onclick="getModal(this)" id="btn-resi-doc" '.$disable.' data-href="'.$url_resi.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-warning">
                 '.$resi.'</a></td>';
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
}
  ?>

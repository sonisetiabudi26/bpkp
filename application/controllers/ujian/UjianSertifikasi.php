<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianSertifikasi extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
		    $this->load->helper(array('form', 'url'));
				$this->load->model('sertifikasi/soalujian','soalujian');
				$this->load->model('sertifikasi/regisujian','regis');
				$this->load->model('sertifikasi/lookupujian','lookup_ujian');
				$this->load->model('sertifikasi/event','event');
				$this->load->model('sertifikasi/konfigujian','konfig');
				$this->load->model('sertifikasi/JawabanPeserta','jawaban');
    }

    public function index()
    {
		$logged_nip = $this->session->userdata('logged_nip');
		if(isset($logged_nip)){
			$data['title_page'] = 'BPKP Web Application';
			$data['nama_auditor'] = $this->session->userdata('logged_in');
			$data['nip_auditor'] = $logged_nip;
			$data['content_page']='list_ujian';
			$dataProfile=$this->regis->get_profile($logged_nip);
			foreach ($dataProfile as $key) {
				if($key->DOC_NAMA=='doc_foto'){
					$data['foto_profile']=$key->DOCUMENT;
				}
			}
			$this->load->view('ujian/content', $data);
		}else{
			redirect('ujian-sertifikasi-jfa');
		}
	}
	public function indexUjian($fk_mata_ajar)
	{
	$logged_nip = $this->session->userdata('logged_nip');
	if(isset($logged_nip)){
		$dataProfile=$this->regis->get_profile($logged_nip);
		foreach ($dataProfile as $key) {
			if($key->DOC_NAMA=='doc_foto'){
				$data['foto_profile']=$key->DOCUMENT;
			}
		}
		$data['title_page'] = 'BPKP Web Application';
		$data['nama_auditor'] = $this->session->userdata('logged_in');
		$data['nip_auditor'] = $logged_nip;
		$parameter=explode('~',$fk_mata_ajar);
		$bab_mata_ajar=$parameter[0];
		$fk_jawaban_detail=$parameter[1];
		$data['nama_mata_ajar']=$parameter[2];
		$datajawaban=$this->jawaban->getPin($fk_jawaban_detail);
		if($datajawaban!='no data'){
			$dataconfig=$this->konfig->getConfig($datajawaban->PIN);
			$data['start_time']=$dataconfig->START_TIME;
			$data['end_time']=$dataconfig->END_TIME;
			$data['jml_soal']=$dataconfig->JUMLAH_SOAL;
			$data['dates']=$dataconfig->DATE_TIME;

		}
		$data['soal'] = $this->random_distribusi_ujian($bab_mata_ajar,$dataconfig->JUMLAH_SOAL);
		$data['content_page']='ujian_sertifikasi';
		$this->load->view('ujian/content', $data);
		//var_dump($this->random_distribusi_ujian());
	}else{
		redirect('ujian-sertifikasi-jfa');
	}
}
	public function loadListUjian(){
		$list = $this->lookup_ujian->get_data($this->session->userdata('logged_nip'));
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {
            $no++;
            $row = array();
						$row[] =$no;
						$row[] = $rows->NAMA_MATA_AJAR;
						$dataEvent=$this->event->getDataPKEvent($rows->KODE_DIKLAT,$rows->PROVINSI);
						$checkpin=$this->lookup_ujian->checkpinujian($rows->FK_REGIS_UJIAN,$rows->FK_MATA_AJAR);
						$disable=($checkpin!='no data'?'style="display:none;"':"");
						$enable=($checkpin=='no data'?'style="display:none;"':"");
						$dataSoal=$this->soalujian->checkSoalCount($rows->FK_MATA_AJAR);
						if($dataSoal->jml_soal!=0){
							$soalData='style="display:none;color:#f00"';
						}else{
							if($disable=='style="display:none;"'){
								$soalData='style="color:#f00"';
							}else{
								$soalData='style="display:none;color:#f00"';
							}
						}
            $row[] = '<div style="text-align:center;">
						<a data-var="pk_ujian_soal" '.$disable.' data-id='.$rows->PK_REGIS_UJIAN.' class="btn btn-sm btn-success"
						onclick="getModalWithParam(this)" id="btn-ujian-soal"
						data-href="'. base_url('ujian')."/ujiansertifikasi/vw_masukan_pin/".$rows->FK_MATA_AJAR.'" data-toggle="modal" data-target="#modal-content">
						<i class="fa fa-pencil"></i> Masukan Pin</a>
						<a '.$enable.' class="btn btn-sm btn-primary" href="'. base_url('ujian')."/ujiansertifikasi/indexUjian/".$rows->FK_MATA_AJAR.'~'.($checkpin=='no data'?'':$checkpin->FK_JAWABAN_DETAIL).'~'.$rows->NAMA_MATA_AJAR.'">
						<i class="fa fa-paper-plane"></i> Ikuti Ujian</a>
						<span '.$soalData.'>Soal Ujian Belum Tersedia</span></div>';

            $data[] = $row;
        }

        $output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $no,
					"recordsFiltered" => $no,
					"data" => $data,
                );
        echo json_encode($output);
	}
	public function vw_masukan_pin($fk_mata_ajar){
	  $data['pk_regis']	= $this->input->post('pk_ujian_soal');
		$data['fk_mata_ajar']	= $fk_mata_ajar;
		// $data['kodediklat']	= $this->groupmataajar->getalldatakodediklat_mataajar_byId($id);
		$this->load->view('ujian/content/add_pin',$data);
	}
 public function add_pin(){
	 $datex=date('Y-m-d');
	 $pin=$this->input->post('pin');
	 $pk_regis=$this->input->post('pk_regis');
	 $fk_mata_ajar=$this->input->post('fk_mata_ajar');
	 $dataRegis=$this->regis->getdatakdDiklatandProvinsi($pk_regis);
	 $dataEvent=$this->event->getDataPKEvent($dataRegis->KODE_DIKLAT,$dataRegis->PROVINSI);
	 $dataKonfig=$this->konfig->CheckPin($pin,$dataEvent->PK_EVENT,$fk_mata_ajar);
	 if($dataKonfig=='1'){
		 $apiuser=$this->apiuser($this->session->userdata('logged_nip'));
		 if($apiuser->message=='get_data_success'){
		 $kodeunitkerja = $apiuser->data[0]->UnitKerja_Kode;
	 	}
		$datapeserta = array('FK_EVENT' => $dataEvent->PK_EVENT,
	 											'KODE_PESERTA'=>$this->session->userdata('logged_nip'),
												'TGL_UJIAN'=>$datex,
												'KODE_UNIT'=>$kodeunitkerja,
												'KELAS'=>'Online',
												'PIN'=>$pin,
												'CREATED_DATE'=>$datex,
												'CREATED_BY'=>$this->session->userdata('logged_nip'),
											);
		$insert=$this->jawaban->addSoal($datapeserta);
		if($insert!='Data Inserted Failed'){
			$datawhere = array('FK_REGIS_UJIAN' => $pk_regis,
		 											'FK_MATA_AJAR'=>$fk_mata_ajar,

												);
			$data = array('FK_JAWABAN_DETAIL' => $insert,
												);
			$update=$this->jawaban->updateData($datawhere,'lookup_ujian',$data);
			$output = array(
										 "status" => "success",
										 "msg" => "Data berhasil Disimpan",
						 );
		}else{
			$output = array(
										 "status" => "error",
										 "msg" => "Data gagal Disimpan",
						 );
		}
	}else{
		$output = array(
									 "status" => "error",
									 "msg" => "PIN tidak terdaftar",
					 );
	}
	 print json_encode($output);

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
	public function random_distribusi_ujian($fk_mata_ajar,$jml_soal){


		$pilihan = 'PILIHAN_';
		$list = $this->soalujian->_get_ready_soal_ujian($fk_mata_ajar,$jml_soal);
        $data = array();
        foreach ($list as $soal) {
			/** Create array untuk menampung data random */
			$soal_ujian = array();

			/** TODO: Get column pilihan benar(jawaban) */
			$index_pilihan = "PILIHAN";
			$field_col = $pilihan.$soal->JAWABAN;
			$soal_ujian[]=array(
				$index_pilihan => array("column" => $field_col, "value" => $soal->JAWABAN, "descr" => $soal->$field_col)
			);

			/** TODO: Get data random for all COLUMN  index pilihan */
			$input = range(1, 4);
			unset($input[($soal->JAWABAN)-1]);
			$pilihan_keys = array_rand($input, 3);
			foreach($pilihan_keys as $pilihan_key){
				$field_col2 = $pilihan.($pilihan_key + 1);
				$soal_ujian[] = array(
					$index_pilihan => array(
						"column" => $field_col2,
						"value" => $pilihan_key + 1,
						"descr" => $soal->$field_col2
					)
				);
			}
			/** Random ulang fix data pilihan ready ujian for A, B, C, D */
			shuffle($soal_ujian);

			/** Add other column */
			$soal_ujian[] = $soal->PK_SOAL_UJIAN;
			$soal_ujian[] = $soal->PERTANYAAN;
			$soal_ujian[] = $soal->SOAL_KASUS;

			/** add data loop to array data untuk dikirim parameter ketampilan ujian */
			array_push($data,$soal_ujian);
		}
		// array_push($data,$datakonfig);
		return $data;
	}
}

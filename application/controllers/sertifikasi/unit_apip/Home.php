<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
define('DOMPDF_ENABLE_AUTOLOAD', false);

class Home extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/RegisUjian','regisujian');
				$this->load->model('sertifikasi/PengusulPengangkatan','pengusul');

    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');
			$nip = $this->session->userdata('nip');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/homepage.php';
        $data['username']=$username;
				$datas=$this->regisujian->loadDatabyNIP2($nip);
				$data_pengusul_pertama=$this->pengusul->loadDataPengusulan('1',$nip);
				$data_pengusul_perpindahan=$this->pengusul->loadDataPengusulan('2',$nip);
				$data_pengusul_inpassing=$this->pengusul->loadDataPengusulan('3',$nip);
				$data_pengusul_kembali=$this->pengusul->loadDataPengusulan('4',$nip);
				$data_dokumen_belum_lengkap=$this->pengusul->loadbelumlengkap($nip);
				$data['ikut_ujian']=$datas->num_rows();
				$data['inpassing']=$data_pengusul_inpassing->num_rows();
				$data['kembali']=$data_pengusul_kembali->num_rows();
				$data['perpindahan']=$data_pengusul_perpindahan->num_rows();
				$data['pertama']=$data_pengusul_pertama->num_rows();
				$data['dokumen_belum_lengkap']=$data_dokumen_belum_lengkap->num_rows();

				getMenuAccessPage($data, $fk_lookup_menu);
      }else{
        redirect('/');
      }
    }
		public function print_kartu($pk){
			// $id=$this->input->post('pk_permintaan_soal');
			$namafile='kartu_ujian_'.$pk;
			$dompdf_option = new \Dompdf\Options();
	    $dompdf_option->setIsFontSubsettingEnabled(true);
	    $dompdf_option->setIsRemoteEnabled(true);
	    $dompdf_option->setIsHtml5ParserEnabled(true);
	    // $dompdf->setOptions($dompdf_option);
			$dompdf = new Dompdf\Dompdf($dompdf_option);
			$data_identitas=$this->regisujian->getDatabypk($pk);
			foreach ($data_identitas as $key) {
				$data['nip']=$key->NIP;
				$data['lokasi']=$key->Prov;
				$data['kode_diklat']=$key->KODE_DIKLAT.' - '.$key->NAMA_JENJANG;
				$data['nama'] = $key->NAMA;
				$jadwal_mulai = explode('/',$key->START_DATE);
				$months = array(1 => 'JANUARI', 2 => 'FEBRUARI', 3 => 'MARET', 4 => 'APRIL', 5 => 'MEI', 6 => 'JUNI', 7 => 'JULI', 8 => 'AGUSTUS', 9 => 'SEPTEMBER', 10 => 'OKTOBER', 11 => 'NOVEMBER', 12 => 'DESEMBER');
				for ($i=1; $i < 13 ; $i++) {
					if($i==$jadwal_mulai[0]){
						$data['periode']=$months[$i].' '.$jadwal_mulai[2];
					}
				}
				$apiuser=$this->apiuser($key->NIP);
				if($apiuser->message!='auditor_not_found' ){
					$data['unit'] = $apiuser->data[0]->UnitKerja_Nama;
					$data['kode_unit'] = $apiuser->data[0]->UnitKerja_Kode;
				}else{
					$data['unit'] = 'unkonown';
					$data['kode_unit'] = 'unkonown';
				}

				//$dataRow['unitapip']=$kodeunitkerja;
				if($key->DOC_NAMA=='doc_foto'){
					$data['foto']=$key->DOCUMENT;
				}

			}
			$data_detail=$this->regisujian->data_detail_peserta('1',$pk);
			if($data_detail[0]!='false'){
				$data['data_detail']=$this->regisujian->data_detail_notnull('1',$pk);
			}else{
				$data['data_detail']=$data_detail;
			}
			// foreach ($datasoal as $key) {
			//
			// }
			// print_r($data);
			$html = $this->load->view('sertifikasi/doc_pdf/kartu_ujian',$data,true);

			 $dompdf->loadHtml($html);

			 // (Optional) Setup the paper size and orientation
			 $dompdf->setPaper('A4', 'portrait');

			 // Render the HTML as PDF
			 $dompdf->render();
			 // echo $data['foto'];
			 // Get the generated PDF file contents
			 $pdf = $dompdf->output();
			 $dompdf->stream($namafile);
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
			$nip = $this->session->userdata('nip');
			$datas=$this->regisujian->loadDatabyNIP2($nip);
			$data = array();
			//$no = $_POST['start'];
			$a=1;

				foreach ($datas->result() as $field) {
						$row = array();
						$row[] = $a;
						$row[] = $field->NIP;
						$apiuser=$this->apiuser($field->NIP);
						if($apiuser->message!='auditor_not_found' ){
		        $kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
		        //$dataRow['unitapip']=$kodeunitkerja;
						$row[] = $apiuser->data[0]->Auditor_NamaLengkap;
						}else{
						$kodeunitkerja='unknown';
						$row[] ='unknown';
						}
						$row[] = $field->KODE_DIKLAT.' - '.$field->NAMA_JENJANG;
						$row[] = $kodeunitkerja;

						$row[] = '<a class="btn btn-sm btn-success" href="'. base_url('sertifikasi')."/unit_apip/Home/print_kartu/".$field->PK_REGIS_UJIAN.'" style="width:100%" ><i class="glyphicon glyphicon-print"></i> Cetak</a>';

						$data[] = $row;
						$a++;
				}


			$output = array(
				 "draw" => $draw,
				 "recordsTotal" => $datas->num_rows(),
				 "recordsFiltered" => $datas->num_rows(),
				 "data" => $data
			);
			//output dalam format JSON
			echo json_encode($output);
		}

}

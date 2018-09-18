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
				$data['nip']=$nip;

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
				$data['kode_diklat']=$key->KODE_DIKLAT.' - '.$key->NAMA_JENJANG;
				$apiuser=$this->apiuser($key->NIP);
				$data['unit'] = $apiuser->data[0]->UnitKerja_Nama;
				//$dataRow['unitapip']=$kodeunitkerja;
				if($key->DOC_NAMA=='doc_foto'){
					$data['foto']=$key->DOCUMENT;
				}
				$data['nama'] = $apiuser->data[0]->Auditor_NamaLengkap;
				$data['kode_unit'] = $apiuser->data[0]->UnitKerja_Kode;
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
			$datas=$this->regisujian->loadUjian();
			$data = array();
			//$no = $_POST['start'];
			$a=1;

				foreach ($datas as $field) {
						$row = array();
						$row[] = $a;
						$row[] = $field->NIP;
						$apiuser=$this->apiuser($field->NIP);
		        $kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
		        //$dataRow['unitapip']=$kodeunitkerja;
						$row[] = $apiuser->data[0]->Auditor_NamaLengkap;
						$row[] = $field->KODE_DIKLAT.' - '.$field->NAMA_JENJANG;
						$row[] = $kodeunitkerja;

						$row[] = '<a class="btn btn-sm btn-success" href="'. base_url('sertifikasi')."/unit_apip/Home/print_kartu/".$field->PK_REGIS_UJIAN.'" style="width:100%" ><i class="glyphicon glyphicon-print"></i> Cetak</a>';

						$data[] = $row;
						$a++;
				}


			$output = array(
					"draw" => 'dataEvent',
					"recordsTotal" => $a,
					"recordsFiltered" => $a,
					"data" => $data,
			);
			//output dalam format JSON
			echo json_encode($output);
		}

}

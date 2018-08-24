<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/homepage.php';
        $data['username']=$username;

				getMenuAccessPage($data, $fk_lookup_menu);
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
						$row[] = $field->KODE_DIKLAT;
						$row[] = $kodeunitkerja;

						$row[] = '<a class="btn btn-sm btn-success" onclick="cetak();" style="width:100%" ><i class="glyphicon glyphicon-print"></i> Cetak</a>';

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

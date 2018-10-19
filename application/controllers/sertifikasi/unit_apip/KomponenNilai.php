<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KomponenNilai extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/LookupUjian','lookup_ujian');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');
			$nip = $this->session->userdata('nip');
      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='unit_apip/komponen_nilai.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function loadData(){
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$userAdmin=$this->session->userdata('nip');
			$dataRows = array();
			$nip = $this->session->userdata('nip');
			$dataAll=$this->lookup_ujian->getDataNilaibyunitapip($nip);
			foreach ($dataAll->result() as $key) {
				$data=array();
				$data[]=$key->NIP;
				$apiuser=$this->apiuser($key->NIP);
				if($apiuser->message!='auditor_not_found' ){
				$data[] = $apiuser->data[0]->Auditor_GelarDepan.' '.$apiuser->data[0]->Auditor_NamaLengkap.', '.$apiuser->data[0]->Auditor_GelarBelakang;
				// $data['kodeunitkerja']=$apiuser->data[0]->NamaUnitKerja;
				}else{
					$data[] ='unknown';
					// $data['kodeunitkerja']='empty';
				}
				$data[]=$key->NAMA_MATA_AJAR;
				$data[]=$key->STATUS;
				$dataRows[]=$data;
			}
			$output = array(
				 "draw" => $draw,
				 "recordsTotal" => $dataAll->num_rows(),
				 "recordsFiltered" => $dataAll->num_rows(),
				 "data" => $dataRows
			);

		//output to json format
		echo json_encode($output);
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
}

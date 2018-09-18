<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/regisujian','regis');
    }

    public function index()
	{
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		$nip = $this->session->userdata('nip');
		/** check session */
		if(isset($fk_lookup_menu) && isset($username)){

			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='auditor/homepage.php';
			$data['nip']=$nip;
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
	}
	public function search(){
		$nip = $this->session->userdata('nip');
		$url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$nip;
		$check=file_get_contents($url);
		$jsonResult=json_decode($check);
		// $kodeunitkerja = $this->session->userdata('kodeunitkerja');
		if($jsonResult->message=='get_data_success'){
			// $data['NIP'] = $jsonResult->data[0]->NIP;
			// $data['NamaLengkap'] = $jsonResult->data[0]->NamaLengkap;
			$output = array(
										 "nip" => $jsonResult->data[0]->Auditor_NIP,
										 "nama" => $jsonResult->data[0]->Auditor_NamaLengkap,
										 "tempat_lahir" => $jsonResult->data[0]->Auditor_TempatLahir,
										 "ttl" => $jsonResult->data[0]->Auditor_TglLahir,
										 "pendidikan" => $jsonResult->data[0]->Pendidikan_Tingkat,
										 "unit" => $jsonResult->data[0]->UnitKerja_Nama,
										 "jabatan" => (!empty($jsonResult->data[0]->Jabatan_Nama)?$jsonResult->data[0]->Jabatan_Nama:'-'),
										 "jenjangjabatan" => $jsonResult->data[0]->JenjangJabatan_Nama,

						 );
		 //output to json format
		 echo json_encode($output);
	 }else{
		 $output = array(
										"msg" => "NIP tidak ditemukan",
						);
					echo json_encode($output);
	 }
	}
	public function load(){
		$NIP = $this->session->userdata('nip');
		if($this->regis->loadDatabyNIP($NIP)!='no data'){
		$data=$this->regis->loadDatabyNIP($NIP);
	}else{
		$data = array(
									 "msg" => "no data",
					 );
	}
		echo json_encode($data);
	}
	public function RiwayatUjian(){
			redirect('RiwayatUjian');
	}
}

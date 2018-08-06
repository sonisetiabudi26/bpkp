<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
    }

    public function index()
    {
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='fasilitas/homepage.php';
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
    public function loadperpindahan(){
      	$username = $this->session->userdata('logged_in');
      	$datas=$this->pengusul->loadValidasi($username,2);
         $data = array();
          $a=1;
  			foreach ($datas as $key) {
          $dataRow = array();
  				$dataRow[]=$a;
  				$dataRow[]=$key->NIP;
  				$dataRow[]=$key->NAMA;
  				$dataRow[]=$key->DESC;
  				$url=base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
  				$dataRow[]="<td><button onclick='getModal(this)' id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
  						<span>View Doc</span></button></td>";
  				$data[]=$dataRow;
  				$a++;
  			}
        $output = array(
            "draw" => 'dataperpindahan',
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
        );
  	 	 //output to json format
  	 	 echo json_encode($output);
    }
    public function loadpertama(){
      	$username = $this->session->userdata('logged_in');
        $datas=$this->pengusul->loadValidasi($username,1);
         $data = array();
          $a=1;
  			foreach ($datas as $key) {
          $dataRow = array();
          $dataRow[]=$a;
          $dataRow[]=$key->NIP;
          $dataRow[]=$key->NAMA;
          $dataRow[]=$key->DESC;
          $url=base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/vw_upload_doc/".$key->FK_STATUS_PENGUSUL_PENGANGKATAN."~".$key->PK_PENGUSUL_PENGANGKATAN."~".$key->NIP;
          $dataRow[]="<td><button onclick='getModal(this)' id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
              <span>View Doc</span></button></td>";
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

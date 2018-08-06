<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		//$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/pengusulpengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
				$this->load->helper(array('url','download'));
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
					if($key->RESULT==''){
						$result='';
					}elseif($key->RESULT==1){
						$result='<i class="glyphicon glyphicon-remove"></i> Reject';
					}else{
						$result='<i class="glyphicon glyphicon-ok"></i> Accept';
					}
          $dataRow = array();
  				$dataRow[]=$a;
  				$dataRow[]=$key->NIP;
  				$dataRow[]=$key->NAMA;
  				$dataRow[]=$key->DESC;
					$dataRow[]=$result;
  				$url=base_url('sertifikasi')."/fasilitas/home/vw_show_doc/".$key->PK_PENGUSUL_PENGANGKATAN;
					$accept=$key->PK_PENGUSUL_PENGANGKATAN."~0";
					$reject=$key->PK_PENGUSUL_PENGANGKATAN."~1";

					$dataRow[]='<td><a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-primary">
							View Doc</a><a class="btn btn-sm btn-success" href="javascript:void(0)" title="accept" onclick="action('."'".$accept."'".')"> Accept</a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="reject" onclick="action('."'".$reject."'".')"> Reject</a></td>';
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
					if($key->RESULT==''){
						$result='';
					}elseif($key->RESULT==1){
						$result='<i class="glyphicon glyphicon-remove"></i> Reject';
					}else{
						$result='<i class="glyphicon glyphicon-ok"></i> Accept';
					}
          $dataRow = array();
          $dataRow[]=$a;
          $dataRow[]=$key->NIP;
          $dataRow[]=$key->NAMA;
          $dataRow[]=$key->DESC;
					$dataRow[]=$result;


          $url=base_url('sertifikasi')."/fasilitas/home/vw_show_doc/".$key->PK_PENGUSUL_PENGANGKATAN;
					$accept=$key->PK_PENGUSUL_PENGANGKATAN."~0";
					$reject=$key->PK_PENGUSUL_PENGANGKATAN."~1";

					$dataRow[]='<td><a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-primary">
							View Doc</a><a class="btn btn-sm btn-success" href="javascript:void(0)" title="accept" onclick="action('."'".$accept."'".')"> Accept</a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="reject" onclick="action('."'".$reject."'".')"> Reject</a></td>';
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
		public function download($param){
			$data=$this->doc_pengusul->loaddocbypk($param);
			foreach ($data as $key) {
				force_download('uploads/'.$key->DATA_DOC,NULL);
			}

			redirect("sertifikasi/fasilitas");
		}
		public function vw_show_doc($param){


			$data['data']=$this->doc_pengusul->loaddoc($param);
			$this->load->view('sertifikasi/fasilitas/content/modal_view_doc',$data);
		}
		public function update($obj){
			$parameter=explode('~',$obj);

			$where=array(
				'PK_PENGUSUL_PENGANGKATAN'=>$parameter[0],

			);
			$data_update=array(
				'RESULT'=>$parameter[1]
			);
		$update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);

			$data = array(
										 "msg" => "success",
						 );

		 //output to json format
		 echo json_encode($data);

		}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengusulanPengangkatan extends CI_Controller {

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
        $data['content_page']='unit_apip/pengusulan_pengangkatan.php';
        $data['username']=$username;
				$data['status']	= $this->pengusul->_get_list_status();
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function add_data(){

			$date = date('Ymd');
			$datex=date('Y-m-d');
			$nip=$this->input->post('nip');
			$dataCheckPeserta=$this->regis->loadbyNIP($nip,'1');
			if(!$dataCheckPeserta){
					$folder='doc_registrasi/'.$nip.'_'.$date;
					$docksp='doc_ksp';
					$docfoto='doc_foto';
					$uploadpdf = $this->do_upload_pdf($folder,$docksp);
					$uploadimg = $this->do_upload_img($folder,$docfoto);
					//$uploadimg = $this->do_upload_img($folder);
					// $uploadpdf='';

					// $this->session->set_userdata('group_regis', $group_regis);
					// $uploadpdf['result_upload_pdf']="success";
					if($uploadpdf['result_upload_pdf'] == "success" && $uploadimg['result_upload_img']){
						$doc_ksp=$folder.'/'.$_FILES['doc_ksp']['name'];
						$doc_foto=$folder.'/'.$_FILES['doc_foto']['name'];
						$data = array(
						 'NIP' => $this->input->post('nip'),
						 'GROUP_REGIS' => '',
						 'LOKASI_UJIAN' => $this->input->post('lokasi'),
						 'PK_JADWAL_UJIAN' => $this->input->post('jadwal'),
						 'NO_SURAT_UJIAN' => $this->input->post('no_surat'),
						 'NILAI_KSP' => $this->input->post('nilai_ksp'),
						 'DOC_NILAI_KSP' => $doc_ksp,
						 'DOC_FOTO' => $doc_foto,
						 'CREATED_AT' => $this->session->userdata('logged_in'),
						 'CREATED_DATE' => $datex,
						 'PROVINSI' => 'unknown',
						 'FLAG' => '1'
					 );
					 $insert=$this->regis->save($data);
					 if($insert=='Data Inserted Successfully'){
						 print json_encode(array("status"=>"success", "data"=>$insert));
					 }else{
						 print json_encode(array("status"=>"error", "data"=>$insert));
					 }
					}else{
						$data['upload_error1'] = $uploadpdf['error'];
						$data['upload_error2'] = $uploadimg['error'];
					}
					echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
			}else{
				echo json_encode(array("status"=>'gagal'));
			}
		}
}

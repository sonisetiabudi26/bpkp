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
    		//$this->load->helper('url');
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
		public function vw_create_pertek($param){

			$datas=$this->pertek->getdatabyid($param);
			foreach ($datas as $key) {
				$data['id_pertek']=$key->PK_PERTEK;
				$data['nosurat']=$key->NO_SURAT;
				$data['data_doc']=($key->DOC_PERTEK==''?'0':'1');
			}

			$this->load->view('sertifikasi/fasilitas/content/modal_view_pertek',$data);

		}

		public function create_pertek(){

			$data['datex']=date('Y F d');
			$data['dates']=date('Y-m-d');

			$data['no_pertek']=$this->input->post('nopertek');
			$data['id_pertek']=$this->input->post('id_pertek');
		  $data['yth']=$this->input->post('yth');
			$data['tempat']=$this->input->post('tempat');
			$data['kepala']=$this->input->post('kepala');
			$data['tembusan']=$this->input->post('tembusan');
			$data['nosurat']=$this->input->post('no_surat');
			$where=array(
				'PK_PERTEK'=>$data['id_pertek'],
			);
			$data_update=array(
				'NO_PERTEK'=>$data['no_pertek'],
				'YTH'=>$data['yth'],
				'TEMPAT'=>$data['tempat'],
				'KEPALA'=>$data['kepala'],
				'TEMBUSAN'=>$data['tembusan'],

			);
			$update=$this->pertek->updateData($where,'pertek',$data_update);
			if($update=='success'){
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
					 if ( ! write_file(FCPATH."/uploads/doc_pertek/".$namafile.".pdf", $pdf))
					 {
									 echo 'Unable to write the file';
					 }
					 else
					 {
								 $where=array(
									 'PK_PERTEK'=>$data['id_pertek'],
								 );
								 $data_update=array(
									 'DOC_PERTEK'=>base_url()."uploads/doc_pertek/".$namafile.".pdf",
									 'PERTEK_DATE'=>$data['dates'],
									 'NO_PERTEK'=>$data['no_pertek'],
									 'CREATED_BY'=> $this->session->userdata('logged_in'),
									 'CREATED_DATE'=> $data['dates']
								 );
								 $update=$this->pertek->updateData($where,'pertek',$data_update);
					 }
				 }
			// $dompdf->stream($namafile);
			 $output = array('msg' => 'success' , );
		 }else{
			 $output = array('msg' => 'error' , );
		 }
	 }else{
		  $output = array('msg' => 'error' , );
	 }
	 print json_encode($output);
	 }

    public function delete(){
        $data=$this->pusbin->delete_product();
        echo json_encode($data);
    }
    public function loadData(){
       $datas=$this->pertek->view();
         $data = array();
          $a=1;
       foreach ($datas as $key) {
				  $data_pengusul=$this->pengusul->total_pengusul($key->NO_SURAT);
          $dataRow = array();
          $dataRow[]=$a;
          $dataRow[]=$key->NO_SURAT;
          $dataRow[]=$key->DOC_PERTEK;
          $dataRow[]=$key->DOC_ANGKA_KREDIT;
          $dataRow[]=$key->NO_RESI;
					$dataRow[]=$data_pengusul->qualified.'/'.$data_pengusul->total;

					$viewpertek=($key->DOC_PERTEK!=''?'1':'0');
					$param=$key->PK_PERTEK;
        //  $url=base_url('sertifikasi')."/fasilitas/ManagementPertek/create_pertek/".$param;
	         $url_angker=base_url('sertifikasi')."/fasilitas/home/vw_show_angker/".$key->PK_PERTEK;
					 $url_create=base_url('sertifikasi')."/fasilitas/ManagementPertek/vw_create_pertek/".$param;
					 $url_view=$key->DOC_PERTEK;
					 $create="id='btn-upload-doc' onclick='getModal(this)' data-href='".$url_create."' data-toggle='modal' data-target='#modal-content' class='btn btn-sm btn-primary'";
					 $view="id='btn-upload-doc'  href='".$url_view."' target='_blank' class='btn btn-sm btn-primary'";

					 $url= ($key->DOC_PERTEK==""? $create:$view);
	         $namapertek=($key->DOC_PERTEK==''?'Create DOC PERTEK':'View DOC PERTEK');
	         $namaangker=($key->DOC_ANGKA_KREDIT==''?'Create DOC Angka Kredit':'View DOC Angka Kredit');
	         $resi=($key->NO_RESI==''?'Input No Resi':'Update No Resi');
	         $dataRow[]='<td><a '.$url.' >
             '.$namapertek.'</a>
             <a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url_angker.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-success">
                 '.$namaangker.'</a>
             <a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url_angker.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-warning">
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

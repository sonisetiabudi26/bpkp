<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementPertek extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		//$this->load->helper('url');
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
    public function delete(){
        $data=$this->pusbin->delete_product();
        echo json_encode($data);
    }
    public function loadData(){
       $datas=$this->pertek->view();
         $data = array();
          $a=1;
       foreach ($datas as $key) {

          $dataRow = array();
          $dataRow[]=$a;
         $dataRow[]=$key->NO_SURAT;
         $dataRow[]=$key->DOC_PERTEK;
          $dataRow[]=$key->DOC_ANGKA_KREDIT;
          $dataRow[]=$key->NO_RESI;
          $url=base_url('sertifikasi')."/fasilitas/home/vw_show_doc/".$key->PK_PERTEK;
         $url_angker=base_url('sertifikasi')."/fasilitas/home/vw_show_angker/".$key->PK_PERTEK;
         $namapertek=($key->DOC_PERTEK==''?'Create DOC PERTEK':'View DOC PERTEK');
         $namaangker=($key->DOC_ANGKA_KREDIT==''?'Create DOC Angka Kredit':'View DOC Angka Kredit');
         $resi=($key->NO_RESI==''?'Input No Resi':'Update No Resi');
         $dataRow[]='<td><a onclick="getModal(this)" id="btn-upload-doc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" class="btn btn-sm btn-primary">
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

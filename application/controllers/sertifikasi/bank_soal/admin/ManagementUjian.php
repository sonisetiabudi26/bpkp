<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementUjian extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->model('sertifikasi/menupage','menupage');
      $this->load->model('sertifikasi/soalujian','soalujian');
      $this->load->model('sertifikasi/groupmataajar','groupmataajar');
      $this->load->model('sertifikasi/mataajar','mataajar');
      $this->load->model('sertifikasi/users','users');
      $this->load->model('sertifikasi/KonfigUjian','konfig');
      $this->load->model('sertifikasi/babmataajar','babmataajar');
    }
    public function index(){
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');
      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='bank_soal/admin/management_ujian.php';
        $data['username']=$username;
        getMenuAccessPage($data, $fk_lookup_menu);
      }else{
        redirect('/');
      }
    }
    public function loadKonfig(){
      $list = $this->konfig->loadData();
          $data = array();
          $no = $_POST['start'];
          $a=1;
          foreach ($list as $row) {
              $no++;
              $rows = array();
              $rows[] = $a;
              $rows[] = $row->START_TIME;
              $rows[] = $row->END_TIME;
              $rows[] = $row->PIN;
              $rows[] = $row->NAMA_MATA_AJAR;
              $rows[] = $row->CATEGORY."(".$row->START_DATE." - ".$row->END_DATE.")";

              $rows[] = '<div style="text-align:center;"><a data-var="pk_soal_ujian" data-id='.$row->PK_KONFIG_UJIAN.' class="btn btn-sm btn-primary" onclick="getModalWithParam(this)" id="btn-edit-soal"
        data-href="'. base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_edit_soal".'" data-toggle="modal" data-target="#modal-content"
        ><i class="glyphicon glyphicon-pencil"></i> Edit</a>
        <a data-var="pk_soal_ujian" data-id='.$row->PK_KONFIG_UJIAN.' class="btn btn-sm btn-danger" onclick="getModalWithParam(this)" id="btn-edit-soal"
        data-href="'. base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_hapus_soal".'" data-toggle="modal" data-target="#modal-content"
        ><i class="glyphicon glyphicon-trash"></i> Hapus</a></div>';

              $data[] = $rows;
              $a++;
          }

          $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
                  );
          echo json_encode($output);
    }
  }
  ?>

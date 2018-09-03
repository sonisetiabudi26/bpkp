<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengusulanPengangkatan extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/PengusulPengangkatan','pengusul');
				$this->load->model('sertifikasi/DocPengusulanPengangkatan','doc_pengusul');
        $this->load->model('sertifikasi/Users','user');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='pusbin/PengusulanPengangkatan.php';
        $data['username']=$username;
        $data['status']	= $this->pengusul->_get_list_status();
        $data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
    public function loadData(){
      $userAdmin=$this->session->userdata('nip');
      $datas=$this->pengusul->loadData();
      $a=1;
      if($datas!='no data'){
      foreach ($datas as $key) {
        $dataRow['no']=$a;
        $dataRow['nipunitapip']=$key->CREATED_BY;
        $apiuser=$this->apiuser($key->CREATED_BY);

        $kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
        $dataRow['unitapip']=$kodeunitkerja;
        $datarow=$this->pengusul->numrowcategory($key->CREATED_BY);

        if($datarow=='no data'){
          $datarow=0;
        }
        $datarowpeserta=$this->pengusul->numrowpeserta($key->CREATED_BY);

        if($datarowpeserta=='no data'){
          $datarowpeserta=0;
        }
        $dataRow['jml_category']=$datarow;
        $dataRow['jml_peserta']=$datarowpeserta;
        $dataRow['validator']=($key->validator!='0'?$key->validator:'');
        $url=base_url('sertifikasi')."/pusbin/PengusulanPengangkatan/vw_validator/".$key->NO_SURAT;
        $dataRow['action']="<td><button onclick='getModal(this)' id='btn-upload-doc' data-href='".$url."' data-toggle='modal' data-target='#modal-content' class='btn btn-primary'>
            <span>Tentukan Validator</span></button></td>";
        $data[]=$dataRow;
        $a++;
      }
    }else{
      $data = array(
                     "msg" => "Data tidak ada",
             );
    }
     //output to json format
     echo json_encode($data);
      // $data['provinsi']=$this->provinsi->_get_provinsi_information();
    }
    public function vw_validator($param){
        // $data['id_unitapip']=$param;
        $datas['no_surat']=$param;
        //$apiuser=$this->apiuser($param);
        //$kodeunitkerja = $apiuser->data[0]->UnitKerja_Nama;
        $validator=$this->user->check_validator();
        foreach ($validator as $key ) {
          //$apiuservalidator=$this->apiuser($key->USER_NAME);
          //$kodeunitkerjavalidator = $apiuser->data[0]->UnitKerja_Nama;
            $datas['validator'] = array('username' => $key->USER_NAME,
					 															);

  			}
        $this->load->view('sertifikasi/pusbin/content/view_validator',$datas);

    }
    public function apiuser($param){
      $url="http://163.53.185.91:8083/sibijak/dca/api/api/auditor/".$param;
      $check=file_get_contents($url);
      $jsonResult=json_decode($check);
      return $jsonResult;
    }
    public function add_validator(){

      $where=array(
				'validator'=>'',
				'NO_SURAT'=>$this->input->post('no_surat'),

      );
      $data_update=array(
        'validator'=>$this->input->post('validator'),
      );
      $update=$this->pengusul->updateData($where,'pengusul_pengangkatan',$data_update);
      if($update=='success'){
        $data = array(
                       "status" => "success",
											 "msg" => "Data berhasil disimpan"
               );
      }else{
        $data = array(
                       "status" => "error",
											 "msg" => "Data gagal disimpan"
               );
      }
       //output to json format
       print json_encode($data);
    }
  }

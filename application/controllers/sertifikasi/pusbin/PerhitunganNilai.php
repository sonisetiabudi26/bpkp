<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerhitunganNilai extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();

        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
        $this->load->model('sertifikasi/provinsi','provinsi');
        $this->load->model('sertifikasi/reffsimdiklat','diklat');
        $this->load->model('sertifikasi/event','event');
        $this->load->model('sertifikasi/batch','batch');
        $this->load->model('sertifikasi/jadwalujian','jadwal');
        $this->load->model('sertifikasi/jawabanpeserta','jawaban');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='pusbin/PerhitunganNilai.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
    public function vw_add_event(){
			$data['provinsi']	= $this->provinsi->_getAll();
			$this->load->view('sertifikasi/pusbin/content/add_event',$data);
		}
    public function vv_add_batch(){
      $data['event']	= $this->event->loadEvent();
      $data['jadwal']	= $this->jadwal->loadJadwal();
      $this->load->view('sertifikasi/pusbin/content/add_batch',$data);
    }
    public function CheckNodiklat($kodediklat){
      $jsonResult	= $this->diklat->_checkDiklat($kodediklat);
      	if($jsonResult!='no data'){
            $data['diklat']	=$jsonResult[0]->NamaDiklat;
            $output[] = $data;
        }else{
          $output = array(
   											"msg" => "No data diklat",
   							);
        }
      echo json_encode($output);
    }

    public function tambah(){

      			 $date = date('Ymd');
      			 $datex=date('Y-m-d');
      			 $nip=$this->input->post('kodediklat');
             $bulan=$this->input->post('bulan');
             $tahun=$this->input->post('tahun');
             $kodeevent=$this->input->post('kodeevent');
             $namadiklat=$this->input->post('namadiklat');
             $provinsi=$this->input->post('provinsi');
             $uraian=$this->input->post('uraian');
      			 if($nip!=''&&$bulan!=''&&$tahun!=''&&$kodeevent!=''&&$namadiklat!=''&&$provinsi!=''){
      						 $data = array(
      				 			'KODE_EVENT' => $kodeevent,
      							'NAMA_DIKLAT' => $namadiklat,
      				 			'URAIAN' => $uraian,
      				 			'FK_PROVINSI' => $provinsi,
      				 			'CREATED_AT' => $this->session->userdata('logged_in'),
      							'CREATED_DATE' => $datex
      				 		);
      						$insert=$this->event->save($data);
      						if($insert=='Data Inserted Successfully'){
      							print json_encode(array("status"=>"success", "data"=>$insert));
      						}else{
      							print json_encode(array("status"=>"error", "data"=>$insert));
      						}
      					 // echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
      			 }else{
      				 echo json_encode(array("status"=>'gagal'));
      			 }
    }
    public function tambahBatch(){

             $date = date('Ymd');
             $datex=date('Y-m-d');
             $kodeALL=explode('~',$this->input->post('kodeevent'));
             $kodeevent=$kodeALL[0];
             $provinsi=$kodeALL[1];
             $reff=$this->input->post('reff');
             $kelas=$this->input->post('kelas');
             $jadwal=$this->input->post('jadwal');

             if($kodeevent!=''&&$reff!=''&&$kelas!=''&&$jadwal!=''){
                   $data = array(
                    'FK_KODE_EVENT' => $kodeevent,
                    'KELAS' => $kelas,
                    'FK_PROVINSI' => $provinsi,
                    'FK_JADWAL' => $jadwal,
                    'REFF' => $reff,
                    'CREATED_AT' => $this->session->userdata('logged_in'),
                    'CREATED_DATE' => $datex
                  );
                  $insert=$this->batch->save($data);
                  if($insert=='Data Inserted Successfully'){
                    print json_encode(array("status"=>"success", "data"=>$insert));
                  }else{
                    print json_encode(array("status"=>"error", "data"=>$insert));
                  }
                 // echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
             }else{
               echo json_encode(array("status"=>'gagal'));
             }
    }

    public function LoadDateEvent(){
      $dataAll=$this->event->loadEvent();
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->KODE_EVENT;
             $row[] = $field->NAMA_DIKLAT;
             $row[] = $field->URAIAN;
             $row[] = $field->Nama;
             $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_event('."'".$field->PK_EVENT."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
      //echo json_encode($dataAll);
    }
    public function vw_upload_doc(){
      // $data['event']	= $id_batch;
      $this->load->view('sertifikasi/pusbin/content/import_nilai');
    }
    public function vw_view_nilai($param){
      // $parameter	= explode('~',$param);
      // $data['kodeevent']=$parameter[0];
      // $data['kelas']=$parameter[1];
      $data['kode']=$param;
      $this->load->view('sertifikasi/pusbin/content/view_nilai_peserta',$data);
    }
    public function LoadDatePeserta($kodeevent){
      $parameter	= explode('~',$kodeevent);
      $kodeevent=$parameter[0];
      $kelas=$parameter[1];
       $dataAll= $this->jawaban->getALl($kodeevent,$kelas);
       $data = array();
       //$no = $_POST['start'];
       $a=0;

         foreach ($dataAll as $field) {
             $row = array();
             $nilai=0;
             $row[] = $a+1;
             $row[] = $field->FK_KODE_EVENT;
             $row[] = $field->KODE_PESERTA;
             $row[] = $field->KODE_SOAL;
             $row[] = $field->KELAS;
             $row[] = $nilai;

             $data[] = $row;
             $a++;
         }


       $output = array(
           "draw" => 'dataPeserta',
           "recordsTotal" => $a,
           "recordsFiltered" => $a,
           "data" => $data,
       );
       //output dalam format JSON
       echo json_encode($output);
      //echo json_encode($dataAll);
    }
    public function LoadBatch(){
      $dataAll=$this->batch->loadBatch();
       $data = array();
       //$no = $_POST['start'];

       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
						 $numrowpeserta=$this->jawaban->NumrowPeserta($field->KODE_EVENT,$field->KELAS);
						 if($numrowpeserta=='no data'){
							 $numrowpeserta=0;
						 }
             $row[] = $a;
             $row[] = $field->KODE_EVENT;
             $row[] = $field->Nama;
             $row[] = $field->KELAS;
             $row[] = $field->CATEGORY.' ('.$field->START_DATE.' - '.$field->END_DATE.')';
             $row[] = $field->REFF;
						 $row[] = $numrowpeserta;
             //$url_upload=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_upload_doc/".$field->PK_BATCH;
             $url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_view_nilai/".$field->KODE_EVENT.'~'.$field->KELAS;
             $row[] = '<a class="btn btn-sm btn-success" onclick="getModal(this)" id="btn-view" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-eye-open"></i> View</a>
             <a class="btn btn-sm btn-danger"  href="javascript:void(0)" title="Hapus" onclick="delete_batch('."'".$field->PK_BATCH."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
      //echo json_encode($dataAll);
    }
    public function deleteEvent($id){

      $delete=$this->event->remove($id);

				print json_encode(array("status"=>"success", "data"=>$delete));
    }

    public function importNilai(){
    //  $nilai = $this->input->post('file_nilai');

  		$upload = $this->do_upload('doc_nilai');
      //$id_batch = $this->input->post('id_batch');
  		if($upload['result_upload'] == "success"){
        $file=$upload['file'];
        $filename=$file['file_name'];
  			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
  			$excelreader = new PHPExcel_Reader_Excel2007();
  			$loadexcel = $excelreader->load('uploads/nilai/'.$filename);
  			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  			$data['sheet'] = $this->import($sheet);
  		}else{
  			$data['upload_error'] = $upload['error'];
  		}
      print json_encode(array("status"=>$upload['result_upload'], "data"=>$data));


  	}

  	public function do_upload($doc){
      if (!is_dir('uploads/nilai/')) {
        mkdir('./uploads/nilai/', 0777, TRUE);
      }
  		$config['upload_path']          = './uploads/nilai/';
  		$config['allowed_types']        = 'xlsx';
  		$config['max_size']             = 2048;
  		$config['max_width']            = 2048;
  		$config['max_height']           = 768;
      $config['overwrite'] = TRUE;
  		$this->load->library('upload', $config);
      if (! $this->upload->do_upload($doc)){
        return array('result_upload' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
      }else{
        return array('result_upload' => 'success', 'file' => $this->upload->data(), 'error' => '');
      }
  	}

  	public function import($sheet){
      $date = date('Ymd');
      $datex=date('Y-m-d');
  		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
  		$datasheet1 = [];
  		$numrow = 1;
      $indexbatch=0;
    //  $dataAll=$this->batch->get_batch_by_id($id_batch);
  		foreach($sheet as $row){
        if($numrow > 1 ){
    			//if($row['A']==$dataAll[0]->KODE_EVENT){
            $indexbatch=$indexbatch+1;
    				array_push($datasheet1, [
    				'FK_KODE_EVENT'=>$row['A'],
    				'KELAS'=>$row['C'],
    				'KODE_PESERTA'=>$row['D'],
    				'KODE_SOAL'=>$row['F'],
            'CREATED_AT' =>  $this->session->userdata('logged_in'),
            'CREATED_DATE' => $datex,
            'NO_1' =>$row['H'],
            'NO_2' =>$row['I'],
            'NO_3' =>$row['J'],
            'NO_4' =>$row['K'],
            'NO_5' =>$row['L'],
            'NO_6' =>$row['M'],
            'NO_7' =>$row['N'],
            'NO_8' =>$row['O'],
            'NO_9' =>$row['P'],
            'NO_10' =>$row['Q'],
            'NO_11' =>$row['R'],
            'NO_12' =>$row['S'],
            'NO_13' =>$row['T'],
            'NO_14' =>$row['U'],
            'NO_15' =>$row['V'],
            'NO_16' =>$row['W'],
            'NO_17' =>$row['X'],
            'NO_18' =>$row['Y'],
            'NO_19' =>$row['Z'],
            'NO_20' =>$row['AA'],
            'NO_21' =>$row['AB'],
            'NO_22' =>$row['AC'],
            'NO_23' =>$row['AD'],
            'NO_24' =>$row['AE'],
            'NO_25' =>$row['AF'],
            'NO_26' =>$row['AG'],
            'NO_27' =>$row['AH'],
            'NO_28' =>$row['AI'],
            'NO_29' =>$row['AJ'],
            'NO_30' =>$row['AK'],
            'NO_31' =>$row['AL'],
            'NO_32' =>$row['AM'],
            'NO_33' =>$row['AN'],
            'NO_34' =>$row['AO'],
            'NO_35' =>$row['AP'],
            'NO_36' =>$row['AQ'],
            'NO_37' =>$row['AR'],
            'NO_38' =>$row['AS'],
            'NO_39' =>$row['AT'],
            'NO_40' =>$row['AU'],
            'NO_41' =>$row['AV'],
            'NO_42' =>$row['AW'],
            'NO_43' =>$row['AX'],
            'NO_44' =>$row['AY'],
            'NO_45' =>$row['AZ'],
            'NO_46' =>$row['BA'],
            'NO_47' =>$row['BB'],
            'NO_48' =>$row['BC'],
            'NO_49' =>$row['BD'],
            'NO_50' =>$row['BE'],
    				]);

    			//}
      }
      $numrow++;
  		}
  		/** Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model */
      if($numrow >1){
    		if($this->jawaban->insert_multiple($datasheet1)){
            return array('datasheet' => $datasheet1, 'file' => '', 'response' => "success");
          }else{
            return array('datasheet' => $datasheet1, 'file' => '', 'response' => "error");
          }

    		}else{
    			return array('datasheet' => $datasheet1, 'file' => '', 'response' => 'error');
    		}
  	}
}

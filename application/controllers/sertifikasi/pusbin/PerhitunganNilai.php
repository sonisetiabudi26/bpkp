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
				$this->load->model('sertifikasi/GroupMataAjar','groupmataajar');
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
			$data['kodediklat']	= $this->groupmataajar->_get_all_group_mata_ajar();
			$this->load->view('sertifikasi/pusbin/content/add_event',$data);
		}
    public function vv_add_batch(){
      $data['event']	= $this->event->loadEvent();
      $data['jadwal']	= $this->jadwal->loadJadwal();
      $this->load->view('sertifikasi/pusbin/content/add_batch',$data);
    }
    public function CheckNodiklat($kodediklat){
      $jsonResult	= $this->groupmataajar->_get_kodediklat_group_mata_ajar($kodediklat);
      	if($jsonResult!='no data'){
            $data['diklat']	=$jsonResult[0]->NAMA_GROUP_MATA_AJAR;
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
      			 $kodediklat=$this->input->post('kodediklat');
             $bulan=$this->input->post('bulan');
             $tahun=$this->input->post('tahun');
             $kodeevent=$this->input->post('kodeevent');
             $namadiklat=$this->input->post('namadiklat');
             $provinsi=$this->input->post('provinsi');
             $uraian=$this->input->post('uraian');
      			 if($bulan!=''&&$tahun!=''&&$kodeevent!=''&&$namadiklat!=''&&$provinsi!=''){
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
      				 echo json_encode(array("status"=>'gagal', "data"=>$data));
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
    public function vw_upload_doc($id_batch){
      $data['event']	= $id_batch;
      $this->load->view('sertifikasi/pusbin/content/import_nilai',$data);
    }
		public function vw_nilai_per_unitkerja($id){
			$data['id']	= $id;
			$this->load->view('sertifikasi/pusbin/content/view_nilai_by_unit',$data);
		}
		public function LoadDatePesertabyUnit($id){
			$parameter	= explode('~',$id);
			$kodeevent=$parameter[1];
			$kode_unit=$parameter[0];
			 $dataAll= $this->jawaban->getALlbyUnit($kodeevent,$kode_unit);
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
						 $row[] = $field->Nilai;

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
             $url_upload=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_upload_doc/".$field->PK_BATCH;
             //$url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_view_nilai/".$field->KODE_EVENT.'~'.$field->KELAS;
             $row[] = '<a class="btn btn-sm btn-success" onclick="calculate('."'".$field->KODE_EVENT."'".','."'".$field->KELAS."'".')" id="btn-view" ><i class="glyphicon glyphicon-dashboard"></i> Cakculate</a>
						 <a class="btn btn-sm btn-warning" onclick="getModal(this)" id="btn-view" data-href="'.$url_upload.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-import"></i> Import Data</a>
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
		public function calculate($kode){
			$parameter	= explode('~',$kode);
			$kode_event=$parameter[0];
			$kelas=$parameter[1];
			$dataAll=$this->jawaban->get_data_all_by_event($kode_event,$kelas);


			$a=6;
			$nomor1=1;

			foreach ($dataAll as $key) {
				$totalJawaban=0;
				$data = array();
				$data['nip']=$key->KODE_PESERTA;
				$data['kode_soal']=$key->KODE_SOAL;
				for ($i=1; $i< 51 ; $i++) {
					$nomor='NO_'.$i;
					$data[$nomor]=$key->$nomor;
					$dataCalc=$this->jawaban->calculate($key->KODE_SOAL,$key->$nomor,$i);
					$datanum=$this->jawaban->get_data_all_by_numrows($key->KODE_SOAL,$kelas);
					$data['totalSoal']=$datanum;
					$jawaban='JAWABAN_'.$i;
					if($dataCalc=='benar'){
						$totalJawaban++;
					}

					$data[$jawaban]=$dataCalc;
					$nomor1++;
				}
				$data['totalJawaban']=$totalJawaban;
				if($data['totalSoal']!=0){
					$data['nilai']=ceil(($totalJawaban/$datanum)*100);
				}else{
					$data['nilai']=0;
				}
				$where=array(
					'KODE_PESERTA'=>$data['nip'],
					'KODE_SOAL'=>$data['kode_soal'],
					'FK_KODE_EVENT'=>$kode_event
				);
				$data_update=array(
					'Nilai'=>$data['nilai']
				);


				$dataall[]=$data;
				$a++;
				$update=$this->jawaban->updateData($where,'jawaban_peserta',$data_update);
				if($update){
					$data_response='success';
				}else{
					$data_response='error';
				}
			}
			$array = [
						 'data' => $dataall, // Append a passengers key with the variable $passengers, this will most likely be an stdClass object or an arrays
			 ];

				  print json_encode(array("status"=>$data_response, "data"=>$array));
		}
		public function LoadDataUnit(){
			$dataAll= $this->jawaban->getUnit();
			$data = array();
			$a=0;

				foreach ($dataAll as $field) {
					  $dataJumlah= $this->jawaban->getPesertabyUnit($field->KODE_UNIT,$field->FK_KODE_EVENT);
						$dataTotal=($dataJumlah!='no data'?$dataJumlah:'0');
						$row = array();
						$nilai=0;
						$row[] = $a+1;
						$row[] = $field->FK_KODE_EVENT;
						$row[] = $field->KODE_UNIT;
						$row[] = $dataTotal;
						//$row[] = $field->KODE_SOAL;
						//$row[] = $field->KELAS;
						$id=$field->KODE_UNIT.'~'.$field->FK_KODE_EVENT;
						$url_upload=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_nilai_per_unitkerja/".$id;
						$row[] = '<a class="btn btn-sm btn-success" id="btn-view" onclick="getModal(this)" id="btn-view" data-href="'.$url_upload.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-eye-open"></i> View</a>';


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
		}
    public function importNilai(){
    //  $nilai = $this->input->post('file_nilai');

  		$upload = $this->do_upload('doc_nilai');
      $id_batch = $this->input->post('id_batch');
			 $dataAll=$this->batch->get_batch_by_id($id_batch);
  		if($upload['result_upload'] == "success"){
        $file=$upload['file'];
        $filename=$file['file_name'];
  			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
  			$excelreader = new PHPExcel_Reader_Excel2007();
  			$loadexcel = $excelreader->load('uploads/nilai/'.$filename);
  			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  			$data['sheet'] = $this->import($sheet,$dataAll);
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
  		$config['allowed_types']        = 'xlsx|xls';
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

  	public function import($sheet,$dataAll){
      $date = date('Ymd');
      $datex=date('Y-m-d');
  		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
  		$datasheet1 = [];
  		$numrow = 1;
      $indexbatch=0;
			$kode_event=$dataAll[0]->KODE_EVENT;
			$kelas=$dataAll[0]->KELAS;
    //  $dataAll=$this->batch->get_batch_by_id($id_batch);
  		foreach($sheet as $row){
        if($numrow > 1 ){
    			//if($row['A']==$dataAll[0]->KODE_EVENT){
            $indexbatch=$indexbatch+1;
    				array_push($datasheet1, [
    				'FK_KODE_EVENT'=>$kode_event,//kode event ambil dr data selected
    				'KELAS'=>$kelas,//kelas ambil dr data selected
    				'KODE_PESERTA'=>$row['F'],
						'KODE_UNIT'=>$row['G'],
    				'KODE_SOAL'=>$row['C'],
            'CREATED_AT' =>  $this->session->userdata('logged_in'),
            'CREATED_DATE' => $datex,

            'NO_1' =>$row['I'],
            'NO_2' =>$row['J'],
            'NO_3' =>$row['K'],
            'NO_4' =>$row['L'],
            'NO_5' =>$row['M'],
            'NO_6' =>$row['N'],
            'NO_7' =>$row['O'],
            'NO_8' =>$row['P'],
            'NO_9' =>$row['Q'],
            'NO_10' =>$row['R'],
            'NO_11' =>$row['S'],
            'NO_12' =>$row['T'],
            'NO_13' =>$row['U'],
            'NO_14' =>$row['V'],
            'NO_15' =>$row['W'],
            'NO_16' =>$row['X'],
            'NO_17' =>$row['Y'],
            'NO_18' =>$row['Z'],
            'NO_19' =>$row['AA'],
            'NO_20' =>$row['AB'],
            'NO_21' =>$row['AC'],
            'NO_22' =>$row['AD'],
            'NO_23' =>$row['AE'],
            'NO_24' =>$row['AF'],
            'NO_25' =>$row['AG'],
            'NO_26' =>$row['AH'],
            'NO_27' =>$row['AI'],
            'NO_28' =>$row['AJ'],
            'NO_29' =>$row['AK'],
            'NO_30' =>$row['AL'],
            'NO_31' =>$row['AM'],
            'NO_32' =>$row['AN'],
            'NO_33' =>$row['AO'],
            'NO_34' =>$row['AP'],
            'NO_35' =>$row['AQ'],
            'NO_36' =>$row['AR'],
            'NO_37' =>$row['AS'],
            'NO_38' =>$row['AT'],
            'NO_39' =>$row['AU'],
            'NO_40' =>$row['AV'],
            'NO_41' =>$row['AW'],
            'NO_42' =>$row['AX'],
            'NO_43' =>$row['AY'],
            'NO_44' =>$row['AZ'],
            'NO_45' =>$row['BA'],
            'NO_46' =>$row['BB'],
            'NO_47' =>$row['BC'],
            'NO_48' =>$row['BD'],
            'NO_49' =>$row['BE'],
						'NO_50' =>$row['BF'],
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerhitunganNilai extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();

        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
        $this->load->model('sertifikasi/Provinsi','provinsi');
        $this->load->model('sertifikasi/ReffSimdiklat','diklat');
        $this->load->model('sertifikasi/Event','event');
        $this->load->model('sertifikasi/Batch','batch');
        $this->load->model('sertifikasi/JadwalUjian','jadwal');
        $this->load->model('sertifikasi/JawabanPeserta','jawaban');
				$this->load->model('sertifikasi/GroupMataAjar','groupmataajar');
				$this->load->model('sertifikasi/RegisUjian','regis');
				$this->load->model('sertifikasi/LookupUjian','lookup_ujian');
    }
		public function loadDataJenjang(){
			$dataAll=$this->groupmataajar->_get_all_group_mata_ajar();
			$data = array();
			$a=1;

				foreach ($dataAll as $field) {
						$row = array();

						$row['kode'] = '<a href="'.base_url('sertifikasi')."/pusbin/PerhitunganNilai/list_event/".$field->KODE_DIKLAT.'">'.$field->KODE_DIKLAT.'</a>';
						$row['nama'] = $field->NAMA_JENJANG;
						$data[] = $row;
						$a++;
				}
				$output = array(
						"draw" => 'dataJenjang',
						"recordsTotal" => $a,
						"recordsFiltered" => $a,
						"data" => $data,
				);
			//output dalam format JSON
			echo json_encode($output);
		}
		public function list_event($id){
			$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
			$username = $this->session->userdata('logged_in');
			if(isset($fk_lookup_menu) && isset($username)){
				$data['title_page'] = 'BPKP Web Application';
				$data['content_page']='pusbin/Event_batch.php';
				$data['category']='Event';
				$data['username']=$username;
				$data['id']=$id;
				// $data['comment']=$this->detailpermintaansoal->getcomment($id);
				// if($data['comment']!='no data'){
				// 	$data['status']=$data['comment'][0]->STATUS;
				// }else{
				// 	$data['status']='';
				// 	$data['comment']=[];
				// }
				// $data['bab_mata_ajar']	= $this->babmataajar->_review_bab_mata_ajar();
				getMenuAccessPage($data, $fk_lookup_menu);
			}else{
				redirect('/');
			}
		}
		public function list_batch($id){
			$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
			$username = $this->session->userdata('logged_in');
			if(isset($fk_lookup_menu) && isset($username)){
				$data['title_page'] = 'BPKP Web Application';
				$data['content_page']='pusbin/Event_batch.php';
				$data['category']='Batch';
				$data['username']=$username;
				$data['id']=$id;
				// $data['comment']=$this->detailpermintaansoal->getcomment($id);
				// if($data['comment']!='no data'){
				// 	$data['status']=$data['comment'][0]->STATUS;
				// }else{
				// 	$data['status']='';
				// 	$data['comment']=[];
				// }
				// $data['bab_mata_ajar']	= $this->babmataajar->_review_bab_mata_ajar();
				getMenuAccessPage($data, $fk_lookup_menu);
			}else{
				redirect('/');
			}
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
    public function vw_add_event($id){
			$data['provinsi']	= $this->provinsi->_getAll();
			$data['kodediklat']	= $this->groupmataajar->getalldatakodediklat_mataajar_byId($id);
			$this->load->view('sertifikasi/pusbin/content/add_event',$data);
		}
    public function vv_add_batch($param){
      $dataparam	= explode('~',$param);
			$data['id_event']=$dataparam[0];
			$data['kode_event']=$dataparam[1];
      $data['jadwal']	= $this->jadwal->loadJadwal();
      $this->load->view('sertifikasi/pusbin/content/add_batch',$data);
    }
    public function CheckNodiklat($kodediklat){
      $jsonResult	= $this->groupmataajar->_get_kodediklat_group_mata_ajar($kodediklat);
      	if($jsonResult!='no data'){
            $data['diklat']	=$jsonResult[0]->NAMA_JENJANG;
            $output[] = $data;
        }else{
          $output = array(
												"status"=>"error",
   											"msg" => "No data diklat",
   							);
        }
      print json_encode($output);
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
						 $pass_grade=$this->input->post('pass_grade');
      			 if($bulan!=''&&$tahun!=''&&$kodeevent!=''&&$namadiklat!=''&&$provinsi!=''&&$kodediklat!=''){
      						 $data = array(
      				 			'KODE_EVENT' => $kodeevent,
      							'FK_JENJANG' => $kodediklat,
      				 			'URAIAN' => $uraian,
      				 			'FK_PROVINSI' => $provinsi,
										'PASS_GRADE' => $pass_grade,
      				 			'CREATED_BY' => $this->session->userdata('logged_in'),
      							'CREATED_DATE' => $datex
      				 		);
      						$insert=$this->event->save($data);
      						if($insert=='Data Inserted Successfully'){
      							print json_encode(array("status"=>"success", "data"=>'Data Berhasil disimpan'));
      						}else{
      							print json_encode(array("status"=>"error", "msg"=>'Data gagal disimpan'));
      						}
      					 // echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
      			 }else{
      				 echo json_encode(array("status"=>'error', "msg"=>'Data tidak boleh ada yang kosong'));
      			 }
    }
    public function tambahBatch(){

             $date = date('Ymd');
             $datex=date('Y-m-d');
            // $kodeALL=explode('~',$this->input->post('kodeevent'));
             $kodeevent=$this->input->post('event');
             $reff=$this->input->post('reff');
             $kelas=$this->input->post('kelas');
             $jadwal=$this->input->post('jadwal');

             if($kodeevent!=''&&$kelas!=''&&$jadwal!=''){
                   $data = array(
                    'FK_EVENT' => $kodeevent,
                    'KELAS' => $kelas,
                    'FK_JADWAL' => $jadwal,
                    'REFF' => $reff,
                    'CREATED_BY' => $this->session->userdata('logged_in'),
                    'CREATED_DATE' => $datex
                  );
                  $insert=$this->batch->save($data);
                  if($insert=='Data Inserted Successfully'){
										 $data = array(
																	 "status" => "success",
																	 "msg" =>"Data berhasil disimpan"
													 );
                  }else{
										 $data = array(
																	 "status" => "error",
																	 "msg" => "Data gagal disimpan"
													 );
                  }
                 // echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
             }else{
							  $data = array(
															"status" => "error",
															"msg" => "Data tidak boleh kosong"
											);
             }
						 print json_encode($data);
    }
		public function LoadDataNilaiPeserta(){
			 $dataAll=$this->lookup_ujian->loadNilai();
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->NIP;
             $row[] = $field->NAMA_JENJANG;

						 $url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_detail_nilai/".$field->FK_REGIS_UJIAN;
             $row[] = '<td><a class="btn btn-sm btn-warning" onclick="getModal(this)" id="btn-view" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail Nilai</a>
						 <a class="btn btn-sm btn-primary"  onclick="getModal(this)" id="btn-view" data-href="" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Buat Sertifikasi</a></td>';
             $data[] = $row;
             $a++;
         }
				 $output = array(
						 "draw" => 'dataPeserta',
						 "recordsTotal" => $a,
						 "recordsFiltered" => $a,
						 "data" => $data,
				 );
       echo json_encode($output);
		}
    public function LoadDateEventbyid($id){
      $dataAll=$this->event->loadEventbyid($id);
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row['no'] = $a;
             $row['kodeevent'] = '<a href="'.base_url('sertifikasi')."/pusbin/PerhitunganNilai/list_batch/".$field->KODE_EVENT.'">'.$field->KODE_EVENT.'</a>';
             $row['namadiklat'] = $field->NAMA_JENJANG;
             $row['uraian'] = $field->URAIAN;
             $row['nama'] = $field->Nama;
						 $row['pass_grade'] = $field->PASS_GRADE;
						 $url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_add_batch/".$field->PK_EVENT.'~'.$field->KODE_EVENT;
             $row['action'] = '<td><a class="btn btn-sm btn-danger"  href="javascript:void(0)" title="Hapus" onclick="delete_event('."'".$field->PK_EVENT."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
						 <a class="btn btn-sm btn-primary"  onclick="getModal(this)" id="btn-create-batch" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Buat Batch</a></td>';

             $data[] = $row;
             $a++;
         }


       // $output = array(
       //     "draw" => 'dataEvent',
       //     "recordsTotal" => $a,
       //     "recordsFiltered" => $a,
       //     "data" => $data,
       // );
       //output dalam format JSON
       echo json_encode($data);
      //echo json_encode($dataAll);
    }
		public function LoadDateEvent(){
      $dataAll=$this->event->loadEvent();
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row['no'] = $a;
             $row['kodeevent'] = $field->KODE_EVENT;
             $row['namadiklat'] = $field->NAMA_JENJANG;
             $row['uraian'] = $field->URAIAN;
             $row['nama'] = $field->Nama;
						 $url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_add_batch/".$field->PK_EVENT.'~'.$field->KODE_EVENT;
             $row['action'] = '<td><a class="btn btn-sm btn-danger"  href="javascript:void(0)" title="Hapus" onclick="delete_event('."'".$field->PK_EVENT."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
						 <a class="btn btn-sm btn-primary"  onclick="getModal(this)" id="btn-view" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Buat Batch</a></td>';

             $data[] = $row;
             $a++;
         }


       // $output = array(
       //     "draw" => 'dataEvent',
       //     "recordsTotal" => $a,
       //     "recordsFiltered" => $a,
       //     "data" => $data,
       // );
       //output dalam format JSON
       echo json_encode($data);
      //echo json_encode($dataAll);
    }
    public function vw_upload_doc($id_batch){
      $data['event']	= $id_batch;
      $this->load->view('sertifikasi/pusbin/content/import_nilai',$data);
    }
		public function vv_detail_nilai($id){
			$data['id']=$id;
			$this->load->view('sertifikasi/pusbin/content/view_nilai_detail',$data);
		}
		public function getdatanilai($id){
			$datas=$this->lookup_ujian->getDetailNilai($id);
			$a=1;
			$datarow = array();
			foreach ($datas as $key) {
				$data = array();
				switch ($key->NAMA_JENJANG) {
					case 'Auditor Terampil':
						$perc_ujian_tertulis=50;
						$perc_nilai_wi1=50;
					break;
					case 'Auditor Ahli':
						$perc_ujian_tertulis=50;
						$perc_nilai_wi1=30;
					break;
					// case 'Pindah Jalur':
					// 	$perc_ujian_tertulis=;
					// 	$perc_nilai_wi1=;
					// break;
					case 'Auditor Muda':
						$perc_ujian_tertulis=45;
						$perc_nilai_wi1=35;
					break;
					case 'Auditor Madya':
						$perc_ujian_tertulis=40;
						$perc_nilai_wi1=40;
					break;
					case 'Auditor Utama':
					$perc_ujian_tertulis=35;
					$perc_nilai_wi1=45;
					break;
					default:
						$perc_ujian_tertulis=50;
						$perc_nilai_wi1=30;
						break;
				}
				$total_kelulusan=ceil(ceil((ceil($key->HASIL_UJIAN*50/100)+ceil($key->NILAI_1_WI*30/100)+ceil($key->NILAI_2_WI*20/100))*80/100)+ceil($key->NILAI_KSP*20/100));
				$data_pass_grade=$this->lookup_ujian->getdataPassGrade($key->FK_JAWABAN_DETAIL);
				if(!empty($data_pass_grade)){
					if($total_kelulusan>=$data_pass_grade[0]->PASS_GRADE){
						$ket_lulus='LULUS';
						$style='"color:blue"';
					}else{
						$ket_lulus='BELUM LULUS';
						$style='"color:red"';
					}
			}else{
				$ket_lulus='BELUM LULUS';
				$style='"color:red"';
			}
				$data[]=$key->NAMA_MATA_AJAR;
				$data[]=ceil($key->HASIL_UJIAN*$perc_ujian_tertulis/100);
				$data[]=ceil($key->NILAI_1_WI*$perc_nilai_wi1/100);
				$data[]=ceil($key->NILAI_2_WI*20/100);
				$data[]=ceil($key->HASIL_UJIAN*50/100)+ceil($key->NILAI_1_WI*30/100)+ceil($key->NILAI_2_WI*20/100);
				$data[]=ceil((ceil($key->HASIL_UJIAN*50/100)+ceil($key->NILAI_1_WI*30/100)+ceil($key->NILAI_2_WI*20/100))*80/100);
				$data[]=ceil($key->NILAI_KSP*20/100);
				$data[]='<b style='.$style.' >'.$total_kelulusan.' ('.$ket_lulus.')'.'</b>';
				$datarow[]=$data;
				$a++;
			}
			$output = array(
					"draw" => 'dataPeserta',
					"recordsTotal" => $a,
					"recordsFiltered" => $a,
					"data" => $datarow,
			);
			//output dalam format JSON
			echo json_encode($output);
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
						 $row[] = $field->FK_EVENT;
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
             $row[] = $field->FK_EVENT;
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
    public function LoadBatch($id){
      $dataAll=$this->batch->loadBatchbyid($id);
       $data = array();
       //$no = $_POST['start'];

       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
						 $numrowpeserta=$this->jawaban->NumrowPeserta($field->FK_EVENT,$field->KELAS);
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
             $url=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_view_nilai/".$field->KODE_EVENT.'~'.$field->KELAS;

             $row[] = '<a class="btn btn-sm btn-success" onclick="calculate('."'".$field->FK_EVENT."'".','."'".$field->KELAS."'".')" id="btn-calc" ><i class="glyphicon glyphicon-dashboard"></i> Kalkulasi</a>
						 <a class="btn btn-sm btn-warning" onclick="getModal(this)" id="btn-import" data-href="'.$url_upload.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-import"></i> Import Data</a>
             <a class="btn btn-sm btn-danger"  href="javascript:void(0)" title="Hapus" onclick="delete_batch('."'".$field->PK_BATCH."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
						 <a class="btn btn-sm btn-primary" onclick="getModal(this)" id="btn-view-calc" data-href="'.$url.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-eye-open"></i> Lihat Data</a>';

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

				print json_encode(array("status"=>"success", "msg"=>$delete));
    }
		public function deleteBatch($id){

			$delete=$this->batch->remove($id);

				print json_encode(array("status"=>"success", "msg"=>$delete));
		}
		public function calculate($kode){
			$parameter	= explode('~',$kode);
			$kode_event=$parameter[0];
			$kelas=$parameter[1];

			$dataAll=$this->jawaban->get_data_all_by_event($kode_event,$kelas);
			if($dataAll!='no data'){

			$nomor1=1;
			foreach ($dataAll as $key) {
				$fk_jawaban_detail=$key->PK_JAWABAN_DETAIL;
				$totalJawaban=0;
				$data = array();
				$data['nip']=$key->KODE_PESERTA;
				$data['kode_soal']=$key->KODE_SOAL;
				$datanum=$this->jawaban->get_data_all_by_numrows($key->KODE_SOAL,$key->KELAS);
				$data['totalSoal']=$datanum;
				$dataJawaban=$this->jawaban->getDataJawaban($fk_jawaban_detail);
				foreach ($dataJawaban as $row) {
					$dataCalc=$this->jawaban->calculate($key->KODE_SOAL,$row->JAWABAN,$row->NO_UJIAN);
					$jawaban='JAWABAN_'.$row->NO_UJIAN;
					if($dataCalc=='benar'){
						$totalJawaban++;
					}
					$data[$jawaban]=$dataCalc;
					$nomor1++;
				}

				$data['totalJawaban']=$totalJawaban;
				if($datanum!=0){
					$data['nilai']=ceil(($totalJawaban/$datanum)*100);
				}else{
					$data['nilai']='0';
				}
				$where=array(
					'PK_JAWABAN_DETAIL'=>$fk_jawaban_detail,
					// 'KODE_SOAL'=>$data['kode_soal'],
					// 'FK_EVENT'=>$kode_event
				);
				$data_update=array(
					'Nilai'=>$data['nilai']
				);


				$dataall[]=$data;
				// $a++;
				$update=$this->jawaban->updateData($where,'jawaban_peserta',$data_update);
				// if($update){
					$data_lookup=$this->lookup_ujian->getdata_lookup($key->KODE_PESERTA,$key->FK_MATA_AJAR);
					// $nilai=ceil($data['nilai']*35/100);
					foreach ($data_lookup as $keys) {
						$where=array(
							'FK_REGIS_UJIAN'=>$keys->PK_REGIS_UJIAN,
							'FK_MATA_AJAR'=>$key->FK_MATA_AJAR
						);
						$data_update=array(
							'FK_JAWABAN_DETAIL'=>$fk_jawaban_detail,
							'HASIL_UJIAN'=>$data['nilai'],
							'flag'=>1
						);
					$update_lookup=$this->lookup_ujian->updateData($where,'lookup_ujian',$data_update);
					}
					$output  = array('status' =>'success' ,
				 										'msg'=>'Data berhasil dikalkulasi','data'=>$datanum);
			//	}
				// else{
				// 	$output  = array('status' =>'error' ,
				//  										'msg'=>'Data gagal dikalkulasi');
				//}
			}

		 }else{
			 $output = array('status' =>'error' ,
		  									'msg'=>'Data peserta tidak ada');
		 }
				  print json_encode($output);
		}
		public function LoadDataUnit(){
			$dataAll= $this->jawaban->getUnit();
			$data = array();
			$a=0;

				foreach ($dataAll as $field) {
					  $dataJumlah= $this->jawaban->getPesertabyUnit($field->KODE_UNIT,$field->FK_EVENT);
						$dataTotal=($dataJumlah!='no data'?$dataJumlah:'0');
						$row = array();
						$nilai=0;
						$row[] = $a+1;
						$row[] = $field->FK_EVENT;
						$row[] = $field->KODE_UNIT;
						$row[] = $dataTotal;
						//$row[] = $field->KODE_SOAL;
						//$row[] = $field->KELAS;
						$id=$field->KODE_UNIT.'~'.$field->FK_EVENT;
						$url_upload=base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_nilai_per_unitkerja/".$id;
						$row[] = '<a class="btn btn-sm btn-success" id="btn-view-nilai" onclick="getModal(this)" id="btn-view" data-href="'.$url_upload.'" data-toggle="modal" data-target="#modal-content" ><i class="glyphicon glyphicon-eye-open"></i> Lihat Data</a>';


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
  			$excelreader =PHPExcel_IOFactory::createReader('Excel2007');
  			$loadexcel = $excelreader->load('uploads/nilai/'.$filename);
  			$objWorksheet = $loadexcel->setActiveSheetIndex();
				$no=1;

					foreach ($objWorksheet->getRowIterator() as $row) {
						if($no>1){
							$a=0;
					  $cellIterator = $row->getCellIterator();
					  $cellIterator->setIterateOnlyExistingCells(false);

					  foreach ($cellIterator as $cell) {
							$rowasd[$no][$a]=$cell->getValue();
							$a++;
					  }
					}

					$no++;
				}
				//	print_r($rowasd);
				$dataimport=$this->import($a,$rowasd,$dataAll);
				if($dataimport=='success')
				{
					$output  = array('status' =>'success' ,
														'msg'=>'Data berhasil import data');
				}else{
					$output = array('status' =>'error' ,
													 'msg'=>'gagal import data');
					}
			}else{
				$output = array('status' =>'error' ,
												 'msg'=>'gagal import data');
			}
				print json_encode($output);
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



  	public function import($no,$rowData,$dataAll){
      $date = date('Ymd');
      $datex=date('Y-m-d');
  		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
  		$datasheet1 = [];
			$datasheet2 = [];
  		$numrow = 0;
      $indexbatch=0;
			$kode_event=$dataAll[0]->FK_EVENT;
			$kelas=$dataAll[0]->KELAS;

    //  $dataAll=$this->batch->get_batch_by_id($id_batch);
  		foreach($rowData as $row){

					$data = array(
						'FK_EVENT'=>$kode_event,//kode event ambil dr data selected
						'KELAS'=>$kelas,//kelas ambil dr data selected
						'KODE_PESERTA'=>$row[5],
						'KODE_UNIT'=>$row[6],
						'KODE_SOAL'=>$row[2],
						'TGL_UJIAN'=>$row[3],
						'CREATED_BY' =>  $this->session->userdata('logged_in'),
						'CREATED_DATE' => $datex,
					);
					$insertmulti=$this->jawaban->addSoal($data);
					if($insertmulti!='Data Inserted Failed'){
						$no_ujian=1;
						for ($i=8; $i < $no ; $i++) {
    				array_push($datasheet1, [
							'FK_JAWABAN_DETAIL'=>$insertmulti,//kode event ambil dr data selected
							'NO_UJIAN'=>$no_ujian,//kelas ambil dr data selected
							'JAWABAN'=>$row[$i],

    				]);
						$no_ujian++;
						}

					}
					$numrow++;

  		}
			$insertmulti_jawaban=$this->jawaban->insert_multiple($datasheet1);
				if($insertmulti_jawaban=='success'){
						return  "success";
					}else{
						return  "error";
					}
  	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiAPI extends CI_Controller{
	public function __construct(){
				// Load parent construct
				parent::__construct();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->model('sertifikasi/widyaiswara','nilaiwi');
		}
		public function LoadDataKelasDiklat(){

				$url_login="http://pusdiklatwas.bpkp.go.id:8099/reservasi/gettoken/login/login";
				$data_login = array(
											 "identity" => 'sibijak@bpkp.go.id',
											 "password" => 's1bijak@pusbin');
				$check=$this->postCURL($url_login,$data_login);
        $jsonResult=json_decode($check);
				$nip = $this->session->userdata('nip');
			  // $result_login=$check['token'];
				$data_user="data[NIP_instruktur]=196006021982031001".$nip;
        $url_table="http://pusdiklatwas.bpkp.go.id:8099/simdiklatapi/api/cmd?tables=zdmw_sibijak_peserta_mata_ajar&data[NIP_instruktur]=196006021982031001";
        $data_check_table = array(
                       "Authorization :".$jsonResult->token,
                      );
        $checkTable=$this->postCURL2($url_table,$data_check_table);
        $dataTable=json_decode($checkTable);
        $a=0;
        foreach ($dataTable->data as $key) {
					$dataAll=$this->nilaiwi->loadNilai($key->nip_baru_nospace,$key->RlsTglMataAjar,$key->NamaMataAjar,$key->Nama_Instruktur);
					if($dataAll=='nodata'){
						$nilai1='';
						$nilai2='';
						$id='';
					}else{
						$id=$dataAll[0]->PK_WIDYAISWARA_NILAI;
						$nilai1=$dataAll[0]->NILAI_1;
						$nilai2=$dataAll[0]->NILAI_2;

					}
					$row = array();
          $nilai=0;
          $row[] = $a+1;
          $row[] = $key->nip_baru_nospace;
					$row[] = $key->RlsTglMataAjar;
          $row[] = $key->NamaMataAjar;
          $row[] = $nilai1;
					$row[] = $nilai2;
          $row[] = $key->Nama_Instruktur;
					$dataNIlai=$key->nip_baru_nospace.'~'.$key->NamaMataAjar.'~'.$key->RlsTglMataAjar.'~'.$key->Nama_Instruktur.'~'.$nilai1.'~'.$nilai2.'~add';
					if($id!=''){
						$dataNIlaiEdit=$key->nip_baru_nospace.'~'.$key->NamaMataAjar.'~'.$key->RlsTglMataAjar.'~'.$key->Nama_Instruktur.'~'.$nilai1.'~'.$nilai2.'~edit~'.$dataAll[0]->PK_WIDYAISWARA_NILAI;
						$row[] = '<td><button onclick="ModalNilai('."'".$dataNIlai."'".')" id="btn-upload-doc" class="btn btn-primary">Tambah Nilai</button><button onclick="ModalNilai('."'".$dataNIlaiEdit."'".')" id="btn-upload-doc" class="btn btn-success">Edit Nilai</button></td>';

					}else{
						$dataNIlaiEdit=$key->nip_baru_nospace.'~'.$key->NamaMataAjar.'~'.$key->RlsTglMataAjar.'~'.$key->Nama_Instruktur.'~'.$nilai1.'~'.$nilai2.'~add';
						$row[] = '<td><button onclick="ModalNilai('."'".$dataNIlai."'".')" id="btn-upload-doc" class="btn btn-primary">Tambah Nilai</button></td>';

					}
          // $row[] = '<td><button onclick="ModalNilai('."'".$dataNIlai."'".')" id="btn-upload-doc" class="btn btn-primary">Tambah Nilai</button><button onclick="ModalNilai('."'".$dataNIlaiEdit."'".')" id="btn-upload-doc" class="btn btn-primary">Edit Nilai</button></td>';

          $data[] = $row;
          $a++;
        }


        $output = array(
            "draw" => 1,
            "recordsTotal" => $a,
            "recordsFiltered" => $a,
            "data" => $data,
        );
				 //output to json format
				 echo json_encode($output);
			 // }else{
				//  $output = array(
				// 								"msg" => "NIP tidak sesuai dengan unit kerja",
				// 				);
				// 			echo json_encode($output);
			 // }

		}
    public function postCURL($_url, $_param){

        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v)
        {
          $postData .= $k . '='.$v.'&';
        }
        rtrim($postData, '&');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output=curl_exec($ch);

        curl_close($ch);

        return $output;
    }
    public function postCURL2($_url, $_param){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $_param);


        $output=curl_exec($ch);

        curl_close($ch);

        return $output;
    }

		public function tambah(){

      			 $date = date('Ymd');
      			 $datex=date('Y-m-d');

						 $dataALL=explode('~',$this->input->post('nip_m'));
						 $nip=$dataALL[0];
             $mataajar=$dataALL[1];
             $tgl=$dataALL[2];
             $instruktur=$dataALL[3];
						 $type=$dataALL[6];
             $nilai1=$this->input->post('nilai1');
             $nilai2=$this->input->post('nilai2');

      			 if($nip!=''&&$mataajar!=''&&$tgl!=''&&$instruktur!=''){
							 if($type=='add'){
									 $data = array(
      				 			'NIP' => $nip,
      							'MATA_AJAR' => $mataajar,
      				 			'TGL_RELEASE_MATA_AJAR' => $tgl,
      				 			'NIP_INSTRUKTUR' => $instruktur,
										'NILAI_1' => $nilai1,
										'NILAI_2' => $nilai2,
      				 			'CREATED_AT' => $this->session->userdata('logged_in'),
      							'CREATED_DATE' => $datex
      				 		);
									$dataAll=$this->nilaiwi->loadNilai($nip,$tgl,$mataajar,$instruktur);
									if($dataAll=='nodata'){
      						$insert=$this->nilaiwi->save($data);
      						if($insert=='Data Inserted Successfully'){
      							print json_encode(array("status"=>"success", "data"=>$insert));
      						}else{
      							print json_encode(array("status"=>"error", "data"=>$insert));
      						}
								}else{
									echo json_encode(array("status"=>'gagal'));
								}
							}else{
								$data = array(
								 'NIP' => $nip,
								 'MATA_AJAR' => $mataajar,
								 'TGL_RELEASE_MATA_AJAR' => $tgl,
								 'NIP_INSTRUKTUR' => $instruktur,
								 'NILAI_1' => $nilai1,
								 'NILAI_2' => $nilai2,
								 'CREATED_AT' => $this->session->userdata('logged_in'),
								 'CREATED_DATE' => $datex
							 );
							 $id=$dataALL[7];

							 $insert=$this->nilaiwi->update($id,$data);
							 if($insert=='Data Updated Successfully'){
								 print json_encode(array("status"=>"success", "data"=>$insert));
							 }else{
								 print json_encode(array("status"=>"error", "data"=>$insert));
							 }

							}
      					 // echo json_encode(array("status"=>$uploadpdf['result_upload_pdf']));
      			 }else{
      				 echo json_encode(array("status"=>'gagal'));
      			 }

    }
}

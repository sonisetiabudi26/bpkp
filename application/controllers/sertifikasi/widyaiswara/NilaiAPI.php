<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiAPI extends CI_Controller{
	public function __construct(){
				// Load parent construct
				parent::__construct();
				$this->load->library('session');
				$this->load->helper('url');
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
          $row = array();
          $nilai=0;
          $row[] = $a+1;
          $row[] = $key->nip_baru_nospace;
					$row[] = $key->RlsTglMataAjar;
          $row[] = $key->NamaMataAjar;
          $row[] = '';
					$row[] = '';
          $row[] = $key->Nama_Instruktur;
          $row[] = "<td><button onclick='ModalNilai()' id='btn-upload-doc' class='btn btn-primary'>Tambah Nilai</button></td>";

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
}

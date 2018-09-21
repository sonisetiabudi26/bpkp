<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiAPI extends CI_Controller{
	public function __construct(){
				// Load parent construct
				parent::__construct();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->model('sertifikasi/widyaiswara','nilaiwi');
				$this->load->model('sertifikasi/DetailWidyaiswara','detail_wi');
		}
		public function LoadDataKelasDiklat(){
				$draw=intval($this->input->get('draw'));
				$start=intval($this->input->get('start'));
				$length=intval($this->input->get('length'));
				$nip = $this->session->userdata('nip');
			  // $result_login=$check['token'];


				$dataAll=$this->nilaiwi->getdatabynip($nip);
				if(empty($dataAll)){
					$dataAll=$this->nilaiwi->getdatabynipifnull($nip);
				}
					$a=0;
				 $data = array();
					foreach ($dataAll as $key) {

					 $row = array();
						$nilai=0;
						$row[] = $a+1;
						$row[] = '<input readonly name="nip_'.(empty($key->PK_DETAIL_NILAI_WI)?'':$key->PK_DETAIL_NILAI_WI).'" value='.$key->NIP.' id="nip_"'.$key->NIP.'"" />';
					 $row[] = $key->NAMA;
					 $row[] = $key->TGL_RELEASE_MATA_AJAR;
						$row[] = $key->NAMA_MATA_AJAR;
						$row[] = '<input type="number" name="nilai1_'.(empty($key->PK_DETAIL_NILAI_WI)?'':$key->PK_DETAIL_NILAI_WI).'" id="nilai1_'.(empty($key->PK_DETAIL_NILAI_WI)?'':$key->PK_DETAIL_NILAI_WI).'" value="'.$key->NILAI_1.'"/>';
					 $row[] = '<input type="number" name="nilai2_'.(empty($key->PK_DETAIL_NILAI_WI)?'':$key->PK_DETAIL_NILAI_WI).'" id="nilai2_'.(empty($key->PK_DETAIL_NILAI_WI)?'':$key->PK_DETAIL_NILAI_WI).'" value="'.$key->NILAI_2.'"/>';
						$row[] = $key->USER_NAME;

					 // $dataNIlaiEdit=$key->PK_WIDYAISWARA_NILAI.'~'.$key->NILAI_1.'~'.$key->NILAI_2;
					 // 	$row[] = '<td><button onclick="ModalNilai('."'".$dataNIlaiEdit."'".')" id="edit-nilai-doc" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah Nilai</button></td>';

						$data[] = $row;
						$a++;
					}

				// if($dataAll=='nodata'){
				// 	$nilai1='';
				// 	$nilai2='';
				// 	$id='';
				// }else{
				// 	$id=$dataAll[0]->PK_WIDYAISWARA_NILAI;
				// 	$nilai1=$dataAll[0]->NILAI_1;
				// 	$nilai2=$dataAll[0]->NILAI_2;
				//
				// }



        $output = array(
						"length" => $length,
            "draw" => $draw,
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
		public function updateDataNilai(){
			$nip = $this->session->userdata('logged_in');
			$dataAll=$this->nilaiwi->getdatabynip($nip);
			foreach ($dataAll as $key) {
				$nilai1='nilai1_'.$key->PK_DETAIL_NILAI_WI;
				$nilai2='nilai2_'.$key->PK_DETAIL_NILAI_WI;
				// $nilai['nilai1']=$this->input->get($nilai1);
				// $nilai['nilai2']=$this->input->get($nilai2);
				$data_update = array(
				 'NILAI_1' =>$this->input->get($nilai1),
				 'NILAI_2' => $this->input->get($nilai2),
				 'flag' => 1
			 );
			 $data_where = array('PK_DETAIL_NILAI_WI' => $key->PK_DETAIL_NILAI_WI, );
			 $update_data=$this->detail_wi->updateData($data_where,$data_update);
			 	if($update_data!='error'){
					 $data_update2 = array(
						'flag' => 1
					);
					$data_where2 = array('PK_WIDYAISWARA_NILAI' => $key->PK_WIDYAISWARA_NILAI, );
					$update_data2=$this->nilaiwi->updateData($data_where2,$data_update2);
				}
			}
			if($update_data!='error'){

				print json_encode(array("status"=>"success", "msg"=>'success'));
			}else{
				print json_encode(array("status"=>"error", "msg"=>'error'));
			}
			//	print json_encode($nilai);
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

						 $nip=$this->input->post('id_wi');


             $nilai1=$this->input->post('nilai1_edit');
             $nilai2=$this->input->post('nilai2_edit');

      			 if($nip!=''&&$nilai1!=''&&$nilai2!=''){

									 $data_update = array(
      				 			'NILAI_1' => $nilai1,
										'NILAI_2' => $nilai2,
      				 		);
									$data_where = array('FK_WIDYAISWARA_NILAI' => $nip, );
									$update_data=$this->detail_wi->updateData($data_where,$data_update);
      						if($update_data!='error'){
      							print json_encode(array("status"=>"success", "msg"=>$update_data));
      						}else{
      							print json_encode(array("status"=>"error", "msg"=>$update_data));
      						}
      			 }else{
      				 echo json_encode(array("status"=>'error'));
      			 }

    }
}

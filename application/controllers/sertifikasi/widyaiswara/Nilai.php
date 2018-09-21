<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Nilai extends CI_Controller{

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/menupage','menupage');
				$this->load->model('sertifikasi/Widyaiswara','wi');
				$this->load->model('sertifikasi/DetailWidyaiswara','detail_wi');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='widyaiswara/nilai_wi.php';
        $data['username']=$username;
		getMenuAccessPage($data, $fk_lookup_menu);
      }else{
        redirect('/');
      }
    }


		public function tambah_nip_widyaiswara(){
			$dataAll['id']=$this->input->post('id_wi');
			$dataAll['fk_group_mata_ajar']=$this->input->post('fk_group_mata_ajar');
			$dataAll['fk_mata_ajar']=$this->input->post('fk_mata_ajar');
			$dataAll['tanggal_release']=$this->input->post('tanggal_release');
			if($dataAll['id']!=''&&$dataAll['fk_mata_ajar']!=''&&$dataAll['tanggal_release']!=''){
			$upload = $this->do_upload('doc_wi');
      // $id_batch = $this->input->post('id_batch');
			//  $dataAll=$this->batch->get_batch_by_id($id_batch);
  		if($upload['result_upload'] == "success"){
        $file=$upload['file'];
        $filename=$file['file_name'];
  			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
  			$excelreader = new PHPExcel_Reader_Excel2007();
  			$loadexcel = $excelreader->load('uploads/doc_wi/'.$filename);
  			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  			$data['sheet'] = $this->import($sheet,$dataAll);
				if($data['sheet']=='success'){
					$output = array('status' =>'success' ,'msg'=>'Berhasil di import' );
				}else{
						$output = array('status' =>'error' ,'msg'=>$data['sheet']);
					}
  		}else{
  			$output = array('status' =>'error' ,'msg'=>'Gagal melakukan proses import','data'=>$upload['result_upload'] );
  		}
		}else{
			$output = array('status' =>'error' ,'msg'=>'Data field tidak boleh kosong' );
		}
      print json_encode($output);

		}
		public function do_upload($doc){
			if (!is_dir('uploads/doc_wi/')) {
				mkdir('./uploads/doc_wi/', 0777, TRUE);
			}
			$config['upload_path']          = './uploads/doc_wi/';
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

    //  $dataAll=$this->batch->get_batch_by_id($id_batch);
  		foreach($sheet as $row){
        if($numrow > 1 ){

            $indexbatch=$indexbatch+1;
    				array_push($datasheet1, [
    				'TGL_RELEASE_MATA_AJAR'=>$dataAll['tanggal_release'],
    				'NIP'=>$row['A'],
						'NAMA'=>$row['B'],
    				'FK_MATA_AJAR'=>$dataAll['fk_mata_ajar'],
						'NIP_INSTRUKTUR'=> $dataAll['id'],
            'CREATED_BY' =>  $this->session->userdata('nip'),
            'CREATED_DATE' => $datex,
    				]);


      }
      $numrow++;
  		}
  		/** Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model */
      if($numrow >1){
				if($indexbatch>0){
					$insertmulti=$this->wi->insert_multiple($datasheet1);
	    		if($insertmulti=='success'){
	            return  "success";
	          }else{
	            return  "error1";
	          }
				}else{
					return "error2";
				}
    		}else{
    			return 'error3';
    		}
  	}
		public function add_nilai_default(){
			$nilai1=$this->input->post('nilai_1');
			$nilai2=$this->input->post('nilai_2');
			$id_wi=$this->session->userdata('logged_in');
			$datasheet1 = [];
			if($nilai1!=''&&$nilai2!=''){
				$data_all=$this->wi->getdatabynip($id_wi);
				if(empty($data_all)){
						$data_all=$this->wi->getdatabynipifnull($id_wi);
						if(empty($data_all)){
								print json_encode(array("status"=>"error", "msg"=>'Data tidak boleh kosong'));
						}
						foreach ($data_all as $key) {
						array_push($datasheet1, ['NILAI_1' => $nilai1,
																	'NILAI_2' =>$nilai2,
																	'FK_WIDYAISWARA_NILAI' => $key->PK_WIDYAISWARA_NILAI]);
						}
						$insert=$this->detail_wi->insert_multiple($datasheet1);
						if($insert=='success'){
							print json_encode(array("status"=>"success", "msg"=>$insert));
						}else{
							print json_encode(array("status"=>"error", "msg"=>$insert));
						}
				}else{
					foreach ($data_all as $key) {
					$where=array(
						'FK_WIDYAISWARA_NILAI' => $key->PK_WIDYAISWARA_NILAI,
						'flag' => 0
					);
					$data_update=array(
						'NILAI_1' => $nilai1,
						'NILAI_2' =>$nilai2,
					);
					$update=$this->wi->updateDataNilai($where,'detail_nilai_wi',$data_update);
					}
					if($update=='success'){
						print json_encode(array("status"=>"success", "msg"=>$update));
					}else{
					print json_encode(array("status"=>"error", "msg"=>$update));
					}
				}


			}else{
					print json_encode(array("status"=>"error", "msg"=>'Data tidak boleh kosong'));
			}
			}
}

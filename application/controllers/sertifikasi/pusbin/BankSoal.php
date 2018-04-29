<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankSoal extends CI_Controller {

	private $filename = "soal";
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		$this->load->model('sertifikasi/menupage','menupage');
    	$this->load->model('sertifikasi/soalujian','soalujian');
		$this->load->model('sertifikasi/mataajar','mataajar');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='pusbin/bank_soal.php';
			$data['username']=$username;
			$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
			$data['mata_ajar']	= $this->mataajar->_get_all();
			$this->load->view('sertifikasi/homepage', $data);
		}else{
		redirect('/');
      }
    }
	
	public function upload_soal(){
		$upload = $this->do_upload();
		$data = array('FK_MATA_AJAR' => $this->input->post('mata_ajar'));
		if($upload['result'] == "success"){
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('uploads/'.$this->filename.'.xlsx');
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data['sheet'] = $this->import($sheet, $data);
		}else{
			$data['upload_error'] = $upload['error'];
		}
		print json_encode(array("status"=>$upload['result'], "data"=>$data));
	}
	
	public function do_upload(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('soalfile')){
			return array('result' => $this->upload->display_errors(), 'file' => '', 'error' => $this->upload->display_errors());
		}else{
			return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		}
	}
	
	public function import($sheet, $data){
		/** Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database */
		$datasheet = [];
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($datasheet, [
				'PERTANYAAN'=>$row['A'], 
				'PILIHAN_1'=>$row['B'], 
				'PILIHAN_2'=>$row['C'], 
				'PILIHAN_3'=>$row['D'], 
				'PILIHAN_4'=>$row['E'], 
				'JAWABAN'=>$row['F'],
				'PARENT_SOAL'=>$row['G'],
				'FK_MATA_AJAR'=>$data['FK_MATA_AJAR']
				]);
			}
			$numrow++;
		}
		/** Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model */
		if($this->soalujian->insert_multiple($datasheet)){
			return array('datasheet' => $datasheet, 'file' => '', 'response' => "success");
		}else{
			return array('datasheet' => $datasheet, 'file' => '', 'response' => "error");
		}
	}
}
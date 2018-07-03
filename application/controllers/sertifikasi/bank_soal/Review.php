<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    	$this->load->model('sertifikasi/reviewsoal','reviewsoal');
		$this->load->model('sertifikasi/soalujian','soalujian');
    }
	
	public function insert_review(){
		$fk_bab_mata_ajar = $this->input->post('fk_bab_mata_ajar');
		$reviewer = $this->input->post('reviewer');
		$reviews = $this->reviewsoal->_get_review_ujian_from_bab_mata_ajar($fk_bab_mata_ajar);
		$status_review = "Belum ada yang review";
		$flag_review = 0;
		if(!empty($reviews)){
			$status_review = $reviews->DESCR;
			$flag_review = ($reviews->FLAG);
		}
		if(!empty($reviewer) && $flag_review<3){
			$data = array(
			'FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar'),
			'FK_LOOKUP_REVIEW_SOAL' => $this->get_status_review($flag_review),
			'REVIEWER' => $this->input->post('reviewer'),
			'TANGGAL_REVIEW' => date("Y-m-d H:i:s"),
			'FLAG' => $flag_review+1
			);
			if($this->reviewsoal->_add($data)){
				$reviews = $this->reviewsoal->_get_review_ujian_from_bab_mata_ajar($fk_bab_mata_ajar);
				$data['status_review'] = $reviews->DESCR;
				$data['soal'] = $this->soalujian->_get_ready_soal_ujian($fk_bab_mata_ajar);
				$data['messages'] = "soal telah dikirin";
				$this->load->view('sertifikasi/bank_soal/content/list_soal', $data);
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
		}else{
			$data['status_review'] = $status_review;
			$data['soal'] = $this->soalujian->_get_ready_soal_ujian($fk_bab_mata_ajar);
			$this->load->view('sertifikasi/bank_soal/content/list_soal', $data);
		}
    }
	
	public function get_status_review($flag_review){
		if($flag_review==0){
			return 13;
		}else if($flag_review==1){
			return 14;
		}else if($flag_review==2){
			return 15;
		}
	}
	
	public function update_review(){
		$data = array(
			'FK_BAB_MATA_AJAR' => $this->input->post('fk_bab_mata_ajar'),
			'FK_LOOKUP_REVIEW_SOAL' => $this->input->post('fk_lookup_review_soal'),
			'REVIEWER' => $this->input->post('reviewer'),
			'TANGGAL_REVIEW' => $this->input->post('tanggal_reviewer')
		);
		$where = array(
			'pk_review_soal' => $this->input->post('pk_review_soal')
		);
		
		if($this->reviewsoal->_update($where, $data)){
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
	}
	
	public function hapus_review(){
		if($this->reviewsoal->_delete_by_id($this->input->post('pk_review_soal'))){
			print json_encode(array("status"=>"success", "data"=>"success"));
		}else{
			print json_encode(array("status"=>"error", "data"=>"error"));
		}
	}
}
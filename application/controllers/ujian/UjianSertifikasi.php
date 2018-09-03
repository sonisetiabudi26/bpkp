<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianSertifikasi extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    	$this->load->helper('url');
		$this->load->model('sertifikasi/soalujian','soalujian');
    }

    public function index()
    {
		$logged_nip = $this->session->userdata('logged_nip');
		if(isset($logged_nip)){
			$data['title_page'] = 'BPKP Web Application';
			$data['nama_auditor'] = $this->session->userdata('logged_in');
			$data['nip_auditor'] = $logged_nip;
			$data['soal'] = $this->random_distribusi_ujian();
			$this->load->view('ujian/ujian_sertifikasi', $data);
			//var_dump($this->random_distribusi_ujian());
		}else{
			redirect('ujian-sertifikasi-jfa');
		}
	}

	public function random_distribusi_ujian(){
		$pilihan = 'PILIHAN_';
		$list = $this->soalujian->_get_ready_soal_ujian(9);
        $data = array();
        foreach ($list as $soal) {
			/** Create array untuk menampung data random */
			$soal_ujian = array();

			/** TODO: Get column pilihan benar(jawaban) */
			$index_pilihan = "PILIHAN";
			$field_col = $pilihan.$soal->JAWABAN;
			$soal_ujian[]=array(
				$index_pilihan => array("column" => $field_col, "value" => $soal->JAWABAN, "descr" => $soal->$field_col)
			);

			/** TODO: Get data random for all COLUMN  index pilihan */
			$input = range(1, 4);
			unset($input[($soal->JAWABAN)-1]);
			$pilihan_keys = array_rand($input, 3);
			foreach($pilihan_keys as $pilihan_key){
				$field_col2 = $pilihan.($pilihan_key + 1);
				$soal_ujian[] = array(
					$index_pilihan => array(
						"column" => $field_col2,
						"value" => $pilihan_key + 1,
						"descr" => $soal->$field_col2
					)
				);
			}
			/** Random ulang fix data pilihan ready ujian for A, B, C, D */
			shuffle($soal_ujian);

			/** Add other column */
			$soal_ujian[] = $soal->PK_SOAL_UJIAN;
			$soal_ujian[] = $soal->PERTANYAAN;
			$soal_ujian[] = $soal->SOAL_KASUS;

			/** add data loop to array data untuk dikirim parameter ketampilan ujian */
			array_push($data,$soal_ujian);
		}

		return $data;
	}
}

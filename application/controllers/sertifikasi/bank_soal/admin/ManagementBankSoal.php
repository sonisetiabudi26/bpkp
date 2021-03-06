<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementBankSoal extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		$this->load->model('sertifikasi/menupage','menupage');
    	$this->load->model('sertifikasi/soalujian','soalujian');
		$this->load->model('sertifikasi/groupmataajar','groupmataajar');
		$this->load->model('sertifikasi/mataajar','mataajar');
		$this->load->model('sertifikasi/users','users');
		$this->load->model('sertifikasi/lookup','lookup');
		$this->load->model('sertifikasi/babmataajar','babmataajar');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/admin/management_bank_soal.php';
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }

	public function vw_add_group_mata_ajar(){
		$data['diklat']	= $this->lookup->_get_lookup_from_lookupgroup('DIKLAT_SERTIFIKASI');
		$this->load->view('sertifikasi/bank_soal/content/add_group_mata_ajar', $data);
	}

	public function vw_add_mata_ajar(){
		$data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_mata_ajar', $data);
	}

	public function vw_add_bab_mata_ajar(){
		$data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_bab_mata_ajar', $data);
	}

	public function datatable_list_soal($fk_bab_mata_ajar=null)
    {
		$list = $this->soalujian->get_datatables($fk_bab_mata_ajar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $soal) {
            $no++;
            $row = array();
            $row[] = $soal->PERTANYAAN;
            $row[] = $soal->PILIHAN_1;
            $row[] = $soal->PILIHAN_2;
            $row[] = $soal->PILIHAN_3;
            $row[] = $soal->PILIHAN_4;
			$row[] = $soal->JAWABAN;
			$row[] = $soal->PARENT_SOAL;

            $row[] = '<div style="text-align:center;"><a data-var="pk_soal_ujian" data-id='.$soal->PK_SOAL_UJIAN.' class="btn btn-sm btn-primary" onclick="getModalWithParam(this)" id="btn-edit-soal"
			data-href="'. base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_edit_soal".'" data-toggle="modal" data-target="#modal-content"
			><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a data-var="pk_soal_ujian" data-id='.$soal->PK_SOAL_UJIAN.' class="btn btn-sm btn-danger" onclick="getModalWithParam(this)" id="btn-edit-soal"
			data-href="'. base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_hapus_soal".'" data-toggle="modal" data-target="#modal-content"
			><i class="glyphicon glyphicon-trash"></i> Hapus</a></div>';

            $data[] = $row;
        }

        $output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->soalujian->count_all($fk_bab_mata_ajar),
					"recordsFiltered" => $this->soalujian->count_filtered($fk_bab_mata_ajar),
					"data" => $data,
                );
        echo json_encode($output);
    }

    public function vw_edit_soal(){
	    $data['soal'] = $this->soalujian->_get_soal_ujian_from_pk($this->input->post('pk_soal_ujian'));
		$this->load->view('sertifikasi/bank_soal/content/edit_soal', $data);
    }

    public function vw_hapus_soal(){
	    $data['soal'] = $this->soalujian->_get_soal_ujian_from_pk($this->input->post('pk_soal_ujian'));
		$this->load->view('sertifikasi/bank_soal/content/hapus_soal', $data);
    }

	public function vw_distribusi_soal(){
		$data['mata_ajar'] = $this->mataajar->_detail_mata_ajar();
		$data['user_bank_soal']	= $this->users->_get_user_bank_soal();
		$this->load->view('sertifikasi/bank_soal/content/distribusi_soal', $data);
	}

	public function vw_search_datatable(){
		$data['mata_ajar'] = $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/search_datatable', $data);
	}
}

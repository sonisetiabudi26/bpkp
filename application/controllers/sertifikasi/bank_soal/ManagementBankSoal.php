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
		$this->load->model('sertifikasi/kodesoal','kodesoal');
		$this->load->model('sertifikasi/babmataajar','babmataajar');
			$this->load->model('sertifikasi/soaldistribusi','soaldistribusi');
    }

    public function index(){
		$fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
		$username = $this->session->userdata('logged_in');
		//$fk_bab_mata_ajar=$this->input->post('fk_bab_mata_ajar');
		if(isset($fk_lookup_menu) && isset($username)){
			$data['title_page'] = 'BPKP Web Application';
			$data['content_page']='bank_soal/management_bank_soal.php';
			$data['username']=$username;
			getMenuAccessPage($data, $fk_lookup_menu);
		}else{
			redirect('/');
		}
    }
	public function view_search(){
		$id_bab_mata_ajar=$this->input->post('fk_bab_mata_ajar');
		if($id_bab_mata_ajar!=''){
			$datamataajar=$this->babmataajar->getdataByID($id_bab_mata_ajar);
			if($datamataajar!='nodata'){
				$data['fk_bab_mata_ajar']=$datamataajar[0]->PK_BAB_MATA_AJAR;
				$data['mataajar']=$datamataajar[0]->NAMA_MATA_AJAR;
				$data['babmataajar']=$datamataajar[0]->NAMA_BAB_MATA_AJAR;
			}else{
					$data['mataajar']='';
					$data['babmataajar']='';
			}
		}else{
			$data['mataajar']='';
			$data['babmataajar']='';
		}
			$this->load->view('sertifikasi/bank_soal/management_bank_soal', $data);
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
	public function vw_add_kode_soal(){
		$data['group_mata_ajar']	= $this->groupmataajar->_detail_group_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/add_kode_soal', $data);
	}

	public function tambah_kode_soal(){
			$datex=date('Y-m-d');
		if(!empty($this->input->post('fk_mata_ajar')) && !empty($this->input->post('kode_soal'))){
			$data = array(
			'fk_mata_ajar' => $this->input->post('fk_mata_ajar'),
			'kode_soal' => $this->input->post('kode_soal'),
			'kebutuhan_soal' => $this->input->post('jml_kode_soal'),
			'created_at' => $this->session->userdata('logged_in'),
			'created_date' =>$datex
			);
			if($this->kodesoal->save($data)=='Data Inserted Successfully'){
				print json_encode(array("status"=>"success", "data"=>"success"));
			}else{
				print json_encode(array("status"=>"error", "data"=>"error"));
			}
		}else{
			print json_encode(array("status"=>"Semua field harus diisi", "data"=>"Semua field harus diisi"));
		}
	}
	public function datatable_list_soal($fk_bab_mata_ajar=null)
    {
		$list = $this->soalujian->get_datatables($fk_bab_mata_ajar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $soal) {
            $no++;
            $row = array();
						$row[] = $soal->PK_SOAL_UJIAN;
					  $row[] = $soal->PERTANYAAN;
            $row[] = $soal->PILIHAN_1;
            $row[] = $soal->PILIHAN_2;
            $row[] = $soal->PILIHAN_3;
            $row[] = $soal->PILIHAN_4;
			// $row[] = $soal->JAWABAN;
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
		public function loadBabMataAjar(){
			$dataAll=$this->babmataajar->_detail_bab_mata_ajar();
			 $data = array();
			 //$no = $_POST['start'];
			 $a=1;

				 foreach ($dataAll as $field) {
						 $row = array();
						 $row[] = $a;
						 $row[] = $field->NAMA_GROUP_MATA_AJAR;
						 $row[] = $field->NAMA_MATA_AJAR;
						 $row[] = $field->NAMA_BAB_MATA_AJAR;
						 $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_data('."'".$field->PK_BAB_MATA_AJAR.'~babmataajar'."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
		public function loadKodeSoal(){
			$dataAll=$this->kodesoal->view();
			 $data = array();
			 //$no = $_POST['start'];
			 $a=1;

				 foreach ($dataAll as $field) {
						 $row = array();
						 $row[] = $a;
						 $row[] = $field->KODE_SOAL;
						 $row[] = $field->NAMA_MATA_AJAR;
						 $numrow=$this->kodesoal->total_soal($field->KODE_SOAL);
						 if($numrow!='nodata'){
							 $num=$numrow[0]->total_soal;
							 $num_kebutuhan_soal=$numrow[0]->kebutuhan_soal;
						 }else{
							 $num=0;
							 $num_kebutuhan_soal=0;
						 }
						 $disable=($num==$num_kebutuhan_soal ?'style="display:none"':'');
						 $row[] = $num.'/'.$field->KEBUTUHAN_SOAL;
						 $url= base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal/".$field->PK_KODE_SOAL;

						 $url_edit= base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_edit_kode_soal";
						 $row[] = '<td><a class="btn btn-sm btn-danger"  href="javascript:void(0)" title="Hapus" onclick="delete_data('."'".$field->PK_KODE_SOAL.'~kodesoal'."'".')"><i class="glyphicon glyphicon-trash"></i> Delete Kode</a>
						 <a class="btn btn-sm btn-warning"   onclick="getModal(this)" id="btn-add-soal" data-href="'.$url_edit.'"
		 						data-toggle="modal" data-target="#modal-content"><i class="glyphicon glyphicon-pencil"></i> Edit Kode</a>
						 <a class="btn btn-sm btn-info"  onclick="getModal(this)" id="btn-add-soal" data-href="'.$url.'"
		 						data-toggle="modal" data-target="#modal-content" '.$disable.' ><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</a>
						 </td>';

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
		public function loadKodeSoalpublish(){
			$dataAll=$this->kodesoal->view();
			 $data = array();
			 //$no = $_POST['start'];
			 $a=1;

				 foreach ($dataAll as $field) {
					 	$id_soal=$field->KODE_SOAL;
						$numrow=$this->kodesoal->total_soal($id_soal);
						if($numrow!='nodata'){
							$num=$numrow[0]->total_soal;
							$num_kebutuhan_soal=$numrow[0]->kebutuhan_soal;
						}else{
							$num=0;
							$num_kebutuhan_soal=0;
						}
						if($num==$num_kebutuhan_soal){
						 $row = array();
						 $row[] = $a;
						 $row[] = $field->KODE_SOAL;
						 $row[] = $field->NAMA_MATA_AJAR;

						 $disable=($num==$num_kebutuhan_soal ?'disabled':'');
						 $row[] = $num.'/'.$field->KEBUTUHAN_SOAL;
						 $row[] =($field->PUBLISH=='1'?'Yes':'No');
						 //$url= base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal/".$field->PK_KODE_SOAL;

						 $url_edit= base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_edit_kode_soal";
						 $row[] = '<td><a class="btn btn-sm btn-primary"  href="javascript:void(0)" title="update" onclick="publish('."'".$field->PK_KODE_SOAL."'".')"><i class="glyphicon glyphicon-pencil"></i>Publish</a>
						 </td>';

						 $data[] = $row;
						 $a++;
					 }
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
    public function vw_edit_soal(){
	    $data['soal'] = $this->soalujian->_get_soal_ujian_from_pk($this->input->post('pk_soal_ujian'));
		$this->load->view('sertifikasi/bank_soal/content/edit_soal', $data);
    }

    public function vw_hapus_soal(){
	    $data['soal'] = $this->soalujian->_get_soal_ujian_from_pk($this->input->post('pk_soal_ujian'));
		$this->load->view('sertifikasi/bank_soal/content/hapus_soal', $data);
    }

	public function vw_distribusi_soal($id){
		$data_kode_soal=$this->kodesoal->get_data_by_id_soal($id);
		if($data_kode_soal!='nodata'){
			$data['kode_soal'] =$data_kode_soal[0]->KODE_SOAL;
			$data['id_kode_soal']=$data_kode_soal[0]->PK_KODE_SOAL;
			$data['mata_ajar'] =$data_kode_soal[0]->NAMA_MATA_AJAR;
			$numrow=$this->kodesoal->total_soal($data_kode_soal[0]->KODE_SOAL);
			if($numrow!='nodata'){
				$data['num']=$numrow[0]->total_soal;
			}else{
				$data['num']=0;
			}
			$data['bab_mata_ajar']	= $this->babmataajar->_get_bab_from_fk_mata_ajar_value($data_kode_soal[0]->PK_MATA_AJAR);
		}
		$this->load->view('sertifikasi/bank_soal/content/distribusi_soal', $data);
	}

	public function vw_search_datatable(){
		$data['mata_ajar'] = $this->mataajar->_detail_mata_ajar();
		$this->load->view('sertifikasi/bank_soal/content/search_datatable', $data);
	}
	public function publish($id){
		$where=array(
			'PK_KODE_SOAL'=>$id,
		);
		$data_update=array(
			'PUBLISH'=>'1',
		);
		$update=$this->kodesoal->updateData($where,'kode_soal',$data_update);
		if($update=='success'){
			$output = array('msg' => 'success' , );
		}else{
				$output = array('msg' => 'error' , );
		}
		print json_encode($output);
	}
	public function delete($id)
	{
			$param=explode('~',$id);
			if($param[1]=='kodesoal'){
				$this->kodesoal->delete_by_id($param[0]);
				$this->soaldistribusi->delete_by_id($param[0]);

			}else if($param[1]=='babmataajar'){
					$this->babmataajar->delete_by_id($param[0]);
			}
			echo json_encode(array("status" => TRUE));
	}
}

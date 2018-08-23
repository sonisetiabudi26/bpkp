<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementUser extends CI_Controller {

	public function __construct(){
        // Load parent construct
        parent::__construct();
        $this->load->library('session');
    		$this->load->helper('url');
    		$this->load->model('sertifikasi/MenuPage','menupage');
				$this->load->model('sertifikasi/Users','user');
				$this->load->library('encryption');
    }

    public function index()
    {
      $fk_lookup_menu = $this->session->userdata('fk_lookup_menu');
      $username = $this->session->userdata('logged_in');

      if(isset($fk_lookup_menu) && isset($username)){
        $data['title_page'] = 'BPKP Web Application';
        $data['content_page']='pusbin/ManagementUser.php';
        $data['username']=$username;
				$data['menu_page']	= $this->menupage->_get_access_menu_page($fk_lookup_menu);
        $this->load->view('sertifikasi/homepage', $data);
      }else{
        redirect('/');
      }
    }
		public function LoadDateUserBank(){
      $dataAll=$this->user->_get_user_bank_soal_join('1');
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->USER_NAME;
             $row[] = $field->DESCR;
             $row[] = $field->USER_PASSWORD;
             $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$field->PK_USER."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
		public function LoadDateUserDiklat(){
      $dataAll=$this->user->_get_user_bank_soal_join('17');
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->USER_NAME;
             $row[] = $field->DESCR;
             $row[] = $field->USER_PASSWORD;
             $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$field->PK_USER."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
		public function LoadDateUserWidya(){
      $dataAll=$this->user->_get_user_bank_soal_join('4');
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->USER_NAME;
             $row[] = $field->DESCR;
             $row[] = $field->USER_PASSWORD;
             $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$field->PK_USER."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
		public function LoadDateUserFP(){
      $dataAll=$this->user->_get_user_bank_soal_join('28');
       $data = array();
       //$no = $_POST['start'];
       $a=1;

         foreach ($dataAll as $field) {
             $row = array();
             $row[] = $a;
             $row[] = $field->USER_NAME;
             $row[] = $field->DESCR;
             $row[] = $field->USER_PASSWORD;
             $row[] = '<a class="btn btn-sm btn-danger" style="width:100%" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$field->PK_USER."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
		public function vw_add_user($param){
			$data['param']	= $param;
			$this->load->view('sertifikasi/pusbin/content/add_user',$data);
		}
		function add_user(){
			$date = date('Ymd');
			$datex=date('Y-m-d');
			$username=$this->input->post('username');
			$password=$this->encryption->encrypt($this->input->post('password'));
			$fk_lookup_role=$this->input->post('role');
			 if($username!=''&& $password!=''){
						$data = array(
						 'USER_NAME' => $username,
						 'FK_LOOKUP_ROLE' => $fk_lookup_role,
						 'USER_PASSWORD' => $password
					 );
					 $insert=$this->user->save($data);
					 if($insert=='Data Inserted Successfully'){
						 print json_encode(array("status"=>"success", "msg"=>'Data berhasil disimpan'));
					 }else{
						 print json_encode(array("status"=>"error", "msg"=>'Data gagal disimpan'));
					 }
			}else{
				echo json_encode(array("status"=>'error','msg'=>'Data gagal disimpan'));
			}
		}
		public function delete_user($id)
		{
				$this->user->delete_by_id($id);
				echo json_encode(array("status" => TRUE));
		}
}

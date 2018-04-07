<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * created by : cipta ageung mahdiar
 * created date : @2018
 * 
 */

use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/jwt/JWT.php';
require APPPATH . '/libraries/jwt/BeforeValidException.php';
require APPPATH . '/libraries/jwt/ExpiredException.php';
require APPPATH . '/libraries/jwt/SignatureInvalidException.php';
use \Firebase\JWT\JWT;

class Rest extends REST_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('sertifikasi/lookup','lookup');
    }
    
    /** TODO: method untuk generate token user */
    public function auth_post(){
        /** get dari post */
        $username = $this->post('username',TRUE);
        $pass = $this->post('password',TRUE);
        $lookup_user_api = $this->lookup->_get_lookup_api_from_userdescr($username);
        
        /** echo json_encode(password_hash($dataadmin->password, PASSWORD_DEFAULT));exit;*/
        if ($lookup_user_api) {
            $this->responseValid($this->post('password'), $lookup_user_api);
        } else {
            $this->viewtokenfail($username);
        }
    }
    
    /** TODO: method untuk mengecek token setiap melakukan post, put, etc */
    protected function checkToken(){
        $jwt = $this->input->get_request_header('Authorization');
        try {
            $decode = JWT::decode($jwt, generateSecretKey(SECRET_KEY, SECRET_KEY_IN), array('HS256'));
            if ($this->lookup->_get_lookup_api_from_userdescr($decode->username)!=null) {
                return true;
            }
        } catch (Exception $e) {
            exit(json_encode(array('status' => '0' ,'message' => 'Invalid Token',)));
        }
    }
    
    /** TODO: method ketika response valid */
    private function responseValid($password_post, $lookup_user_api){
        /** get data user dan password dari lookup */
        $lookup_descr = explode_lookup_access($lookup_user_api->DESCR, 2);
        if (password_verify($password_post, $lookup_descr[1])) {
            /** set informasi id user */
            $lookupload['id'] = $lookup_user_api->PK_LOOKUP;
            $lookupload['username'] = $lookup_descr[0];
            
            /** set tanggal expired token */
            $date = new DateTime();
            $lookupload['iat'] = $date->getTimestamp(); //waktu di buat
            $lookupload['exp'] = $date->getTimestamp() + 3600; //satu jam
            
            /** generate access token */
            $output['access_token'] = JWT::encode($lookupload, generateSecretKey(SECRET_KEY, SECRET_KEY_IN));
            return $this->response($output, 'HTTP_OK');
        } else {
            $this->viewtokenfail($username);
        }
    }
    
    /** TODO: method untuk validasi jika generate token diatas salah */
    private function viewtokenfail($username){
        $this->response([
            'status'=>'0',
            'username'=>$username,
            'message'=>'Invalid Username Or Password'
        ], 'HTTP_BAD_REQUEST');
    }
}

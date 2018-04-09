<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * created by : cipta ageung mahdiar
 * created date : @2018
 *
 */

require(APPPATH.'libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class ClientRest extends REST_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('sertifikasi/lookup','lookup');
        $this->load->library('restclient');
    }
    
    /** TODO: contoh : $lookup_code_uri=URITOKEN, $lookup_code_access="USER_API_DC" */
    public function auth_post(){
        
        /** declare */
        $lookup_code_uri = $this->post('lookup_code_uri',TRUE);
        $lookup_code_access = $this->post('lookup_code_access',TRUE);
        
        return $this->response($this->generateAuthToken($lookup_code_uri, $lookup_code_access));
    }
    
    public function generateAuthToken($lookup_code_uri, $lookup_code_access){
        
        /** begin */
        $url_descr = $this->getUrlApi($lookup_code_uri);
        $user_descr = $this->getUserApi($lookup_code_access);
        
        /** get token dari url descr dan user descr */
        return $this->restclient->post($url_descr, $user_descr);
    }
    
    protected function getUrlApi($lookup_code_uri){
        /** cari url api dari table lookup berdasarkan lookup group dan code lookup */
        return $this->lookup->_get_lookup_from_lookupgroup_and_code(URL_API, $lookup_code_uri)->DESCR;
    }
    
    protected function getUserApi($lookup_code_access){
        /** cari user api dari table lookup berdasarkan lookup group dan code lookup */
        $lookup_user_api = $this->lookup->_get_lookup_from_lookupgroup_and_code(USER_ACCESS_API, $lookup_code_access);
        
        /** pecah kolom descr lookup menjadi user dan password */
        $lookup_descr = explode_lookup_access($lookup_user_api->DESCR, 2);
        
        /** pecah kolom descr lookup menjadi user dan password */
        $lookup_var = explode_lookup_access($lookup_user_api->NAME, 2);
        
        /** set nama dan kata sandi didalam array untuk diparsing */
        $data[$lookup_var[0]] = $lookup_descr[0];
        $data[$lookup_var[1]] = $lookup_descr[1];
        
        return $data;
    }
}


<?php
class Test extends My_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('sertifikasi/lookup','lookup');
        $this->load->library('restclient');
    }

    public function get_token_datacenter_post(){
        $json = $this->generateAuthToken(URITOKEN, USER_API_DC);
        return $this->response($json);
    }
}

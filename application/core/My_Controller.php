<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * created by : cipta ageung mahdiar
 * created date : @2018
 *
 */

require(APPPATH.'controllers/share/ClientRest.php');
//use Share\ClientRest;

/** TODO: ClientRest has extends REST_Controller and CI_Controller */
class My_Controller extends ClientRest {

    public function __construct(){
        parent::__construct();
        $this->load->library('Curl');
    }

    public function poshCurl($jsonData,$url){
      //Encode the array into JSON.
      $jsonDataEncoded = json_encode($jsonData);

      // Start session (also wipes existing/previous sessions)
      $this->curl->create($url);

      // Option
      $this->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));

      // Post - If you do not use post, it will just run a GET request
      $this->curl->post($jsonDataEncoded);

      // Execute - returns responce
      return $result = $this->curl->execute();
    }
}

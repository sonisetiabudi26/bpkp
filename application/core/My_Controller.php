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
    }
}
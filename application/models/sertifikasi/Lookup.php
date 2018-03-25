<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the lookup Model for CodeIgniter CRUD using Ajax Application.
class Lookup extends My_Model
{
	public $_table = 'lookup';
	public $primary_key = 'PK_LOOKUP';
}
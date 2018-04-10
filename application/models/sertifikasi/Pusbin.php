<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the menu_page Model for CodeIgniter CRUD using Ajax Application.
class Pusbin extends My_Model
{
	public $_table = 'pusbin';
	public $primary_key = 'PK_PUSBIN';


  function show_data(){

		$query = $this->db->get($this->_table);

			 return $query->result();

   }
   function delete_product(){
           $product_code=$this->input->post('PK_PUSBIN');
           $this->db->where('PK_PUSBIN', $product_code);
           $result=$this->db->delete($this->_table);
           return $result;
       }

}

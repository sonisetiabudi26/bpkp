<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * created by : cipta ageung mahdiar
 * created date : @2018
 * rest server bpkp
 *
 */

require 'Rest.php';
/** method ini akan diimplementasikan pada class api untuk consume client */
class Api extends Rest {
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->checkToken();
    }
    
    /** rest select */
    function index_get($table = '', $id = '') {
        if ($table == '') {
            redirect(base_url());
        } else {
            $this->load->model('sertifikasi/'.$table, $table);
            if ($id == '') {
                /** baseurl/?table=nama_table (semua data) */
                $data = $this->$table->_get_all();
            } else {
                /** baseurl/?table=nama_table&id=id (satu data) */
                $data = $this->$table->_get_by_id($id);
            }
            $this->response(array("data" => $data,'status'=>'success',), 200);
        }
    }
    
    /** rest insert */
    function index_post($table = '') {
        $insert = $this->db->insert($table, $this->post());
        $id = $this->db->insert_id();
        if ($insert) {
            $response = array(
                'data' => $this->post(),
                'table' => $table,
                'id' => $id,
                'status' => 'success'
            );
            $this->response($response, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    
    /** rest update */
    function index_put($table = '', $id = '') {
        $this->load->model('sertifikasi/'.$table, $table);
        $get_id = $this->$table->primary_key;
        $this->db->where($get_id, $id);
        $update = $this->db->update($table, $this->put());
        if ($update) {
            $response = array(
                'data' => $this->put(),
                'table' => $table,
                'id' => $id,
                'status' => 'success'
            );
            $this->response($response, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    
    /** rest delete */
    function index_delete($table = '', $id = '') {
        $this->load->model('sertifikasi/'.$table, $table);
        $delete = $this->$table->_delete_by_id($id);
        if ($delete) {
            $response = array(
                'table' => $table,
                'id' => $id,
                'status' => 'success'
            );
            $this->response($response, 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
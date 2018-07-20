<?php
class User_Model extends CI_Model {
    public function _construct() {
        
    }

    public function get_users() {
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }

}
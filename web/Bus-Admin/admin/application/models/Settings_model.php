<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
   	}
   

	  
	 function settings_viewing(){
		$query = $this->db->query(" SELECT * FROM `tbl_bus_setting` order by id DESC ")->row();
		return $query;
	 }
	 

	 public function update_settings($data){
	 	           
		$data['payment_option'] = implode(",", $data['payment_option'] );
		$result = $this->db->update('tbl_bus_setting', $data);
		return $result;
	 }
	 
  
   }
  ?>
<?php 

class Customer_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	   	 function get_customerdetails(){
	
		$query=$this->db->get('tbl_bus_user');
	    return $query->result();  
			    
	 }
	}
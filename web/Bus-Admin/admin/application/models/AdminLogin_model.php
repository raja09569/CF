<?php 

class AdminLogin_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
 	}
	 
	function login($username, $password) {
		$this->db->where('username',$username);					 
		$this->db->where('password',$password);							 
		$query=$this->db->get('tbl_bus_admin');
		
		//$numRows = $query_value;
		//echo $numRows;

		if ($query -> num_rows() == 1) {
			$query_value = $query->row();
			//echo $query -> num_rows();
			//echo $query_value;
			return $query_value;
		}else{	
			$this -> db -> where('status', '1');
			$this->db->where('username',$username);					 
			$this->db->where('password',$password);
			$query=$this->db->get('tbl_bus_agent');
			if ($query -> num_rows() == 1) {
				$query_value=$query->row();
				return $query_value;
			}
									
		}
	}
	
}
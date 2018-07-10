<?php 

class Rating_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 public function get_taing_details(){
		
		$this->db->select('tbl_bus.id as id, tbl_bus.bus_name, rating.average, AVG(rating.average) as average');
		$this->db->from('tbl_bus_rating as rating');
		$this->db->join('tbl_bus',' tbl_bus.id = rating.bus_id','left');
		$this->db->group_by("tbl_bus.id");
		
		            $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
		
		$query = $this->db->get();
		$result = $query->result();
		return $result	;
	 }
	 
	 public function get_ratingpopupdetails($id){
		 
		$this->db->select('rating.id as id, tbl_bus.bus_name, AVG(rating.average) as average, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",tbl_bus_user.username, rating.bus_quality, rating.punctuality, rating.Staff_behaviour, rating.average, rating.comments)) SEPARATOR " <=> ") as customer');
		$this->db->from('tbl_bus_rating as rating');
		$this->db->join('tbl_bus',' tbl_bus.id = rating.bus_id','left');
		$this->db->join('tbl_bus_user', 'rating.user_id = tbl_bus_user.id','left'); 
		$this->db->where('tbl_bus.id',$id);
		$this->db->group_by("tbl_bus.id");
		
		$query = $this->db->get();
		$result = $query->result();
		return $result	;
	 }
	 
	
}
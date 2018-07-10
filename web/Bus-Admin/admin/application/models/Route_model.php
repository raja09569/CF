<?php 

class Route_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 function get_busdetails(){
	   
			   /*$query = $this->db->get('route');
			   $result = $query->result();
			   return $result;*/
				 
                 $this->db->select('tbl_bus_route.id as id, tbl_bus_route.board_point, tbl_bus_route.board_time, tbl_bus_route.drop_point, tbl_bus_route.drop_time,
				 tbl_bus_route.fare, tbl_bus.bus_name');
			     $this->db->from('tbl_bus_route' );
			     $this->db->join('tbl_bus', 'tbl_bus_route.bus_id = tbl_bus.id','left');
				 $this->db->where('tbl_bus_route.status = 1', $user);
				 $this->db->where('tbl_bus.bus_status','1');
			     $this->db->group_by("tbl_bus_route.id");
				 
				    $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;			   
     }
	 
	 function  routedetails_add($data){
			   
			   $result = $this->db->insert('tbl_bus_route', $data);
			   return $result;
			   
			  /* $data1 = array(
			           
					   'bus_id' => $data['bus_id'],
					   'board_point' => $data['board_point'],
					   'board_time' => $data['board_time'],
					   'drop_point' => $data['drop_point'],
					   'drop_time' => $data['drop_time'],
					   'fare' => $data['fare'],
					   'created_by' => $data['created_by']
			   );
			
			    $this->db->insert('route', $data1);
			    return "success";*/
     }
	 
	 public function get_busname() {		 
		            
					$menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
				$this->db->where('bus_status','1');	
				$query = $this->db->get('tbl_bus');
			    $result = $query->result();
			    return $result; 				
	 }	
	  
	  public function get_busnames() {
		  
		  $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
		        $this->db->where('bus_status','1');
				$query = $this->db->get('tbl_bus');
			    $result = $query->result();
			    return $result; 				
	 }	
	 
	 function get_single_route($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('tbl_bus_route');
			   $result = $query->row();
			   return $result;  
	   }
	   
	 function route_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('tbl_bus_route', $data); 
			   return "Success";
	 }
	 
	 function view_popup_route($id){
		 
		       $this->db->select('tbl_bus_route.*, tbl_bus.id, tbl_bus.bus_name');
			   $this->db->from('tbl_bus_route');
			   $this->db->join('tbl_bus','tbl_bus_route.bus_id = tbl_bus.id','left');
			   
			   $this->db->where('tbl_bus_route.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
	 
	 	
      function routeupdate_delete_status($id, $data1)
	  {
		         $this->db->where('id',$id);
				 $result = $this->db->update('tbl_bus_route',$data1);
				 return $result;
	  }
	 
		
}
?>
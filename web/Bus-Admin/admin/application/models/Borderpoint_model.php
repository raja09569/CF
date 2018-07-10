<?php 

class Borderpoint_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	
	 function get_borderdetails(){
					  
			   /*$query = $this->db->get('board_points');
			   $result = $query->result();
			   return $result;	*/
			   
				 $this->db->select('bp.id as id, bp.pickup_point, bp.landmark, bp.address, bp.pickup_time, tbl_bus.bus_name, tbl_bus_route.board_point');
			     $this->db->from('tbl_bus_board_points as bp' );
			     $this->db->join('tbl_bus_route', 'bp.board_point = tbl_bus_route.id','left');
			     $this->db->join('tbl_bus', 'bp.bus_id = tbl_bus.id','left');
				 
				 $this->db->where('bp.status = 1', $user);
				 $this->db->where('tbl_bus.bus_status','1');
			     $this->db->group_by("bp.id");
				 
				  $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;  
			    
	 }

     function  boardpointdetails_add($data){
		   
			   $result =$this->db->insert('tbl_bus_board_points',$data);
			   return $result;
     }	

      public function get_busnamedetails() {
		               
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

     public function get_busroutedetails($id) {
		 
				
				$this->db->where('bus_id', $id);
				$query = $this->db->get('tbl_bus_route');
			    $result = $query->result();
									
					return $result;
					 
	   } 
	 
	 function get_single_boardpoint($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('tbl_bus_board_points');
			   $result = $query->row();
			   return $result;  
	 }
	 
	 function boardpoint_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('tbl_bus_board_points', $data); 
			   return "Success";
	 }
	 
	  public function get_busdetails() {
		  
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
	 
	 public function get_routeboardpoint() {
	
		        //$this->db->where('id', $id);
				$id=$_POST['value'];
				$this->db->where('bus_id', $id);
				$query = $this->db->get('tbl_bus_route');
			    $result = $query->result();
				
				foreach($result as $editrouteget)
				{
					echo '<option value="'.$editrouteget->id.'">'. $editrouteget->board_point.' </option>';
				}
			
				    return $result; 	

              
	 } 
	 
	 function boardupdate_delete_status($id, $data1){
		 
			   /*var_dump($id);
			   $this->db->where('id', $id);
			   $result = $this->db->delete('board_points');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }*/
			     $this->db->where('id',$id);
				 $result = $this->db->update('tbl_bus_board_points',$data1);
				 return $result;
	 }
	 
	 
	 function view_popup_boardpoint($id){
		 
		       $this->db->select('tbl_bus_board_points.*, tbl_bus.id, tbl_bus.bus_name, tbl_bus_route.board_point');
			   $this->db->from('tbl_bus_board_points');
			   $this->db->join('tbl_bus','tbl_bus_board_points.bus_id = tbl_bus.id','left');
			   $this->db->join('tbl_bus_route','tbl_bus_route.id = tbl_bus_board_points.board_point','left');
			   
			   $this->db->where('tbl_bus_board_points.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
}
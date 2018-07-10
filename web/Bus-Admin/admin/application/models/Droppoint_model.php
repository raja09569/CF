<?php 

class Droppoint_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	
	 function get_dropdetails(){
					  
			   /*$query = $this->db->get('board_points');
			   $result = $query->result();
			   return $result;	*/
			   
				/* $this->db->select('bp.id as id, bp.pickup_point, bp.landmark, bp.address, bp.pickup_time, bus.bus_name, route.board_point');
			     $this->db->from('board_points as bp' );
			     $this->db->join('route', 'bp.board_point = route.id','left');
			     $this->db->join('bus', 'bp.bus_id = bus.id','left');
			     $this->db->group_by("bp.id");
				 
				  $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;*/

                 $this->db->select('dp.id as id, dp.stoping_point, dp.landmark, dp.address, dp.drop_time, tbl_bus.bus_name, tbl_bus_route.drop_point');
			     $this->db->from('tbl_bus_drop_points as dp' );
			     $this->db->join('tbl_bus_route', 'dp.drop_point = tbl_bus_route.id','left');
			     $this->db->join('tbl_bus', 'dp.bus_id = tbl_bus.id','left');
				 $this->db->where('dp.status = 1', $user);
				 $this->db->where('tbl_bus.bus_status','1');
			     $this->db->group_by("dp.id");
				 
				  $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;      
	 }
	 
	  function  droppointdetails_add($data){
		   
			   $result = $this->db->insert('tbl_bus_drop_points',$data);
			   return $result;
     }

      public function get_dropbusname() {
		               
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

      public function get_dropbusroutedetails($id) {
		 
				
				$this->db->where('bus_id', $id);
				$query = $this->db->get('tbl_bus_route');
			    $result = $query->result();
									
					return $result;
					 
	   } 

      public function get_droprouteboardpoint() {
		
		        //$this->db->where('id', $id);
				$id=$_POST['value'];
				$this->db->where('bus_id', $id);
				$query = $this->db->get('tbl_bus_route');
			    $result = $query->result();
				
				foreach($result as $editrouteget)
				{
					echo '<option value="'.$editrouteget->id.'">'. $editrouteget->drop_point.' </option>';
				}
			
				    return $result; 	

              
	 } 	

      function get_single_dropdpoint($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('tbl_bus_drop_points');
			   $result = $query->row();
			   return $result;  
	 }

      public function get_dropbusdetails() {
		  
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

      function dropdpoint_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('tbl_bus_drop_points', $data); 
			   return $result;
	 }
	 
	  function dropupdate_delete_status($id,$data1){
		 
			  /* var_dump($id);
			   $this->db->where('id', $id);
			   $result = $this->db->delete('drop_points');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }*/
			     $this->db->where('id',$id);
				 $result = $this->db->update('tbl_bus_drop_points',$data1);
				 return $result;
	 }
	 
	  function view_popup_dropdetails($id){
		 
		       $this->db->select('tbl_bus_drop_points.*, tbl_bus.id, tbl_bus.bus_name, tbl_bus_route.drop_point');
			   $this->db->from('tbl_bus_drop_points');
			   $this->db->join('tbl_bus','tbl_bus_drop_points.bus_id = tbl_bus.id','left');
			   $this->db->join('tbl_bus_route','tbl_bus_route.id = tbl_bus_drop_points.drop_point','left');
			   
			   $this->db->where('tbl_bus_drop_points.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;			
	  }
	 	 

}
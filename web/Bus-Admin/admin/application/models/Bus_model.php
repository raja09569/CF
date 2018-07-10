<?php 

class Bus_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	function get_busdetails(){
		
		$this->db->select('tbl_bus.id as id, tbl_bus.bus_name, tbl_bus.bus_reg_no, tbl_bus.max_seats, tbl_bus.board_point, tbl_bus.board_time, tbl_bus.drop_point, tbl_bus.drop_time, tbl_bus_type.bus_type, tbl_bus.bus_status');
		$this->db->from('tbl_bus');
		$this->db->join('tbl_bus_type', 'tbl_bus.bus_type_id = tbl_bus_type.id','left');
	
		$this->db->where('tbl_bus.bus_status','1');
		/* $this->db->where('bus_type.status','1');*/
	
	
		$this->db->group_by("tbl_bus.id");
	
		$menu = $this->session->userdata('admin');
		if($menu!='1'){						
			$user = $this->session->userdata('id');
			$this->db->where('tbl_bus.created_by', $user);
		}
	
		$query = $this->db->get();

		$result = $query->result();

		return $result;
			
	}
	 
	   
	function userdetails_get($id){
	
		$query = $this->db->where('id',$id);
		$query = $this->db->get('tbl_bus');
		$result = $query->row();
		return $result; 
			
	}	
	
	function  busdetails_add($data){
		
		$array = $data['amenities_id'];			   
		$comma_separated = implode(",", $array);
		$data['amenities_id']=$comma_separated;
		//var_dump($comma_separated);
		//exit();						
		$result = $this->db->insert('tbl_bus', $data);
		return $result;
	}
	 
	function get_single_bus($id){
		$query = $this->db->where('id',$id);
			
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('tbl_bus.created_by', $user);
		}	
		$query = $this->db->get('tbl_bus');
		$result = $query->row();
		return $result;  
	}
	   
	function busdetails_edit($data, $id){
		
		$array = $data['amenities_id'];
		// var_dump($data);
		//exit();
		$comma_separated = implode(",", $array);
		$data['amenities_id']=$comma_separated;
	
		$this->db->where('id', $id);
		$result = $this->db->update('tbl_bus', $data);
		return $result;
	}
	   
	/* function busdetails_delete($id){
		 
			   var_dump($id);
			   $this->db->where('id', $id);
			   
			   $menu = $this->session->userdata('admin');
				   if($menu!='1'){
				   $user = $this->session->userdata('id');
				   $this->db->where('bus.created_by', $user);
	            }  
				
				
			   $result = $this->db->delete('bus');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }
	 }*/
	 
	 /*function get_usercategori($id){
				        
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('bus');
			   $result = $query->row();
               return $result; 		    
	 }*/
	 
	/* function get_usercategory($id){
		   
			   //get Business name and Category name
			   $this->db->select('fr.id as id, bi.business_name, fr.category, fr.category_status, bc.business_category_name');
		       $this->db->from('favourite as fr' );	
			   $this->db->join('business_information as bi', 'fr.business_id = bi.id','left');
			   //$this->db->join('user_category as uc', 'fr.category = uc.id','left');
			   $this->db->join('business_categories as bc', 'fr.category = bc.id','left');
				
			   $query = $this->db->where('fr.user_id',$id);	
			   $query = $this->db->get();
			   $result = $query->result();
			   return $result;
	 }*/
	 
	 public function update_delete_status($data,$data2){
		 
				 $this->db->where('id',$data);
				 $result = $this->db->update('tbl_bus_type',$data2);
				 return $result;
	 }
 
	 
	 function  bustype_add($data){

		   
			   $result = $this->db->insert('tbl_bus_type',$data);
			   return $result;
     }
     function check_Bustype($data){
     	         $new_data=$data['bus_type'];
			   $this->db->where('bus_type=',$new_data);
			   $query = $this->db->get('tbl_bus_type');
			   /*echo $this->db->last_query();*/
			   $result = $query->row();
			  
			   return $result;
     }
	 
	 function view_Bustype(){
			         
			   $query = $this->db->get('tbl_bus_type');
			   $result = $query->result();
			   return $result;
     }
	 
	 function get_single_bustype($id){
		      
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('tbl_bus_type');
			   $result = $query->row();
			   return $result;  
	   }
	   
	 function bustypedetails_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('tbl_bus_type', $data); 
			   return "Success";
	 }
	 
	 public function get_bustype_id() {
		        $query = $this->db->where('status','1');
				$query = $this->db->get('tbl_bus_type');
			    $result = $query->result();
			    return $result; 				
	 }	
	 
	 public function get_bus_typeid() {
		
				$query = $this->db->get('tbl_bus_type');
			    $result = $query->result();
			    return $result; 				
	 }	
	  
	 public function get_amenities_id(){
		 
		        $query = $this->db->get('tbl_bus_amenities');
			    $result = $query->result();
			    return $result;
	 }
	/* public function get_amenities(){
		   
		        $query = $this->db->get('amenities');
			    $result = $query->result();
			    return $result;		 
	 }*/
	 
	 	function get_buspopupdetails($id){
	
				$this->db->select('tbl_bus.*, tbl_bus.id as bus_id, tbl_bus_type.id, tbl_bus_type.bus_type, seat_layout.layout,
                
                GROUP_CONCAT(tbl_bus_amenities.amenities ORDER BY tbl_bus_amenities.id) as amenities'); 

				
                $this->db->from('tbl_bus');
                $this->db->join('tbl_bus_type', 'tbl_bus.bus_type_id = tbl_bus_type.id','left');   				               
                //$this->db->join('amenities', 'bus.amenities_id = amenities.id','left');
				$this->db->join('tbl_bus_seat_layout', 'tbl_bus_seat_layout.bus_id = tbl_bus.id','left'); 
				
				$this->db->join('tbl_bus_amenities', 'FIND_IN_SET(tbl_bus_amenities.id, tbl_bus.amenities_id) > 0','left');

				$this->db->group_by("tbl_bus.id");	
				
                $this->db->where('tbl_bus.id',$id); 
                $query = $this->db->get();			
			    $result = $query->row();	
			    return $result;				
	         }
	
	     public function busupdate_delete_status($id,$data1){
		 
				 $this->db->where('id',$id);
				 $result = $this->db->update('tbl_bus',$data1);
				 return $result;
	     }
}
?>
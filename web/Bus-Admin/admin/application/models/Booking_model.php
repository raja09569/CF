<?php 

class Booking_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	   	 function get_bookindetails(){
					  
			   
			     $this->db->select('pm.amount as offamount,bd.id as id, bd.booking_id, bd.payment_status,tbl_bus_customer_details.customer_name, bd.amount, bs.bus_name, rt.drop_point, rt.board_point, rt.drop_time, rt.board_time, bd.booking_date, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",tbl_bus_customer_details.customer_name,tbl_bus_customer_details.age,tbl_bus_customer_details.gender,tbl_bus_customer_details.seat_no)) SEPARATOR " <=> ") as customer');
				 $this->db->from('tbl_bus_booking_details as bd' );
			     $this->db->join('tbl_bus_customer_details', 'bd.booking_id = tbl_bus_customer_details.booking_id','left'); 
				 $this->db->join('tbl_bus as bs', 'bs.id = bd.bus_id','left');
				 $this->db->join('tbl_bus_route as rt', 'rt.id = bd.rout_id','left');
				  $this->db->join('tbl_bus_promo_details as pm', 'pm.code = bd.promo_code','left');
				 
				 $this->db->where('bs.bus_status','1');	
				  $this->db->where('bd.payment_status!=','');							
			     $this->db->group_by("bd.id");
				 
				  $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bs.created_by', $user);
					}

			     $result = $this->db->get()->result();	
			    			 
			     return $result;  
			    
	 }
	     
		 function view_popup_booking($id){
			 
	              $this->db->select('bd.id as id, bd.booking_id, bd.payment_status, bd.amount, bs.bus_name, rt.drop_point, rt.board_point, rt.drop_time, rt.board_time, bd.booking_date, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",tbl_bus_customer_details.customer_name,tbl_bus_customer_details.age,tbl_bus_customer_details.gender,tbl_bus_customer_details.seat_no)) SEPARATOR " <=> ") as customer');
				  
				
				 $this->db->from('tbl_bus_booking_details as bd' );
			     $this->db->join('tbl_bus_customer_details', 'bd.booking_id = tbl_bus_customer_details.booking_id','left'); 
				 $this->db->join('tbl_bus as bs', 'bs.id = bd.bus_id','left');
				 $this->db->join('tbl_bus_route as rt', 'rt.id = bd.rout_id','left');
				 $this->db->where('bd.id',$id);
			    
				 
				 $query = $this->db->get();
			     $result = $query->result();
				 
			     return $result;  
				
		 }
		 
	
		 
		 
}
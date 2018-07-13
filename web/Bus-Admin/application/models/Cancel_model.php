<?php 

class Cancel_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
		$model = Mage::getModel(form/form)->setData($data);
 	}
	
	
	
	
	function cancelation_ticket($data) {
	
           
			   $this->db->select('id');
			   $this->db->where('username',$data['username']);
			   $query=$this->db->get('tbl_bus_user');
			   $row1 = $query->row();
			   if(!empty($row1)){
			   
			   
			   $this->db->select('tbl_bus_booking_details.id as id,tbl_bus_booking_details.*,tbl_bus_booking_details.booking_date,tbl_bus_user.username,tbl_bus.bus_name,tbl_bus_route.board_point,
			   tbl_bus_route.drop_point,tbl_bus_route.board_time,tbl_bus_customer_details.customer_name,tbl_bus_customer_details.age,tbl_bus_customer_details.gender,tbl_bus_customer_details.seat_no');

			   $this->db->from('tbl_bus_booking_details');
			   $this->db->join('tbl_bus_user','tbl_bus_user.id = tbl_bus_booking_details.user_id','left');
			   $this->db->join('tbl_bus', 'tbl_bus_booking_details.bus_id=tbl_bus.id', 'left');
			   $this->db->join('tbl_bus_route', 'tbl_bus_route.id=tbl_bus_booking_details.rout_id', 'left');
			   $this->db->join('tbl_bus_customer_details', 'tbl_bus_booking_details.id = tbl_bus_customer_details.order_id', 'left');
			   //$this->db->join('booking_details', 'booking_details.id = customer_details.order_id', 'left');
			   
			   
			   $this->db->where('tbl_bus_booking_details.booking_id',$data['booking_id']);
			   $this->db->where('tbl_bus_booking_details.user_id',$row1->id);
			   $query = $this->db->get();
			   $row = $query->row();
			   //var_dump($row); exit;
			   $id=$row1->id;
			  // return $row; 

		       if(count($row)>0){
						
				       $datas = array('status' => 'Cancelled','payment_status' => 'Cancelled');
					   $this->db->where('user_id',$id);
					   $this->db->where('booking_id',$data['booking_id']);
					   $result = $this->db->update('tbl_bus_booking_details', $datas);
					  // echo $this->db->last_query();
					   return $row; 
					   
				   
			   }
			   else
			   {
				   return false;
			   }
			    }else
			   {
				   return false;
			   }

			   
			   


		      
	}
	
	
}
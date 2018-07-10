<?php 

class Cancellation_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 public function view_cancel_details(){
		 
		         $this->db->select('tbl_bus_cancellation.id as id, tbl_bus_cancellation.percentage, tbl_bus_cancellation.cancel_time, tbl_bus_cancellation.flat, tbl_bus.bus_name');
			     $this->db->from('tbl_bus_cancellation' );
			     $this->db->join('tbl_bus', 'tbl_bus_cancellation.bus_id = tbl_bus.id','left');
				  $this->db->where('tbl_bus.bus_status','1');
			     $this->db->group_by("tbl_bus_cancellation.id");
				 
				    $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;  
	 }
	
	 function cancel_tickets($data){
		 
	
		 //$result = $this->db->insert('cancellation', $data);
		 //return $result;
		 
		 $data1 = array(							 
							 'bus_id' => $data ['bus_id'],
							 'advertisement_status' => $data ['advertisement_status'],
                             'cancel_time'=>$data ['cancel_time'],
                             'percentage'=>$data ['percentage'],
                             'flat'=>$data ['flat'],
                             'type'=>$data ['type']

                                        );										
						      $this->db->insert('tbl_bus_cancellation', $data1);

						      return "success";
		 

	 }
	 
	 public function get_bus_details(){
		 
		    $this->db->select('tbl_bus.id, tbl_bus.bus_name, tbl_bus_cancellation.bus_id');
		    $this->db->from('tbl_bus' );
			$this->db->join('tbl_bus_cancellation', 'tbl_bus.id = tbl_bus_cancellation.bus_id','left');
			//$this->db->join('cancellation ON bus.id = cancellation.bus_id','left');
			$this->db->where('bus_status','1');
			$query = $this->db->where('NOT EXISTS (select * from tbl_bus_cancellation where tbl_bus.id=tbl_bus_cancellation.bus_id)', '', FALSE);
			
			 $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}
			
			
		    $query = $this->db->get();
		    $result = $query->result();
		 
		    return $result;
		
	 }
	 
	 public function get_single_cancel($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('tbl_bus_cancellation');
		 $result = $query->row();
		 return $result;
	 }
	 
	 public function edit_cancel_details($data ,$id){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('tbl_bus_cancellation', $data);
		 return $result;
	 }
	 
	 public function edi_bus_details(){
		 
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
	 
	 public function cancellation_delete($id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->delete('tbl_bus_cancellation');
		 if($result)
		 {
			return "success"; 
		 }
		 else
		 {
			 return "error";
		 }
	 }
	 
	 function view_popup_cancellation($id){
		 
		       $this->db->select('tbl_bus_cancellation.*, tbl_bus.id, tbl_bus.bus_name');
			   $this->db->from('tbl_bus_cancellation');
			   $this->db->join('tbl_bus','tbl_bus_cancellation.bus_id = tbl_bus.id','left');
			   
			   $this->db->where('tbl_buscancellation.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
	 

	
}
	
	
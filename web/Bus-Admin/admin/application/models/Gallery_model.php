<?php 

class Gallery_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 function get_gallery(){
		
				$this->db->select('tbl_bus_gallery.bus_id, tbl_bus.bus_name, count(tbl_bus_gallery.id) as total_images');
				$this->db->from('tbl_bus_gallery');
				$this->db->join('tbl_bus', 'tbl_bus.id = tbl_bus_gallery.bus_id','left');
				 $this->db->where('tbl_bus.bus_status','1');
				$this->db->group_by("tbl_bus_gallery.bus_id");

				       $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}			  
				$query = $this->db->get();
				$result = $query->result();
				return $result;
	   
	 }
	 
	 public function get_gallerydetails() {
		              
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
	 
	 /*	function get_shops() {
		
		$menu = $this->session->userdata('id');
		
		$menu1 = $this->session->userdata('admin');
		if($menu1!='1'){
		$this->db->where('created_user', $menu);
		}
		$query = $this->db->get('shop_details');
		 
		// $q = $this->db->get('created_user');
		$result = $query->result();
		return $result;
   	              }
	 */
	 function  Gallery_add($data){
		 
			   $result =$this->db->insert('tbl_bus_gallery',$data);
			   return $result;
     }

     function get_bus_gallery($id) {
				
				$this->db->select('tbl_bus_gallery.id, tbl_bus_gallery.image, tbl_bus.bus_name');
				//$this->db->select('bus_gallery.bus_id, bus_gallery.image, bus.bus_name');
				$this->db->from('tbl_bus_gallery');
				$this->db->join('tbl_bus', 'tbl_bus.id = tbl_bus_gallery.bus_id');
				$this->db->where('tbl_bus_gallery.bus_id', $id);
				
				        $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('tbl_bus.created_by', $user);
					}		
	
				$query = $this->db->get();
				$result = $query->result();
				return $result;
	 }

	 
	 
	 
	 /*	function get_shop_gallery($id) {
		
		$this->db->select('shop_gallery.id, shop_gallery.image_path, shop_details.shop_name');
		$this->db->from('shop_gallery');
		$this->db->join('shop_details', 'shop_details.id = shop_gallery.shop_id');
		$this->db->where('shop_gallery.shop_id', $id);
		
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('shop_details.created_user', $user);
		}
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
*/
	 
	 function delete_gallery_images($id) {
		
				 $this->db->where('id', $id);
				 $result = $this->db->delete('tbl_bus_gallery'); 

				 if($result) {
					 return "Success";
				 }
				 else {

					 return "Error";
				 }
	 }
	 

	 

	
 
}
<?php
	 
	class Map_Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			 
			$this->load->database();
		}
 
		 public function getAllStands($eventid) {
			 try{
				$this->db->select("e.Contact_details,e.Market_doc,e.Logo,a.Id,a.Name,a.Booked,a.mapx,a.mapy,a.image,a.standdetails,c.Url,a.price");
				$this->db->from("stands a,map c,company e");
				$this->db->where("a.EventId=",$eventid);
				$this->db->where("a.mapid=c.ID");
				$this->db->where("e.EventId=",$eventid);
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				   return $query->result_array();
			 	else
					return false;
			 }
			 catch(Exception $ex)
			 {
				 echo "Message". $ex->getMessage();
				 return false;
			 }
		}
	}
	
/* End of file  */
 
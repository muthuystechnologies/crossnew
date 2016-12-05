<?php
class Events_model extends CI_Model {
	
	var $table = "events";

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAllEventDetails() {
		
		try { 
		$query =$this->db->select("Id,Name,Location,EventDate,latitude,longitude");
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0)
 	        return $query->result_array();	    		
		else
			return false;
		}
		catch(Exception $e)
		{
			echo "Message". $ex->getMessage();
			return false;
		}
	}
}

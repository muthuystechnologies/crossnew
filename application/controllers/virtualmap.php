<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Description :	Controller for fetching the stands from the db and show it on the screen
					to display the data through angular js.
	Started on 	: 	02-12-2016 4:30 pm
	Ended on 	: 	02-12-2016 7:30 pm 
	
*/
class Virtualmap extends CI_Controller {

	 
	 public function __construct() {
		
		parent::__construct();
		$this->load->model('map_model');
		 
	 }
	 
	public function index()
	{
		$eventid = $_GET['id'];
		$standdetails = array();
		
		$stand = $this->map_model->getAllStands($eventid);
		
		if (	isset($stand)
			&&	is_array($stand) === true
			&&	count($stand) > 0
		) {
			foreach($stand as $key => $value)
			{
				$stands[]= array("mapurl" => $value['Url'],"name" => $value["Name"],"Booked" => intval($value["Booked"]),"mapx" => intval($value["mapx"]),"mapy" => intval($value["mapy"]),"price" => $value['price'],"contactdetails" => $value['Contact_details'],"marketdoc" => $value['Market_doc'],"logo" => $value['Logo'],"image" => $value['image'],"standdetails" => $value['standdetails']);
			}
			$standdetails['stand'] = json_encode($stands);
		}
		
		$this->load->view('virtualmapnew_view',$standdetails);
	}
}

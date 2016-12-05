<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/*
		Description :	This class is to get all the events from the database and displays on the home screen.
		Started on 	: 	02-12-2016 4:30 pm
		Ended on 	: 	02-12-2016 7:30 pm 
		
	*/
class Home extends CI_Controller {
 	 public function __construct() {
		parent::__construct();
		// To declare a model for fetching the events
		$this->load->model('Events_model');
		
	 }

	 public function index()
	{
		 
		// Below line fetches the data from the events tables
		$event = $this->Events_model->getAllEventDetails();
		
		// Fetched data to be stored into array variable
		foreach($event as $key => $value)
		{
			$events[]= array("ID" => $value['Id'],"edate" => $value["EventDate"],"Location" => $value["Location"],"name" => $value["Name"] ,"lat"=> floatval($value["latitude"]),"lon"=> floatval($value["longitude"]));
		}
		// This is convert the data into json format 
		$eventdetails['event'] = json_encode($events);
		 
		
		// load the view to show on the screen 
		$this->load->view('home_new',$eventdetails);
	}
}

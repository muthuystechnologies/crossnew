<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	
/*
    Description :	Rest Api for fetching the events from the db and show it on the screen
					to display the data through angular js.
	Started on 	: 	02-12-2016 4:30 pm
	Ended on 	: 	02-12-2016 7:30 pm 
	
*/
	require APPPATH.'/libraries/REST_Controller.php';	
	class Eventdetails extends REST_Controller 
	{
		function __construct()
		{
			// Construct our parent class
			parent::__construct();
			
			// Loads the event model 
			$this->load->model('Events_model');	
		}
		
		// The below function gets all the events and send the json format 
		function getevents_get()
		{
			
		$events = $this->Events_model->getAllEventDetails();
		
		// to check the events array is blank or not
		if (	isset($events)
			&&	is_array($events) === true
			&&	count($events) > 0
		) {
			
			$data['eventdetails'] = $events;
			
			// converting the events array to json format and returns api data response 
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
			echo $this->response($data, 200);
					exit;
				}
			}
		
	}	
/* End of file : events */
 

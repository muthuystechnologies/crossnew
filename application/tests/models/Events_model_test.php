<?php
class Events_model_test extends TestCase {
	
	var $table = "events";

	function setup()
		{
			$this->resetInstance();
			$this->CI->load->model('Events_model');
			$this->obj = $this->CI->Events_model;
		}
		
	public function test_getAllEventDetails() {
		
		      $list = $this->obj->getAllEventDetails();
			  $expected =2;
			  $output =$this->assertEquals($expected,count($list));
	}
}

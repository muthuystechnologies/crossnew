<?php
	 
	class Registration_Model_test extends TestCase
	{
		function setup()
		{
			$this->resetInstance();
			$this->CI->load->model('registration_model');
			$this->obj = $this->CI->registration_model;
		}
		public function test_alreadyexists() {
			  $fdata = array("Name" => "testing", "Contact_details"=> "test details");
			  $list = $this->obj->alreadyexists($fdata);
			  $expected =1;
			  $output =$this->assertEquals($expected,count($list));
			  
			
		}
		public function test_insertcompany() {
			  $fdata = array("Name" => "testing", "Market_doc" => "testing.doc","Contact_details"=> "test details","Logo"=>"testlogo.png");
			  $list = $this->obj->insertcompany($fdata);
			  $expected = 1;
			  $output =$this->assertEquals($expected,count($list));
			
		}
		
	}
	
/* End of file  */
 
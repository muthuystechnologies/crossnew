<?php
	 
	class Map_Model_test extends TestCase
	{
		function setup()
		{
			$this->resetInstance();
			$this->CI->load->model('map_model');
			$this->obj = $this->CI->map_model;
		}
 
		 public function test_getAllStands() {
			  $list = $this->obj->getAllStands(1);
			  $expected = count($list);
			  $this->assertEquals($expected,count($list));
		}
	}
	
/* End of file  */
 
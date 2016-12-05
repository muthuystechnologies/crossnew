<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/*
		Description :	This class is to get all the events from the database and displays on the home screen.
		Started on 	: 	02-12-2016 4:30 pm
		Ended on 	: 	02-12-2016 7:30 pm 
		
	*/
class Home_test extends TestCase {
 	 

	 public function test_index()
	{
		 
		 $output = $this->request('GET', ['home', 'index']);
        $this->assertContains('<title>Exposition</title>', $output);
	}
	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}

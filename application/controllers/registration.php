<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/**
		* @Page				: Registration controller
		* @Description		: Function in this controller deals with registration related functionalities
 		* @last updated on	: 19-09-2017
	*/
	require APPPATH.'/libraries/REST_Controller.php';
	
	class Registration extends REST_Controller
	{
		function __construct()
		{
			// Construct our parent class
			parent::__construct();
			
			$this->load->model('registration_model');
		
		}
		/* Create Member */
		function createcompany_post()
		{
			$contactdetails		= trim($this->input->post('contactdetails'));
			$companyadmin		= trim($this->input->post('companyadmin'));
			$createddate		= date('Y-m-d H:i:s');
			$valid = $this->validation($contactdetails	,$companyadmin);
			 
			if($valid)
			{
				$registration_data =  array();
				$imagepath1 = $imagepath2="";
				if(isset($_FILES['marketdoc']))
					$marketdoc          = $_FILES['marketdoc'];
				if(isset($_FILES['logo']))
					$companylogo		= $_FILES['logo'];
				$uploaded = false;
				if((!empty($marketdoc))) 
					{
						$tmp_name1	= $marketdoc["tmp_name"];
						$file1		= $marketdoc["name"];	
						$imagepath1 = "uploads/".$file1;
						if(move_uploaded_file($tmp_name1, $imagepath1))
							$uploaded = true;
					}
				if((!empty($companylogo))) 
					{
						$tmp_name1	= $companylogo["tmp_name"];
						$file1		= $companylogo["name"];	
						$imagepath2 = "uploads/".$file1;
						if(move_uploaded_file($tmp_name1, $imagepath2))
							$uploaded = true;
						else
							$uploaded =false;
					}
				if($uploaded)
					{
						$registration_data = array (
							"Name" 		=> $companyadmin,
							"Contact_details"		=>	$contactdetails,
							"Logo"  => $imagepath1,
							"Market_doc" => $imagepath2
							
						);
						$regid	= $this->registration_model->insertcompany($registration_data);
						$data["stat"] = "success";
						$data["message"] = "Company Inserted success!";
						echo $this->response($data, 200);
						exit;
					}
			}
			else
			{
				$data["stat"] = "failure";
				echo $this->response($data, 200);
				exit;
			} 
			
		}
		
		function Validation($contactdetails,$companyadmin)
		{
			$validity = true;
			if(empty($contactdetails)){
				$data['message'] = 'contact details is blank';
				$validity = false;
			} elseif(empty($companyadmin)){
				$data['message'] = 'Company Admin is blank';
				$validity = false;
			}else{
				/* Check User Already Exist or not */
				$wheredata  = array(
				"Name"					=>	$companyadmin,
				"Contact_details"		=>	$contactdetails,
				);
				$CompanyExists	= $this->registration_model->alreadyexists($wheredata);
				 
				if(isset($CompanyExists) && is_array($CompanyExists) && count($CompanyExists) > 0 )
				{
						$data["message"]	= "Company already exists.";
						$validity			= false;
				}
						
			}
			return $validity;
		}
		
		
	}

/* End of file register.php */
/* Location: ./application/controllers/register.php */

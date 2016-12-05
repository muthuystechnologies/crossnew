<?php
	 
	class Registration_Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			 
			$this->load->database();
		}
		
		 
		public function insertcompany($form_data)
		{
			try
			{
				if(! $this->db->table_exists('company'))
					throw new Exception('company table not exists');
				
				$this->db->insert('company', $form_data);
			
				if ($this->db->affected_rows() > 0 )
					return $this->db->insert_id();
				else 
					return FALSE;
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				log_message('Error', $e->getMessage(), '');
				return;
			}
		}
		
		 
		public function alreadyexists($whereArray=NULL)
		{
			try
			{
				if(! $this->db->table_exists('company'))
					throw new Exception('company table does not exists');
				if($whereArray != NULL)
					$this->db->where($whereArray);
				$queryresult = $this->db->get('company');

				if ($queryresult->num_rows() > 0)
				{
					return $queryresult->result_array();
				}
				else
				{
					return FALSE;
				}
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				return;
			}
		}		
				
	}
	
/* End of file  */
 
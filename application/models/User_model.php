<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	

	// this function check is user already exist
	public function userExist($email)
	{
		$this->db->where('email', $email); 

		$query = $this->db->get('users'); 

		if ($query->num_rows() > 0) {
			# code...
			return TRUE;
		}else 
		{
			return FALSE;
		}	

	}

	//insert User Registration data
	public function insertUserRegistrationData($email, $fullname, $sex, $password)
	{
		$data = array(

			'fullname' 	=> $fullname,
			'sex' 		=> $sex,
			'password'	=> $password,
			'email' 	=> $email 

		);

		$this->db->insert('users', $data); 

		$insert_id = $this->db->insert_id(); 

		return $insert_id;
		

	}

	// this function process user login
	public function getLoginData($email, $password)
	{
		$this->db->where('email', $email); 
		$this->db->where('password', $password); 

		$query = $this->db->get('users'); 

		if ($query->num_rows() > 0) {
			# code...
			return TRUE;
		}else 
		{
			return FALSE;
		}	

	}

	// this function check is user already exist
	public function userEmailExist($email)
	{
		$this->db->where('email', $email); 

		$query = $this->db->get('users'); 

		if ($query->num_rows() > 0) {
			# code...
			return TRUE;
		}else 
		{
			return FALSE;
		}	

	}


	
}
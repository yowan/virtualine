<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
	}

	//process login
	public function login()
	{
		// validate form input
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('login');
			$this->load->view('template/footer');

		}else
		{
			$email 		= $this->input->post('email');
			$rawpass 	= $this->input->post('password');

			$password = md5($rawpass);

			$result = $this->User_model->getLoginData($email, $password);

			if ($result == FALSE) {

				$error = "User not Found . Please Register";

				$this->session->set_flashdata('error', $error);
				# code...
				redirect('home/login');
			}else 
			{
				//$success = "User not Found . Please Register";

				//$this->session->set_flashdata('success', $success);
				
				redirect('Dashboard');
			}

		}



		
	}

	public function register()
	{
		
		//process registration form
		$this->form_validation->set_rules('sex', 'Your sex');
		$this->form_validation->set_rules('name', 'Your fullname', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		
		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header');
			$this->load->view('register');
			$this->load->view('template/footer');
		}else 
		{
			//collect form data 
			$fullname 	= $this->input->post('name');
			$sex 		= $this->input->post('sex');
			$email 		= $this->input->post('email');
			$rawpass 	= $this->input->post('confirm_password');

			// verify if user exist
			$result = $this->User_model->userExist($email);

			if ($result == TRUE) {

				$error = "User Already Exist, Login";

				$this->session->set_flashdata('error', $error);
				# code...
				redirect('home/login');
			}else 
			{
				//insert data in database
				$password = md5($rawpass);

				$result = $this->User_model->insertUserRegistrationData($email, $fullname, $sex, $password);

				if ($result > 0) 
				{
					$success = "Registration successfull, Login";

					$this->session->set_flashdata('success', $success);
					# code...
					redirect('home/login');
				}else 
				{
					$error = "Registration not successfull, Try Again";

					$this->session->set_flashdata('error', $error);
					# code...
					redirect('home/register');
				}

				
			}



			



			//redirect to login


		}


	}

	// Geting user email for  password reset
	public function resetpassword()
	{
		// validating email input
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header');
			$this->load->view('resetpassword');
			$this->load->view('template/footer');
		}else 
		{
			
			// get email
			$email = $this->input->post('email');


			// check if email exist in database 
			$result = $this->User_model->serEmailExist($email);

			if ($result = TRUE) {
				// email the user 



				//insert the token and the code in datebase

			}else 
			{

				// redirect user to login page 



			}

			

		}

		
	}

	public function verifypasswordresetcode()
	{
		$this->load->view('template/header');
		$this->load->view('verifypasswordresetcode');
		$this->load->view('template/footer');
	}

	public function newpassword()
	{
		$this->load->view('template/header');
		$this->load->view('newpassword');
		$this->load->view('template/footer');
	}



	
}
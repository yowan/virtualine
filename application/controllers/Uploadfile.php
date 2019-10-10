<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadfile extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function paymentsuccess()
	{
		$this->load->view('template/header');
		$this->load->view('paymentsuccess');
		$this->load->view('template/footer');
	}

	
}
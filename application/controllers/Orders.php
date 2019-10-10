<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('savedorders');
		$this->load->view('template/footer');
	}


	public function payment()
	{
		$this->load->view('template/header');
		$this->load->view('payment');
		$this->load->view('template/footer');
	}

	public function paymentsuccess()
	{
		$this->load->view('template/header');
		$this->load->view('paymentsuccess');
		$this->load->view('template/footer');
	}




}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('agent');
		$this->load->view('template/footer');		
	}

	public function agents()
	{
		$this->load->view('template/header');
		$this->load->view('agents');
		$this->load->view('template/footer');
	}
}
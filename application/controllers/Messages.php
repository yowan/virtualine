<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('messages');
		$this->load->view('template/footer');
	}

	public function readmessage()
	{
		$this->load->view('template/header');
		$this->load->view('readmessage');
		$this->load->view('template/footer');
	}

	



}
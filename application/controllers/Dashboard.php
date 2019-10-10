<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}

	public function updateprofile()
	{
		$this->load->view('template/header');
		$this->load->view('updateprofile');
		$this->load->view('template/footer');
	}

	public function upgrade()
	{
		$this->load->view('template/header');
		$this->load->view('upgrade');
		$this->load->view('template/footer');
	}

	public function logout()
	{
		$this->load->view('template/header');
		$this->load->view('logout');
		$this->load->view('template/footer');
	}

}
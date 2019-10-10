<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model {
	
	public function getMessages()
	{
		$this->db->get('message');

		$query = $this->result();

		return $query;
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		echo "Hello! Welcome to Forum.";
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='pankaj.arora'")->row_array()['id'];
		echo $user_id;
	}
}




/*End of Controller*/
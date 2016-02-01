<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('forum_model');

	}
	public function view_generate()
	{
		$data = $this->forum_model->fetch_ques();
		foreach ($data as &$question) 
		{
			$question['answers'] = $this->forum_model->fetch_ans($question['id']);
			foreach ($question['answers'] as &$answer) 
			{
				$answer['comments'] = $this->forum_model->fetch_ans($answer['id']);	
			}
		}
		return $data;
	}

	public function index()
	{
		echo "Hello! Welcome to Forum.";
		echo "<br>";
		print_r($this->forum_model->fetchmail_a(1));
	}

	public function post()
	{
		return $this->forum_model->post_ques($this->session->userdata('unnamed'));    /*Returns 1 if post successful.
																						0 if not.*/	
	}
	public function edit_ques($ques_id)
	{
		return $this->forum_model->update($ques_id,$this->session->userdata('unnamed'));      /*Returns 1 if successful.
																								0 if not.
																								-1 if User not allowed to do so. Call via AJAX. Pass question_id given in JSON.*/
	}
	public function answer($question_id)
	{
		if($this->forum_model->answer($ques_id,$this->session->userdata('unnamed')))
		{
			$maillist = $this->forum_model->fetchmail_a($question_id);
			foreach ($maillist as $mailee)
			{
				$this->email->from();
				$this->email->to($mailee['email']);
				$this->email->message("Someone Answered.");
				$this->email->send();
			}
		}																							    /*Returns 1 if successful.
																										0 if not.
																										-1 if User not allowed to do so. Call via AJAX. Pass question_id given in JSON.*/
	}

	public function edit_answer($ans_id)
	{
		return $this->forum_model->edit_answer($ans_id,$this->session->userdata('unnamed'));  /*Returns 1 if successful.
																								0 if not.
																								-1 if User not allowed to do so. Call via AJAX. Pass question_id given in JSON.*/
	}

	public function comment_a($ans_id)
	{
		if($this->forum_model->comment_ans($ans_id,$this->session->userdata('unnamed')))
		{
			$maillist = $this->forum_model->fetchmail_ca($ans_id);
			foreach ($maillist as $mailee)
			{
				$this->email->from();
				$this->email->to($mailee['email']);
				$this->email->message("Someone Answered.");
				$this->email->send();
			}

		}   																					/*Returns 1 if post successful.
																								0 if not.*/  
	}
	public function comment_q($ques_id)
	{
		if($this->forum_model->comment_q($ques_id,$this->session->userdata('unnamed')))
		{
			$maillist = $this->forum_model->fetchmail_cq($ques_id);
			foreach ($maillist as $mailee)
			{
				$this->email->from();
				$this->email->to($mailee['email']);
				$this->email->message("Someone Commmented on question.");
				$this->email->send();
			}
		}  																					/*Returns 1 if post successful.
																								0 if not.*/ 
	}

}


	



/*End of Controller*/

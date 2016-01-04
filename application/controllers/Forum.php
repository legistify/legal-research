<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		print_r(json_encode($this->view_generate()));
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
		return $this->forum_model->answer($ques_id,$this->session->userdata('unnamed'));     /*Returns 1 if successful.
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
		return $this->forum_model->comment_ans($ans_id,$this->session->userdata('unnamed'));   /*Returns 1 if post successful.
																								0 if not.*/  
	}
	public function comment_c($comm_id)
	{
		return $this->forum_model->comment_comm($comm_id,$this->session->userdata('unnamed'));   /*Returns 1 if post successful.
																								0 if not.*/ 
	}

}


	



/*End of Controller*/
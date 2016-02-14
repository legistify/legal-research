<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('forum_model');
		$userdata = array('unnamed'=>'pankaj.arora');
		$this->session->set_userdata($userdata);

	}
	public function questions()
	{
		$data['questions'] = $this->forum_model->fetch_ques();
		foreach ($data['questions'] as &$question) 
		{
			$question->answer = $this->forum_model->fetch_best_ans($question->id);
		}
		// print_r($data);
		$this->load->view('qna',$data);
	}

	public function index()
	{
		// echo "Hello! Welcome to Forum.";
		// echo "<br>";
		// print_r($this->forum_model->fetchmail_a(1));
		
	}

	public function answer($question_id)
	{
		$data['question'] = $this->forum_model->fetch_ques_id($question_id);
		$data['user_type'] = $this->forum_model->fetch_user_type($this->session->userdata('unnamed'));
		$data['answers'] = $this->forum_model->fetch_ans($question_id);
		foreach ($data['answers'] as &$answer) 
		{
			$answer->comments = $this->forum_model->fetch_comm($answer->id);
		}
		// print_r($data);
		$this->load->view('answers_page',$data);
		// print_r($data);
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
	public function answer_post($question_id)
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
		/*if($this->forum_model->comment_ans($ans_id,$this->session->userdata('unnamed')))
		{
			$maillist = $this->forum_model->fetchmail_ca($ans_id);
			foreach ($maillist as $mailee)
			{
				$this->email->from();
				$this->email->to($mailee['email']);
				$this->email->message("Someone Answered.");
				$this->email->send();
			}
		}*/
		$question_id = $this->forum_model->comment_ans($ans_id,$this->session->userdata('unnamed'));
		if($question_id!=0)
		{
			$url = './forum/answer/'.$question_id;
			redirect($url);
		}
		   																					/*Returns 1 if post successful.
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

	public function vote_ans($ans_id,$int)
	{
		$question_id = $this->forum_model->vote_a($ans_id,$int);
		$url = './forum/answer/'.$question_id;
		redirect($url);
	}
	public function vote_que($question_id)
	{
		$this->forum_model->vote_q($question_id,1);
		$url = './forum/answer/'.$question_id;
		redirect($url);
	}

	public function vote_comm($comment_id)
	{
		$question_id = $this->forum_model->vote_c($comment_id);
		$url = './forum/answer/'.$question_id;
		redirect($url);
	}

}


	



/*End of Controller*/

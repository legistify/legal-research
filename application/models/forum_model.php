<?php
class Forum_model extends CI_Model
{
	/*Implement Delete functions if needed.*/
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	public function fetch_ques()
	{
		$query_str = "SELECT questions.id,questions.title,questions.description,questions.votes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id";
		$query =$this->db->query($query_str);
		return $query->result_array();
	}
	public function fetch_ans($ques_id)
	{
		$query_str = "SELECT answers.id,answers.answer,answers.datetime,user_lawyer.username FROM `answers` JOIN `user_lawyer` ON answers.user_id=user_lawyer.id WHERE
		answers.question_id='$ques_id'";
		$query =$this->db->query($query_str);
		return $query->result_array();
	}
	public function fetch_comm($ans_id)
	{
		$query_str = "SELECT comments_a.id,comments_a.comment,comments_a.datetime,users.username FROM `comments_a` JOIN `users` ON comments_a.user_id=users.id WHERE
		comments_a.ans_id='$ans_id'";
		$query =$this->db->query($query_str);
		return $query->result_array();
	}
	public function fetch_reply($comm_id)
	{
		$query_str = "SELECT comments_c.id,comments_c.comment,comments_c.datetime,users.username FROM `comments_c` JOIN `users` ON comments_c.user_id=users.id WHERE
		comments_c.comment_id='$comm_id'";
		$query =$this->db->query($query_str);
		return $query->result_array();	
	}
	public function post_ques($username)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('title'=>$this->input->post('title'),
					  'description'=>$this->input->post('description'),
					  'user_id'=>$user_id,
					  'votes'=>0,
					  'datetime'=>$datetime,
					  'tag'=>$this->input->post('tag')
					  );
		$this->db->insert('questions',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function update($ques_id,$username_session)
	{	$query_str= "SELECT users.username FROM `questions` JOIN users ON questions.user_id=users.id WHERE questions.id='$ques_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username == $username_session)
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('title'=>$this->input->post('title'),
						  'description'=>$this->input->post('description'),
						  'datetime'=>$datetime
						  );
			$this->db->update('questions',$data,array('id'=>$ques_id));
			if($this->db->affected_rows() >0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}
	
	public function answer($ques_id,$username_session)
	{
		$query_str = "SELECT `id` FROM `user_lawyer` WHERE `username`='$username_session'";
		$query = $this->db->query($query_str);
		if($query->num_rows() >0)
		{
			$user_id = $query->row_array()['id'];
			$datetime = date('Y-m-d H:i:s');
			$data = array('answer'=>$this->input->post('answer'),
						  'question_id'=>$ques_id,
						  'user_id'=>$user_id,
						  'votes'=>0,
						  'datetime'=>$datetime
						  );
			$this->db->insert('answers',$data);
			if($this->db->affected_rows() >0)
			{
				$this->fetchmail_a($ques_id);
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
		
	}
	public function edit_answer($ans_id,$username_session)
	{
		$query_str = "SELECT users.username FROM `answers` JOIN `users` ON answers.user_id=users.id WHERE answers.id='$ans_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username == $username_session)
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('answer'=>$this->input->post('answer'),
						  'datetime'=>$datetime);
			$this->db->update('answers',$data,array('id'=>$ans_id));
			if($this->db->affected_rows() >0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}
	public function comment_ans($ans_id,$username)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$question_id = $this->db->query("SELECT `question_id` FROM `answers` WHERE `id`='$ans_id'")->row_array()['id'];
		$data = array('comment'=>$this->input->post('comment'),
					  'user_id'=>$user_id,
					  'answer_id'=>$ans_id,
					  'votes'=>0,
					  'datetime'=>$datetime,
					  'question_id'=>$question_id
					  );
		$this->db->insert('comments_a',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function comment_q($ques_id,$username)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('comment'=>$this->input->post('comment'),
					  'user_id'=>$user_id,
					  'votes'=>0,
					  'datetime'=>$datetime,
					  'question_id'=>$ques_id
					  );
		$this->db->insert('comments_q',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function edit_commenta($comment_id,$username_session)
	{
		$query_str= "SELECT users.username FROM `comments_a` JOIN users ON comments_q.user_id=users.id WHERE comments_q.id='$comment_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username == $username_session)
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('comment'=>$this->input->post('comment'),
						  'datetime'=>$datetime
						  );
			$this->db->update('comments_a',$data,array('id'=>$comment_id));
			if($this->db->affected_rows() >0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}
	public function edit_commentc($comment_id,$username_session)
	{
		$query_str= "SELECT users.username FROM `comments_c` JOIN users ON comments_c.user_id=users.id WHERE comments_c.id='$comment_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username == $username_session)
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('comment'=>$this->input->post('comment'),
						  'datetime'=>$datetime
						  );
			$this->db->update('comments_c',$data,array('id'=>$comment_id));
			if($this->db->affected_rows() >0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}
	public function vote($id,$updown,$qc)
	{
		if($qc = 'a')
		{
			if($updown == 1)
			{
				$query_str = "UPDATE `answers` SET `votes`= votes+1 WHERE `id`='$id'";
				$query = $this->db->query($query_str);
				if($this->db->affected_rows() >0)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else if($updown == -1)
			{
				$query_str = "UPDATE `answers` SET `votes`= votes-1 WHERE `id`='$id'";
				$query = $this->db->query($query_str);
				if($this->db->affected_rows() >0)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return -1;
			}
		}
		else if($qc = 'c')
		{
			if($updown == 1)
			{
				$query_str = "UPDATE `comments_a` SET `votes`= votes+1 WHERE `id`='$id'";
				$query = $this->db->query($query_str);
				if($this->db->affected_rows() >0)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else if($updown == -1)
			{
				$query_str = "UPDATE `comments_a` SET `votes`= votes-1 WHERE `id`='$id'";
				$query = $this->db->query($query_str);
				if($this->db->affected_rows() >0)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return -1;
			}
		}
	}
	public function fetchmail_a($ques_id)
	{
		$query_str = "SELECT users.email FROM `answers` JOIN `users` ON answers.user_id=users.id WHERE answers.question_id='$ques_id' UNION ALL
		SELECT users.email FROM `comments_a` JOIN `users` ON comments_a.user_id = users.id WHERE comments_a.question_id='$ques_id' UNION ALL
		SELECT users.email FROM `questions` JOIN `users` ON questions.user_id=users.id WHERE questions.id='$ques_id'";
		$data1 = $this->db->query($query_str)->result_array();
		return $data1;
	}
	public function fetchmail_ca($ans_id)
	{
		$query_str = "SELECT users.email FROM `comments_a` JOIN `users` ON comments_a.user_id=users.id WHERE comments_a.ans_id='$ans_id' UNION  ALL
		SELECT users.email FROM `answers` JOIN `users` ON answers.user_id=users.id WHERE answers.id = '$ans_id'";
		$data = $this->db->query($query_str)->result_array();
		return $data;
	}
	public function fetchmail_cq($ques_id)
	{
		$query_str = "SELECT users.email FROM `comments_q` JOIN `users` ON comments_q.user_id=users.id WHERE comments_q.question_id='$ques_id' UNION  ALL
		SELECT users.email FROM `questions` JOIN `users` ON questions.user_id=users.id WHERE questions.id = '$ques_id'";
		$data = $this->db->query($query_str)->result_array();
		return $data;
	}
	
	public function fetchmail_up($ques_id)
	{
		$query_str = "SELECT users.email FROM `answers` JOIN `users` ON answers.user_id=users.id WHERE answers.question_id='$ques_id' UNION ALL
		SELECT users.email FROM `questions` JOIN `users` ON questions.user_id=users.id WHERE questions.id='$ques_id'";
		$data = $this->db->query($query_str)->result_array();
		return $data;
	}
}
/*End of Model.
Hand Coded by Deep Vyas.*/

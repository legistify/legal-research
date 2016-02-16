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
		/*		if($this->input->post('tag1'))
			$tag1=$this->input->post('tag1');
		if($this->input->post('tag2'))
			$tag2=$this->input->post('tag2');
		if($this->input->post('tag3'))
			$tag3=$this->input->post('tag3');
		if($this->input->post('tag4'))
			$tag4=$this->input->post('tag4');
		if($this->input->post('tag5'))
			$tag5=$this->input->post('tag5');*/
		echo $this->input->post('data');
		if(!$this->input->post('tag1') && !$this->input->post('tag2') && !$this->input->post('tag3') && !$this->input->post('tag4') && !$this->input->post('tag5')){
 			
 			$query_str =  "SELECT questions.id,questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id 
  GROUP BY questions.id ";
		}
		 else if($this->input->post('tag1') && !$this->input->post('tag2') && !$this->input->post('tag3') && !$this->input->post('tag4') && !$this->input->post('tag5')){
			$query_str = "SELECT questions.id,tp.name, questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$tag1'
  GROUP BY questions.id ";
		}
		else if ($this->input->post('tag1') && $this->input->post('tag2') && !$this->input->post('tag3') && !$this->input->post('tag4') && !$this->input->post('tag5')) {
			$query_str = "SELECT questions.id,tp.name, questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$tag1' AND tp.tag LIKE '$tag2'
 GROUP BY questions.id ";
		}
		else if ($this->input->post('tag1') && $this->input->post('tag2') && $this->input->post('tag3') && !$this->input->post('tag4') && !$this->input->post('tag5')) {
			$query_str = "SELECT questions.id,tp.name, questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$tag1' AND tp.tag LIKE '$tag2' AND tp.tag LIKE '$tag3'
  GROUP BY questions.id ";
		}
		else if ($this->input->post('tag1') && $this->input->post('tag2') && $this->input->post('tag3') && $this->input->post('tag4') && !$this->input->post('tag5')) {
			$query_str = "SELECT questions.id,tp.name, questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$tag1' AND tp.tag LIKE '$tag2' AND tp.tag LIKE '$tag3' AND tp.tag LIKE '$tag4'
  GROUP BY questions.id ";
		}
		else if ($this->input->post('tag1') && $this->input->post('tag2') && $this->input->post('tag3') && $this->input->post('tag4') && $this->input->post('tag5')) {
			$query_str = "SELECT questions.id,tp.name, questions.title,questions.description, questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id  LEFT JOIN `tag_rel_questions` AS tr ON questions.id = tr.question_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$tag1' AND tp.tag LIKE '$tag2' AND tp.tag LIKE '$tag3' AND tp.tag LIKE '$tag4' AND tp.tag LIKE '$tag5'
  GROUP BY questions.id ";
		}
		if($this->input->post('sort')=='Upvotes')
			$query_str.=" ORDER BY questions.upvotes DESC";

		$query = $this->db->query($query_str);
		return $query->result(); 
	}
		
		public function fetch_ques_id($ques_id)
	{
		$query_str = "SELECT questions.id,questions.title,questions.description,questions.upvotes,questions.downvotes,questions.datetime,users.username FROM `questions` JOIN `users` ON questions.user_id=users.id
		WHERE questions.id = '$ques_id'";
		$query =$this->db->query($query_str);
		return $query->result();
	}


     public function get_tags($ques_id)
 	{

 		$query_str = "SELECT topics.name FROM `topics` JOIN `tag_rel_questions` ON topics.id=tag_rel_questions.topic_id WHERE question_id='$ques_id'";
		$query = $this->db->query($query_str);
		return $query->result(); 

 	}

	public function fetch_best_ans($ques_id)
	{
		$query_str = "SELECT answers.id,answers.answer,answers.datetime,answers.upvotes,answers.downvotes,user_lawyer.username,user_lawyer.pic_link FROM `answers` JOIN `user_lawyer` ON answers.user_id=user_lawyer.id WHERE
		answers.question_id='$ques_id' ORDER BY answers.upvotes DESC LIMIT 1";
		$query =$this->db->query($query_str);
		return $query->result();
		

	}
	public function fetch_ans($ques_id)
	{
		$query_str = "SELECT answers.id,answers.answer,answers.datetime,answers.upvotes,answers.downvotes,user_lawyer.username,user_lawyer.pic_link FROM `answers` JOIN `user_lawyer` ON answers.user_id=user_lawyer.id WHERE
		answers.question_id='$ques_id' ORDER BY answers.upvotes DESC";
		$query =$this->db->query($query_str);
		return $query->result();
	}
	public function fetch_comm($ans_id)
	{
		$query_str = "SELECT comments_a.id,comments_a.comment,comments_a.datetime,comments_a.votes,users.username FROM `comments_a` JOIN `users` ON comments_a.user_id=users.id WHERE
		comments_a.answer_id='$ans_id'";
		$query =$this->db->query($query_str);
		return $query->result();
	}

	public function post_ques($username)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('title'=>$this->input->post('title'),
					  'description'=>$this->input->post('description'),
					  'user_id'=>$user_id,
					  'upvotes'=>0,
					  'datetime'=>$datetime,
					  'downvotes' =>0
					  );
		$this->db->insert('questions',$data);
		if($this->db->affected_rows() >0)
		{
			$tag=array();

		    if($this->input->post('tag1'))
			$tag[1]=$this->input->post('tag1');
		     if($this->input->post('tag2'))
			$tag[2]=$this->input->post('tag2');
		    if($this->input->post('tag3'))
			$tag[3]=$this->input->post('tag3');
		    if($this->input->post('tag4'))
			$tag[4]=$this->input->post('tag4');
		    if($this->input->post('tag5'))
			$tag[5]=$this->input->post('tag5');
		     $query_str ="SELECT *  FROM `questions` ORDER BY id DESC LIMIT 1";
		     $id=$this->db->query($query_str)->row_array()['id'];
		     //$id+=1;
		   foreach($tag as $key=>$para){
			   $data = array(
					  'question_id'=>$id,
					  'topic_id'=>$tag[$key]
					  );

			$this->db->insert('tag_rel_questions',$data);
		if($this->db->affected_rows() >0)
		{
			//do nothing
		}
		else
		{
			return 0;
		}



		}
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function post_reply($comment_id)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('reply'=>$this->input->post('reply'),
					  'answer_id' =>$comment_id,
					  'user_id' =>$user_id,
					  'datetime' =>$datetime
					  );
		$this->db->insert('reply',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}


	}

	public function fetch_reply($comment_id)
	{
		$querystr = "SELECT reply.id,reply.reply,reply.datetime,users.username FROM `reply` JOIN `users` ON reply.user_id=users.id WHERE reply.answer_id='$comment_id'";
		$query = $this->db->query($querystr);
		return $query->result();
	}

/*	public function update($ques_id,$username_session)
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
	}*/
	
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
						  'upvotes'=>0,
						  'datetime'=>$datetime,
						  'downvotes'=>0
						  );
			$this->db->insert('answers',$data);
			if($this->db->affected_rows() >0)
			{
				// $this->fetchmail_a($ques_id);
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

/*	public function edit_answer($ans_id,$username_session)
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
	}*/

	public function comment_ans($ans_id,$username)
	{
		$user_idq = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'");
		$user_id = $user_idq->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$question_idq = $this->db->query("SELECT `question_id` FROM `answers` WHERE `id`='$ans_id'");
		$question_id = $question_idq->row_array()['question_id'];
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
			return $question_id;
		}
		else
		{
			return 0;
		}
	}

	/*public function comment_q($ques_id,$username)
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
	}*/

	

/*	public function edit_commenta($comment_id,$username_session)
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
	}*/

/*	public function edit_commentc($comment_id,$username_session)
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
	}*/

	public function vote_a($ans_id,$ud)
	{
		if($this->checkvote($this->session->userdata('unnamed'),$ans_id)!=1)
		{
			$username = $this->session->userdata('unnamed');
			if($ud ==1)
			{
				$query = "UPDATE `answers` SET `upvotes` = upvotes+1 WHERE `id`='$ans_id'";
			}
			else
			{
				$query = "UPDATE `answers` SET `downvotes` = downvotes+1 WHERE `id`='$ans_id'";
			}
			$query1 = $this->db->query($query);
			$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
			$user_id = $this->db->query($query_str1)->row_array()['id'];
			$data = array(
							"user_id"=>$user_id,
							"answer_id" => $ans_id);
			$this->db->insert('votes_a_rel',$data);
		}
		$querys2 = "SELECT `question_id` FROM `answers` WHERE `id`='$ans_id'";
		$query2 = $this->db->query($querys2);
		return $query2->row_array()['question_id'];
	}
	public function vote_q($question_id,$u)
	{
		$username = $this->session->userdata('unnamed');
		if($this->checkvote_q($this->session->userdata('unnamed'),$question_id)!=1)
		{
			if($u==1)
			{
				$query = "UPDATE `questions` SET `upvotes` = upvotes+1 WHERE `id`='$question_id'";
			}
			else
			{
				$query = "UPDATE `questions` SET `downvotes` = downvotes+1 WHERE `id`='$question_id'";
			}
			$query1 = $this->db->query($query);
			$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
			$user_id = $this->db->query($query_str1)->row_array()['id'];
			$data = array(
							"user_id"=>$user_id,
							"question_id" => $question_id);
			$this->db->insert('votes_q_rel',$data);

		}


	}
	public function vote_c($comment_id)
	{
		$username = $this->session->userdata('unnamed');
		if($this->checkvote_c($this->session->userdata('unnamed'),$comment_id)!=1)
		{
			$query = "UPDATE `comments_a` SET `votes` = votes+1 WHERE `id`='$comment_id'";
			$query1 = $this->db->query($query);
			$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
			$user_id = $this->db->query($query_str1)->row_array()['id'];
			$data = array(
							"comment_id" => $comment_id,
							"usser_id"=>$user_id);
			$this->db->insert('votes_c_rel',$data);
			
		}
		$querys2 = "SELECT `question_id` FROM `comments_a` WHERE `id` = '$comment_id'";
		$query2 = $this->db->query($querys2);
		return $query2->row_array()['question_id'];



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

	public function fetch_user_type($username)
	{
		$query_str = "SELECT `user_type` FROM `users` WHERE `username`='$username'";
		$query = $this->db->query($query_str);
		return $query->row_array()['user_type'];
	}

	public function checkvote($username,$ans_id)
	{
		$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
		$user_id = $this->db->query($query_str1)->row_array()['id'];

		$query = "SELECT `user_id` FROM `votes_a_rel` WHERE `user_id` = '$user_id' AND `answer_id`='$ans_id'";
		$query1 =$this->db->query($query);
		if($query1->num_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function checkvote_q($username,$question_id)
	{

		$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
		$user_id = $this->db->query($query_str1)->row_array()['id'];

		$query = "SELECT `user_id` FROM `votes_q_rel` WHERE `user_id` = '$user_id' AND `question_id`='$question_id'";
		$query1 =$this->db->query($query);
		if($query1->num_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}

	public function checkvote_c($username,$comment_id)
	{
		$query_str1 = "SELECT `id` FROM `users` WHERE `username` = '$username'";
		$user_id = $this->db->query($query_str1)->row_array()['id'];

		$query = "SELECT `usser_id` FROM `votes_c_rel` WHERE `usser_id` = '$user_id' AND `comment_id`='$comment_id'";
		$query1 =$this->db->query($query);
		if($query1->num_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
}


/*End of Model.
Hand Coded by Deep Vyas.*/
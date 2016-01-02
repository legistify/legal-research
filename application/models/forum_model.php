<?php
class Forum_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');

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

	public function update($ques_id)
	{	$query_str= "SELECT users.username FROM `questions` JOIN users ON questions.user_id=users.id WHERE questions.id='$ques_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username = $this->session->userdata('unnamed'))
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
	/*Ques Delete Pending.*/

	public function comment_ques($ques_id)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('comment'=>$this->input->post('comment'),
					  'user_id'=>$user_id,
					  'question_id'=>$ques_id,
					  'votes'=>0,
					  'datetime'=>$datetime
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

	public function comment_comm($comm_id)
	{
		$user_id = $this->db->query("SELECT `id` FROM `users` WHERE `username`='$username'")->row_array()['id'];
		$datetime = date('Y-m-d H:i:s');
		$data = array('comment'=>$this->input->post('comment'),
					  'user_id'=>$user_id,
					  'question_id'=>$ques_id,
					  'votes'=>0,
					  'datetime'=>$datetime
					  );
		$this->db->insert('comments_c',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	

	public function edit_commentq($comment_id)
	{
		$query_str= "SELECT users.username FROM `comments_q` JOIN users ON comments_q.user_id=users.id WHERE comments_q.id='$comment_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username = $this->session->userdata('unnamed'))
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('comment'=>$this->input->post('comment'),
						  'datetime'=>$datetime
						  );
			$this->db->update('comments_q',$data,array('id'=>$comment_id));
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

	public function edit_commentc($comment_id)
	{
		$query_str= "SELECT users.username FROM `comments_c` JOIN users ON comments_c.user_id=users.id WHERE comments_c.id='$comment_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username = $this->session->userdata('unnamed'))
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




	/*Delete comment pending.*/
	/*Comment to a comment delete pending.*/


	public function vote($id,$updown,$qc)
	{
		if($qc = 'q')
		{
			if($updown == 1)
			{
				$query_str = "UPDATE `questions` SET `votes`= votes+1 WHERE `id`='$id'";
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
				$query_str = "UPDATE `questions` SET `votes`= votes-1 WHERE `id`='$id'";
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
				$query_str = "UPDATE `comments_q` SET `votes`= votes+1 WHERE `id`='$id'";
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
				$query_str = "UPDATE `comments_q` SET `votes`= votes-1 WHERE `id`='$id'";
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

	
}


/*End of Model*/
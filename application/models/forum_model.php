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
		$this->db->insert('comments',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function edit_comment($comment_id)
	{
		$query_str= "SELECT users.username FROM `comments` JOIN users ON comments.user_id=users.id WHERE comments.id='$comment_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username = $this->session->userdata('unnamed'))
		{
			$datetime = date('Y-m-d H:i:s');
			$data = array('comment'=>$this->input->post('comment'),
						  'datetime'=>$datetime
						  );
			$this->db->update('comments',$data,array('id'=>$comment_id));
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
	/*Comment to a comment pending.*/

}


/*End of Model*/
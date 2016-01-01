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
			return True;
		}
		else
		{
			return False;
		}
	}

	public function update($ques_id)
	{	$datetime = date('Y-m-d H:i:s');
		$data = array('title'=>$this->input->post('title'),
					  'description'=>$this->input->post('description'),
					  'datetime'=>$datetime
					  );
		$this->db->update('questions',$data,array('id'=>$ques_id));
		if($this->db->affected_rows() >0)
		{
			return True;
		}
		else
		{
			return False;
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
			return True;
		}
		else
		{
			return False;
		}
	}

	public function edit_comment($comment_id)
	{
		$datetime = date('Y-m-d H:i:s');
		$data = array('comment'=>$this->input->post('comment'),
					  'datetime'=>$datetime
					  );
		$this->db->update('comments',$data,array('id'=>$comment_id));
		if($this->db->affected_rows() >0)
		{
			return True;
		}
		else
		{
			return False;
		}
	}
	/*Delete comment pending.*/
	/*Comment to a comment pending.*/

}


/*End of Model*/
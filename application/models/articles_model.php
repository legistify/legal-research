<?php
class Articles_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function view($art_sec)
	{
		$query_str = "SELECT articles.id,topics.name, `title`,`content`, `Upvotes`,`Downvotes`,user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id 
		JOIN topics ON articles.topic=topics.tag WHERE `topic`= '$art_sec'";
		$query = $this->db->query($query_str);
		return $query->result_array(); 
	}

	public function detail_view($art_id)
	{
		$query_str = "SELECT articles.id,topics.name, `title`,`content`, `Upvotes`,`Downvotes`,user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id 
		JOIN topics ON articles.topic=topics.tag WHERE articles.id= '$art_id'";
		$query = $this->db->query($query_str);
		$data = $query->row_array();
		if($data['username']==$this->session->userdata('unnamed'))
		{
			$data['delete_button'] = 'true';
		}
		else
		{
			$data['delete_button'] = 'false';
		}
		return $data;
	}

	public function validate()
	{
		$auth_query = $this->db->get_where('user_lawyer',array('username'=>$this->session->userdata('unnamed')));
		if($auth_query->num_rows <0)
		{
			return 0;
		}
		return 1;
	}

	public function addcomment($art_id){

		
		$this->db->where('username',$this->session->userdata('username'));
		if($this->session->userdata('user_type')!='lawyer')
		$temp=$this->db->get('users');
		 else if($this->session->userdata('user_type')=='lawyer')				// To get user info , works for both kinds of users
		 $temp=$this->db->get('user_lawyer');

		$row=$temp->row();
		$data=array(
						'user_id'=> $row->id,
						'comment'=>$this->input->post('content_$art_id'),
						'article_id'=>$art_id                              //need to have  system id for unique all users 
						                                                   //with current system 2 ppl exists with same id
						);
			return $this->db->insert('comments_articles', $data);




	}

	public function post($art_sec)
	{
		$auth_query = $this->db->get_where('user_lawyer',array('username'=>$this->session->userdata('unnamed')));
		$user_id = $auth_query->row_array()['id'];
		$data = array('topic'=>$art_sec,
					  'content'=>$this->input->post('content'),
					  'user_id'=>$user_id,
					  'title'=>$this->input->post('title')
					  );
		$this->db->insert('articles',$data);
		if($this->db->affected_rows() >0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function edit($art_id)
	{
		$query_str = "SELECT user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id WHERE articles.id='$art_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username==$this->session->userdata('unnamed'))
		{
			$data = array('content'=>$this->input->post('content'),
						  'title'=>$this->input->post('title')
						  );
			$this->db->update('articles',$data,array('id'=>$art_id));
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

	public function delete($art_id)
	{
		$query_str = "SELECT user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id WHERE articles.id='$art_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username==$this->session->userdata('unnamed'))
		{
			$this->db->delete('articles', array('id' => $art_id));
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

	public function topic_list()
	{
		$query = $this->db->get('topics');
		return ($query->result_array());
	}

 	public function get_comments($art_id)
 	{

 		$query_str = "SELECT `comment`,`user_id`,`Upvotes`,`Downvotes`,`datetime`,`article_id`,`fname`,`lname`,comments_articles.id FROM `comments_articles` JOIN `users` ON comments_articles.user_id=users.id WHERE `article_id`= '$art_id'";
		$query = $this->db->query($query_str);
		return $query->result_array(); 

 	}
	 

	public function vote($art_id,$updown)
	{
		if($updown==1)

		{
			$query_str = "UPDATE `articles` SET `Upvotes`= Upvotes+1 WHERE `id`='$art_id'";
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
		else if($updown== -1)
		{
			$query_str = "UPDATE `articles` SET `Downvotes`= Downvotes+1 WHERE `id`='$art_id'";
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


public function comment_vote($comment_id,$updown)
	{
		if($updown==1)

		{
			$query_str = "UPDATE `comments_articles` SET `Upvotes`= Upvotes+1 WHERE `id`='$comment_id'";
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
		else if($updown== -1)
		{
			$query_str = "UPDATE `comments_articles` SET `Downvotes`= Downvotes+1 WHERE `id`='$comment_id'";
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



public function edit_comment($comm_id)
	{
		$this->db->where('username',$this->session->userdata('username'));
		if($this->session->userdata('user_type')!='lawyer')
		$temp=$this->db->get('users');
		 else if($this->session->userdata('user_type')=='lawyer')				// To get user info , works for both kinds of users
		 $temp=$this->db->get('user_lawyer');

		$row=$temp->row();
		$userid=$row->id;
		$this->db->where('id',$comm_id);
		$temp=$this->db->get('comments_articles');
		$row=$temp->row();

		if($userid==$row->user_id)
		{
			$data = array('content'=>$this->input->post('contents')
						  );
			$this->db->update('comments_articles',$data,array('id'=>$comm_id));
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

	public function delete_comment($comm_id)
	{
		
		$this->db->where('username',$this->session->userdata('username'));
		if($this->session->userdata('user_type')!='lawyer')
		$temp=$this->db->get('users');
		 else if($this->session->userdata('user_type')=='lawyer')				// To get user info , works for both kinds of users
		 $temp=$this->db->get('user_lawyer');

		$row=$temp->row();
		$userid=$row->id;
		$this->db->where('id',$comm_id);
		$temp=$this->db->get('comments_articles');
		$row=$temp->row();


		
		if($userid==$row->user_id)
		{
			$this->db->delete('comments_articles', array('id' => $comm_id));
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
// public function userid(){                                                   //For testing  //To find out user id from session data. Should probably not need in code

// 	$this->db->where('username',$this->session->userdata('username'));     
// 		if($this->session->userdata('user_type')!='lawyer')
// 		$temp=$this->db->get('users');
// 		 else if($this->session->userdata('user_type')=='lawyer')				// To get user info , works for both kinds of users
// 		 $temp=$this->db->get('user_lawyer');

// 		$row=$temp->row();
// 		$userid= $row->id;
// 		return $userid;
// }



}






/*End of model*/
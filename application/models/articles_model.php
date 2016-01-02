<?php
class Articles_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function view($art_sec)
	{
		$query_str = "SELECT articles.id,topics.name, `title`, `votes`,user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id 
		JOIN topics ON articles.topic=topics.tag WHERE `topic`= '$art_sec'";
		$query = $this->db->query($query_str);
		return json_encode($query->result_array());
	}

	public function detail_view($art_id)
	{
		$query_str = "SELECT articles.id,topics.name, `title`,`content`, `votes`,user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id 
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

	public function vote($art_id,$updown)
	{
		if($updown==1)
		{
			$query_str = "UPDATE `articles` SET `votes`= votes+1 WHERE `id`='$art_id'";
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
			$query_str = "UPDATE `articles` SET `votes`= votes-1 WHERE `id`='$art_id'";
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





/*End of model*/
<?php
class Articles_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function view()

	{
		

		/*if($this->input->post('tag1'))
			$tag1=$this->input->post('tag1');
		if($this->input->post('tag2'))
			$tag2=$this->input->post('tag2');
		if($this->input->post('tag3'))
			$tag3=$this->input->post('tag3');
		if($this->input->post('tag4'))
			$tag4=$this->input->post('tag4');
		if($this->input->post('tag5'))
			$tag5=$this->input->post('tag5');*/
		$data = explode(',',$this->input->post('tag'));

		if(sizeof($data) ==1 && $data[0]==''){
 			
 			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150),`views`, `datetime`,`content`,users.fname,users.lname, `Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id LEFT JOIN `users` on users.username=user_lawyer.username  LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id 
  GROUP BY articles.id";
		}

		 else if(sizeof($data)==1){

			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150),`views`, `datetime`,`content`,users.fname,users.lname,`Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id LEFT JOIN `users` on users.username=user_lawyer.username LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$data[0]'
  GROUP BY articles.id";

		}

		else if (sizeof($data)==2) {

			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150),`views`, `datetime`,`content`,users.fname,users.lname, `Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.idLEFT JOIN `users` on users.username=user_lawyer.username  LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$data[0]' OR tp.tag LIKE '$data[1]'
  GROUP BY articles.id";

		}
		else if (sizeof($data)==3) {
			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150), `views`, `datetime`,`content`,users.fname,users.lname,`Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id LEFT JOIN `users` on users.username=user_lawyer.username LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$data[0]' OR tp.tag LIKE '$data[1]' OR tp.tag LIKE '$data[3]'
  GROUP BY articles.id";

		}
		else if (sizeof($data)==4) {
			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150), `views`, `datetime`,`content`,users.fname,users.lname,`Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id LEFT JOIN `users` on users.username=user_lawyer.username LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$data[0]' OR tp.tag LIKE '$data[1]' OR tp.tag LIKE '$data[2]' OR tp.tag LIKE '$data[3]'
  GROUP BY articles.id";

		}
		else if (sizeof($data)==5) {
			$query_str = "SELECT articles.id,tp.name, `title`,LEFT(content,150), `views`, `datetime`,`content`,users.fname,users.lname,`Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id LEFT JOIN `users` on users.username=user_lawyer.username LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id WHERE tp.tag LIKE '$data[0]' OR tp.tag LIKE '$data[1]' OR tp.tag LIKE '$data[2]' OR tp.tag LIKE '$data[3]' OR tp.tag LIKE '$data[4]'
  GROUP BY articles.id";

		}
		if($this->input->post('sort')=='Upvotes')
		{
			$query_str.=" ORDER BY articles.upvotes DESC";
		}

		
		$query = $this->db->query($query_str);
		return $query->result_array(); 
	}

	public function detail_view($art_id)


	{


		$query_str = "UPDATE `articles` SET `views`= views+1 WHERE `id`='$art_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0){
			


			 $query_str = "SELECT articles.datetime,articles.views,articles.id,tp.name, `title`,`content`, `Upvotes`,`Downvotes`,user_lawyer.username,user_lawyer.pic_link,user_lawyer.acc_type FROM `articles` JOIN `user_lawyer` ON articles.user_id=user_lawyer.id  LEFT JOIN `tag_rel` AS tr ON articles.id = tr.article_id LEFT JOIN `topics` AS tp ON tr.topic_id = tp.id 
                 WHERE articles.id= '$art_id'";

			$query = $this->db->query($query_str);
			$data = $query->row_array();
			if($data['username']==$this->session->userdata('username'))
			{
				$data['delete_button'] = 'true';
			}
			else
			{
				$data['delete_button'] = 'false';
			}
			return $data;
			
          }
			else
				return 0;

		}

	public function validate()
	{
		$auth_query = $this->db->get_where('user_lawyer',array('username'=>$this->session->userdata('username')));
		if($auth_query->num_rows <0)
		{
			return 0;
		}
		return 1;
	}

	public function addcomment($art_id){

		
		$this->db->where('username',$this->session->userdata('username'));
	
		$temp=$this->db->get('users');
		 
		$row=$temp->row();
		$data=array(
						'user_id'=> $row->id,
						'comment'=>$this->input->post('content'),
						'article_id'=>$art_id                              
						);
			return $this->db->insert('comments_articles', $data);




	}

	public function addreply($comm_id){

		
		$this->db->where('username',$this->session->userdata('username'));
	
		$temp=$this->db->get('users');
		 
		$row=$temp->row();
		$data=array(
						'user_id'=> $row->id,
						'comment'=>$this->input->post('content'),
						'comment_id'=>$comm_id                              
						);
			return $this->db->insert('comments_reply', $data);




	}

	public function post($art_sec)
	{
		$auth_query = $this->db->get_where('user_lawyer',array('username'=>$this->session->userdata('username')));
		$user_id = $auth_query->row_array()['id'];
		$tag=array();

		   if(sizeof($data)==1 && $data[0]!='')
			$tag[0]=$data[0];
		     if(sizeof($data)==2)
			$tag[1]=$data[1];
		    if(sizeof($data)==3)
			$tag[2]=$data[2];
		    if(sizeof($data)==4)
			$tag[3]=$data[3];
		    if(sizeof($data)==5)
			$tag[4]=$data[4];
		$query_str ="SELECT *  FROM `articles` ORDER BY id DESC LIMIT 1";
		$id=$this->db->query($query_str)->row_array()['id'];
		$id+=1;
		foreach($tag as $key=>$para){
			$data = array(
					  'article_id'=>$id,
					  'topic_id'=>$tag[$key]
					  );

			$this->db->insert('tag_rel',$data);
		if($this->db->affected_rows() >0)
		{
			//do nothing
		}
		else
		{
			return 0;
		}



		}

		$data = array(
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
		$tag=array();
		$this->db->delete('tag_rel', array('article_id' => $art_id));
			if($this->db->affected_rows() >0)
			{
				return 1;
			}
			else
			{
				return 0;
			}

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
		
		foreach($tag as $key=>$para){
			$data = array(
					  'article_id'=>$art_id,
					  'topic_id'=>$tag[$key]
					  );

			$this->db->insert('tag_rel',$data);
		if($this->db->affected_rows() >0)
		{
			//do nothing
		}
		else
		{
			return 0;
		}
	}
		$query_str = "SELECT user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id WHERE articles.id='$art_id'";
		$username = $this->db->query($query_str)->row_array()['username'];
		if($username==$this->session->userdata('username'))
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
		if($username==$this->session->userdata('username'))
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

 		$query_str = "SELECT `comment`,`user_id`,`Upvotes`,`Downvotes`,`datetime`,`article_id`,`fname`,`lname`,comments_articles.id ,user_lawyer.username,user_lawyer.pic_link FROM `comments_articles` JOIN `user_lawyer` ON comments_articles.user_id=user_lawyer.id JOIN `users` ON comments_articles.user_id=users.id WHERE `article_id`= '$art_id' ORDER BY comments_articles.id ";
		$query = $this->db->query($query_str);
		$comment_list= $query->result_array();
		  return $comment_list;
		


 	}



     public function get_tags($art_id)
 	{

 		$query_str = "SELECT topics.name,`article_id` FROM topics JOIN tag_rel ON topics.id=Topic_id WHERE article_id=$art_id";
		$query = $this->db->query($query_str);
		return $query->result_array(); 

 	}


 	public function get_reply($comm_id)
 	{

 		$query_str = "SELECT `comment`,`user_id`,`Upvotes`,`Downvotes`,`datetime`,`comment_id`,`fname`,`lname`,comments_reply.id ,user_lawyer.username,user_lawyer.pic_link FROM `comments_reply` JOIN `user_lawyer` ON comments_reply.user_id=user_lawyer.id JOIN `users` ON comments_reply.user_id=users.id WHERE `comment_id`= '$comm_id' ORDER BY comments_reply.id ";
		$query = $this->db->query($query_str);
		return $query->result_array(); 

 	}
	 



	public function vote($article_id,$updown)
	{

		$cvchk=$this->article_vote_chk($article_id);
		$uid=$this->userid();
		if($updown==1 && $cvchk==0)

		{
			$query_str = "UPDATE `articles` SET `Upvotes`= Upvotes+1 WHERE `id`='$article_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				$data=array(
						'user_id'=> $uid,
						'article_id'=>$article_id,
						'up_down'=>1                              
						);
			  return $this->db->insert('article_vote_rel', $data);

				
			}
			else
			{
				return 0;
			}
		}
		else if($updown== -1  && $cvchk==0)
		{
			$query_str = "UPDATE `articles` SET `Downvotes`= Downvotes+1 WHERE `id`='$article_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				$data=array(
						'user_id'=> $uid,
						'article_id'=>$article_id,
						'up_down'=>-1                              
						);
			  return $this->db->insert('article_vote_rel', $data);
			}
			else
			{
				return 0;
			}
		}
		else if($cvchk==1)

		{
			$query_str = "UPDATE `articles` SET `Upvotes`= Upvotes-1 WHERE `id`='$article_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				return $this->db->delete('article_vote_rel',array('article_id'=>$article_id,'user_id'=>$uid));

				
			}
			else
			{
				return 0;
			}
		}
		else if($cvchk== -1)

		{
			$query_str = "UPDATE `articles` SET `Downvotes`= Downvotes-1 WHERE `id`='$article_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				return $this->db->delete('article_vote_rel',array('article_id'=>$article_id,'user_id'=>$uid));

				
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

		$cvchk=$this->comment_vote_chk($comment_id);
		$uid=$this->userid();
		if($updown==1 && $cvchk==0)

		{
			$query_str = "UPDATE `comments_articles` SET `Upvotes`= Upvotes+1 WHERE `id`='$comment_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				$data=array(
						'user_id'=> $uid,
						'comment_id'=>$comment_id,
						'up_down'=>1                              
						);
			  return $this->db->insert('comment_vote_rel', $data);

				
			}
			else
			{
				return 0;
			}
		}
		else if($updown== -1  && $cvchk== 0)
		{
			$query_str = "UPDATE `comments_articles` SET `Downvotes`= Downvotes+1 WHERE `id`='$comment_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				$data=array(
						'user_id'=> $uid,
						'comment_id'=>$comment_id,
						'up_down'=>-1                              
						);
			  return $this->db->insert('comment_vote_rel', $data);
			}
			else
			{
				return 0;
			}
		}
		else if($cvchk== 1)

		{
			$query_str = "UPDATE `comments_articles` SET `Upvotes`= Upvotes-1 WHERE `id`='$comment_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				return $this->db->delete('comment_vote_rel',array('comment_id'=>$comm_id,'user_id'=>$uid));

				
			}
			else
			{
				return 0;
			}
		}
		else if($cvchk== -1)

		{
			$query_str = "UPDATE `comments_articles` SET `Downvotes`= Downvotes-1 WHERE `id`='$comment_id'";
			$query = $this->db->query($query_str);
			if($this->db->affected_rows() >0)
			{
				return $this->db->delete('comment_vote_rel',array('comment_id'=>$comm_id,'user_id'=>$uid));

				
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
		$auth_query = $this->db->get_where('users',array('username'=>$this->session->userdata('username')));
		$userid = $auth_query->row_array()['id'];
		$comm=$this->db->get_where('comments_articles',array('id'=>$comm_id));
		
		$comm_user=$comm-row_aray()['user_id'];


		
		if($userid==$comm_user)
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
		
		$auth_query = $this->db->get_where('users',array('username'=>$this->session->userdata('username')));
		$userid = $auth_query->row_array()['id'];
		$comm=$this->db->get_where('comments_articles',array('id'=>$comm_id));
		
		$comm_user=$comm-row_aray()['user_id'];


		
		if($userid==$comm_user)
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

	public function edit_reply($reply_id)
	{
		$auth_query = $this->db->get_where('users',array('username'=>$this->session->userdata('username')));
		$userid = $auth_query->row_array()['id'];
		$comm=$this->db->get_where('comments_reply',array('id'=>$comm_id));
		
		$comm_user=$comm-row_aray()['user_id'];


		
		if($userid==$comm_user)
		{
			$data = array('content'=>$this->input->post('contents')
						  );
			$this->db->update('comments_reply',$data,array('id'=>$reply_id));
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

	public function delete_reply($reply_id)
	{
		
		$auth_query = $this->db->get_where('users',array('username'=>$this->session->userdata('username')));
		$userid = $auth_query->row_array()['id'];
		$comm=$this->db->get_where('comments_reply',array('id'=>$reply_id));
		
		$comm_user=$comm-row_aray()['user_id'];


		
		if($userid==$comm_user)
		{
			$this->db->delete('comments_reply', array('id' => $reply_id));
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
public function userid(){                                                   

	$auth_query = $this->db->get_where('users',array('username'=>$this->session->userdata('username')));
		$user_id = $auth_query->row_array()['id'];
		return $user_id;
}





public function comment_vote_chk($comm_id){
	$uid=$this->userid();

	$chk_query = $this->db->get_where('comment_vote_rel',array('comment_id'=>$comm_id,'user_id'=>$uid));
		if($chk_query->num_rows <0)
		{
			return 0;
		}

		return $chk_query->row_array()['up_down'];

}

public function article_vote_chk($art_id){
	$uid=$this->userid();

	$chk_query = $this->db->get_where('article_vote_rel',array('article_id'=>$art_id,'user_id'=>$uid));
		if($chk_query->num_rows <0)
		{
			return 0;
		}

		return $chk_query->row_array()['up_down'];

}
}





/*End of model*/
/*Hand Coded By Rishabh Mittar*/

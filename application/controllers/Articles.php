<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller
{
	/*This is a back-end Framework for articles section. Person concerned with middle-ware needs to load views as and how required.
	all data that might be needed to pass to a view is there in functions as return value.*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('articles_model');
	}

	public function index()
	{
		$articles=$this->articles_model->view();

		$tag_list=array();
		foreach($articles  as $name ){
					foreach($name as $key=>$para){
						    if($key=='id')
							{
								$tags=$this->articles_model->get_tags($para);
							    array_push($tag_list,$tags);
						    }
							
					}
				}


		
		     $userid=$this->articles_model->userid();
		 	$data=array(
  					 "article_list"=> $articles,
  					 "tag_list"=>$tag_list,
  					   "userid"=>$userid
					 );
		         //  Returns list of sections of articles ALong with tag which is to be passed back for view function.
				//											Also Passed is a boolean at end of json which indicates whether to show post button or not
		$this->load->view('list',$data);
		
	}

	public function view_ajax()
	{
		$articles=$this->articles_model->view();

		$tag_list=array();
		foreach($articles  as $name ){
					foreach($name as $key=>$para){
						    if($key=='id')
							{
								$tags=$this->articles_model->get_tags($para);
							    array_push($tag_list,$tags);
						    }
							
					}
				}


		
		     $userid=$this->articles_model->userid();
		 	$data=array(
  					 "article_list"=> $articles,
  					 "tag_list"=>$tag_list,
  					   "userid"=>$userid
					 );
		         //  Returns list of sections of articles ALong with tag which is to be passed back for view function.
				//				
		    

		$data =  json_encode($data); 
		$this->output->set_content_type('application/json')->set_output($data);  /*Returns title and author of article and article_id.Use article_id as token for all future actions.
															//Pass article_sec tag passed above*/
	}

	public function view()
	{
		/*$query_str = "SELECT topics.name, `content`, `votes`,user_lawyer.username FROM `articles` JOIN user_lawyer ON articles.user_id=user_lawyer.id 
		JOIN topics ON articles.topic=topics.tag WHERE `topic`= '$art_sec'";
		$query = $this->db->query($query_str);
		return json_encode($query->result_array());*/
		$articles=$this->articles_model->view();

		$tag_list=array();
		foreach($articles  as $name ){
					foreach($name as $key=>$para){
						    if($key=='id')
							{
								$tags=$this->articles_model->get_tags($para);
							    array_push($tag_list,$tags);
						    }
							
					}
				}


		
		     $userid=$this->articles_model->userid();
		 	$data=array(
  					 "articles"=> $articles,
  					 "tag_list"=>$tag_list,
  					   "userid"=>$userid
					 );
		         //  Returns list of sections of articles ALong with tag which is to be passed back for view function.
				//											Also Passed is a boolean at end of json which indicates whether to show post button or not
		$this->load->view('list',$data);

		  
	}

	public function view_detail($art_id)

	{

		$articles=$this->articles_model->detail_view($art_id);
		$tags=$this->articles_model->get_tags($art_id);
		$comment_list=array();
		//foreach($articles  as $name ){
					foreach($articles as $key=>$para){
						    if($key=='id')
							{
								$comments=$this->articles_model->get_comments($para);
							    array_push($comment_list,$comments);
						    }
							
					}
		//		}
					$reply_list=array();
					foreach($comment_list  as $mediator ){
						foreach($mediator  as $name ){
				            foreach($name as $key=>$para){
						    if($key=='id')
							{
		                           $reply=$this->articles_model->get_reply($para);
		                          array_push($reply_list,$reply);
		                   }
		               }
		           }
		       }
				
		     $userid=$this->articles_model->userid();
		 	$data=array(
  					 "articles"=> $articles,
  					  "comment_list"=>$comment_list,
  					   "userid"=>$userid,
  					   "reply_list"=>$reply_list,
  					   "tags"=>$tags
					 );
		 	$this->load->view('blogview',$data);
		//return json_encode($data);     /*Returns a particular article with content and a json entry specifiyng whether
																				// to show delete button and edit button to User. Call this via AJAX if the user clicks a particular article
																				// title.Pass art_id as parameter.*/
	}

	public function art_delete($art_id)
	{
		return $this->articles_model->delete($art_id);		/*Return 1 if article deleted.
																	0 if not deleted.
																	-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}

	public function comm_edit($comm_id)
	{
		return $this->articles_model->edit_comment($comm_id);		/*Return 1 if comment edited.
																		0 if not deleted.
																		-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}


    public function comm_delete($comm_id)
	{
		return $this->articles_model->delete_comment($comm_id);		/*Return 1 if comment deleted.
																	0 if not deleted.
																	-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}

	public function reply_edit($reply_id)
	{
		return $this->articles_model->edit_reply($reply_id);		/*Return 1 if reply edited.
																		0 if not deleted.
																		-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}


    public function reply_delete($reply_id)
	{
		return $this->articles_model->delete_reply($reply_id);		/*Return 1 if reply deleted.
																	0 if not deleted.
																	-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}

	public function art_edit($art_id)
	{
		return $this->articles_model->edit($article_id);		/*Return 1 if article edited.
																		0 if not deleted.
																		-1 if User not allowed to delete. In case he sneaks in. Use AJAX to call this method.*/
	}


	public function post($art_sec=1)
	{
		/*$auth_query = $this->db->get_where('user_lawyer',array('username'=>$this->session->userdata('unnamed')));
		if($auth_query->num_rows <0)
		{

		}
		$user_id = $auth_query->row_array()['id'];
		$data = array('topic'=>$art_sec,
					  'content'=>$this->input->post('content'),
					  'user_id'=>$user_id);
		$this->db->insert('articles',$data);
		if($this->db->affected_rows() >0)
		{

		}
		else
		{

		}*/
		if(!$this->articles_model->validate()==0)
		{
			/*echo 'Not Valid.';*/
			return -1;							/*Just to double check that user posting is lawyer. Only lawyer can see post button.*/
		}
		else
		{
			return $this->articles_model->post($art_sec);           /*Saves new article. Pass article_tag as parameter in redirect url.
																	Returns 1 if post successful.
																	Returns 0 if not successful.*/
		}
	}

	public function post_comment($article_id){



		if(!empty($this->session->userdata('username')))
		  return $this->articles_model->addcomment($article_id);
		 
		else{
			//load login view
		}
	}

		public function post_reply($comment_id){



		if(!empty($this->session->userdata('username')))
		  return $this->articles_model->addreply($comment_id);
		 
		else{
			//load login view
		}

 			


	}

	public function upvote_article($article_id)

	{
		if(!empty($this->session->userdata('username'))){
		$i= $this->articles_model->vote($article_id,1);
		$data = array('response'=>$i);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);	}
		else{
		// 	return 5;
		// }
			$data = array('response'=>$i);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
}
				/*Does an upvote in  db. 
			}														Returns 1 if successful.
																	Returns 1 if successful.
																	Returns 1 if successful.  5 if not logged in
																	0 if not.
																	-1 if wrong parameter. Call via AJAX.Pass art_id provided in JSON.
																	Second parameter of vote() is for model donot change/change at both places.*/
	}

	public function downvote_article($article_id)

	{
			if(!empty($this->session->userdata('username'))){
		$i= $this->articles_model->vote($article_id,-1);	
	        $data = array('response'=>$i);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);}
		else{

			$data = array('response'=>5);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
			//load login view
		}		/*Does an downvote in  db. 
																	Returns 1 if successful.
																	0 if not.
																	-1 if wrong parameter. Call via AJAX.Pass art_id provided in JSON.
																	Second parameter of vote() is for model donot change/change at both places.*/
																	
	}
 

    public function upvote_comment($comment_id)

	{
		if(!empty($this->session->userdata('username'))){
		$i=$this->articles_model->comment_vote($comment_id,1);	
		$data = array('response'=>$i);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
	}
		else{

			$data = array('response'=>5);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
			}
			
			
		

											/*Does an upvote in  db. 
																		Returns 1 if successful.
																	Returns 1 if successful.
																	Returns 1 if successful.
																	0 if not.
																	-1 if wrong parameter. Call via AJAX.Pass art_id provided in JSON.
																	Second parameter of comment_vote() is for model donot change/change at both places.*/
	}

	public function downvote_comment($comment_id)
	{	
		if(!empty($this->session->userdata('username'))){
		$i= $this->articles_model->comment_vote($comment_id,-1);	
		$data = array('response'=>$i);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
	}
		else{

			$data = array('response'=>5);
			$data=json_encode($data);
			 $this->output->set_content_type('application/json')->set_output($data);
			//load login view
		}				/*Does an downvote in  db. 
																	Returns 1 if successful.
																	0 if not.
																	-1 if wrong parameter. Call via AJAX.Pass art_id provided in JSON.
																	Second parameter of comment_vote() is for model donot change/change at both places.*/
																	
	}


public function commentvotechk($comm_id){

      
      return $this->articles_model->comment_vote_chk($comm_id);   //Use to know what colour of upvote/downvote to display for the pirticular user for comments
                                                                        // retursn 0 if not voted beofre, 1 if upvoted before,-1 if downvoted before

}

public function articlevotechk($art_id){

      
      return  $this->articles_model->article_vote_chk($art_id);   //Use to know what colour of upvote/downvote to display for the pirticular user for articles
                                                                        // retursn 0 if not voted beofre, 1 if upvoted before,-1 if downvoted before

}



}








/*End of Controller*/
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
			if(!empty($question->answer))
			{
				$question->answer[0]->answer= $this->truncate($question->answer[0]->answer,15,'',true,true);
			}
			$question->tags = $this->forum_model->get_tags($question->id);

		}
		$json_data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($json_data);

	}

	public function view_more($ans_id)
	{
		$answer = $this->forum_model->fetch_best_ans($question->id);

		}
		// print_r($data);
		$this->load->view('qna',$data);
	}

	public function index()
	{
		// echo "Hello! Welcome to Forum.";
		// echo "<br>";
		// print_r($this->forum_model->fetchmail_a(1));
		$data['questions'] = $this->forum_model->fetch_ques();
		foreach ($data['questions'] as &$question) 
		{
			$question->answer = $this->forum_model->fetch_best_ans($question->id);
			if(!empty($question->answer))
			{
				$question->answer[0]->answer= $this->truncate($question->answer[0]->answer,15,'',true,true);
			}
			$question->tags = $this->forum_model->get_tags($question->id);
		}
		// print_r($data);
		$this->load->view('qna',$data);
		
	}

	public function answer($question_id)
	{
		$data['question'] = $this->forum_model->fetch_ques_id($question_id);
		$data['user_type'] = $this->forum_model->fetch_user_type($this->session->userdata('unnamed'));
		$data['answers'] = $this->forum_model->fetch_ans($question_id);
		$data['question'][0]->tags =$this->forum_model->get_tags($data['question'][0]->id);;	// print_r($data);
		if(!empty($data['answers']))
		{
			
			foreach($data['answers'] as &$answer)

			{
				$answer->comments = $this->forum_model->fetch_comm($answer->id);
			}
		}
		$this->load->view('answers_page',$data);
		// print_r($data);
	}

	public function post()
	{
		$return = $this->forum_model->post_ques($this->session->userdata('unnamed'));
		$url = './forum/';
		redirect($url);
	}
	public function edit_ques($ques_id)
	{
		return $this->forum_model->update($ques_id,$this->session->userdata('unnamed'));      /*Returns 1 if successful.
																								0 if not.
																								-1 if User not allowed to do so. Call via AJAX. Pass question_id given in JSON.*/
	}
	public function answer_post($question_id)
	{

		// echo $this->forum_model->answer($question_id,$this->session->userdata('unnamed'));
		if($this->forum_model->answer($question_id,$this->session->userdata('unnamed'))==1)
		{
			/*$maillist = $this->forum_model->fetchmail_a($question_id);
			foreach ($maillist as $mailee)
			{
				$this->email->from();
				$this->email->to($mailee['email']);
				$this->email->message("Someone Answered.");
				$this->email->send();
			}*/
			$url = './forum/answer/'.$question_id;
			redirect($url);
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

public function truncate($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
if ($considerHtml) {
    if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
    }

    preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
    $total_length = strlen($ending);
    $open_tags = array();
    $truncate = '';
    foreach ($lines as $line_matchings) {
            if (!empty($line_matchings[1])) {
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                            $pos = array_search($tag_matchings[1], $open_tags);
                            if ($pos !== false) {
                            unset($open_tags[$pos]);
                            }
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                            array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    $truncate .= $line_matchings[1];
            }
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length > $length) {
                    $left = $length - $total_length;
                    $entities_length = 0;
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                            foreach ($entities[0] as $entity) {
                                    if ($entity[1]+1-$entities_length <= $left) {
                                            $left--;
                                            $entities_length += strlen($entity[0]);
                                    } else {
                                            break;
                                    }
                            }
                    }
                    $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                    break;
            } else {
                    $truncate .= $line_matchings[2];
                    $total_length += $content_length;
            }
            if($total_length >= $length) {
                    break;
            }
    }
} else {
    if (strlen($text) <= $length) {
            return $text;
    } else {
            $truncate = substr($text, 0, $length - strlen($ending));
    }
}
if (!$exact) {
    $spacepos = strrpos($truncate, ' ');
    if (isset($spacepos)) {
            $truncate = substr($truncate, 0, $spacepos);
    }
}
$truncate .= $ending;
if($considerHtml) {
    foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
    }
}
return $truncate;
}

}


	



/*End of Controller*/

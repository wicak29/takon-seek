<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
	    $this->load->helper(array('url','html','form'));
	    $this->load->model('question');
	    $this->load->model('chat');
	    $this->load->model('user_model');
	    if(!$this->session->has_userdata('logged'))
		{
			redirect('auth/login');
		}
		$this->user_login = $this->session->userdata('logged');
	}
	
	public function index()
	{
		if ($this->session->userdata('logged') == TRUE) {
			$userdata = $this->session->userdata('logged');
			$data = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
	    }else{
	    	redirect('auth/login');
	    	return;
	    }
	    $data['id_kategori'] = 0;
	    $data['all_question'] = $this->question->getAllQuestion();

	    foreach ($data['all_question'] as $key => $value) {
			$data['all_question'][$key]['total_answer'] = $this->question->countAnswer($value['id']);
		}
	    // print_r($data);
	    // return;
	    $newCall = $this->user_model->get_call($userdata[0]['id']);
	    $data['call'] = $newCall;
	    // print_r($data);
	    $this->load->view('header');
		$this->load->view('navbar', $data);
    	$this->load->view('home', $data);
	}

	public function category($id)
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
		$data['id_kategori'] = $id;
		$data['question_list'] = $this->question->getQuestionByCat($id);
		// print_r($data['question_list']);
		// return;

		foreach ($data['question_list'] as $key => $value) {
			$data['question_list'][$key]['total_answer'] = $this->question->countAnswer($value['id']);
		}

		// print_r($data['question_list']);
		// return;
		$newCall = $this->user_model->get_call($userdata[0]['id']);
	    $user['call'] = $newCall;
		$this->load->view('header');
		$this->load->view('navbar', $user);
		$this->load->view('question_list', $data);
	}

	public function question_detail($id)
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
		$data['question_det'] = $this->question->getQuestionDetail($id);
		$data['answer_list'] = $this->question->getAnswerById($id);
		if(isset($data['question_det']['video_id']))
		{
			$data['video_detail'] = $this->question->getVideoDetail($data['question_det']['video_id']);
		}
		// print_r($data);
		// return;
		$newCall = $this->user_model->get_call($userdata[0]['id']);
	    $user['call'] = $newCall;
		$this->load->view('header');
		$this->load->view('navbar', $user);
		$this->load->view('question_detail', $data);
	}

	public function mark_answer($qid, $aid)
	{
		$result = $this->question->updateAnswerStatus($aid);
		if ($result)
		{
			// print_r($result)	;
			// return;
			redirect('home/question_detail/'.$qid);
		} 
	}

	public function chat($id)
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
		$data['user'] = $user;
		$data['dest'] = $this->chat->getUser($id);
		// print_r($data);
		// return;
		// print_r($data['dest'][0]) ;
		$result = $this->user_model->store($data['dest'][0]['id'], $userdata[0]['id']);
		$newCall = $this->user_model->get_call($userdata[0]['id']);
	    $user['call'] = $newCall;
		$this->load->view('header');
		// $this->load->view('navbar', $user);
		$this->load->view('videochat', $data);
	}

	public function reset($id)
	{
		$result = $this->user_model->reset($id);
		redirect('home');
	}

	public function create_question()
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
		$newCall = $this->user_model->get_call($userdata[0]['id']);
	    $user['call'] = $newCall;
		$this->load->view('header');
		$this->load->view('navbar', $user);
		$this->load->view('create_question');
	}

	public function add_answer($id)
	{
		$data = $this->input->post();
		$data['user_id'] = $this->user_login[0]['id'];
		$data['qid'] = $id;
		$userdata = $this->session->userdata('logged');

		$result = $this->question->addAnswer($data);
		if ($result) redirect('home/question_detail/'.$id);
	}

	public function create_new_question()
	{
		$query = 0;
		$data = $this->input->post();
		$data['with_video'] = 1;
		$data['user_id'] = $this->user_login[0]['id'];
		// print_r($data);

		if (isset($_FILES['video_upload']['name']) && $_FILES['video_upload']['name'] != '') 
		{
			unset($config);
	        $date = date("ymd");
	        $configVideo['upload_path'] = './assets/video';
	        $configVideo['max_size'] = '31744';
	        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
	        $configVideo['overwrite'] = FALSE;
	        $configVideo['remove_spaces'] = TRUE;
	        $video_name = $date.'-'.$_FILES['video_upload']['name'];
	        $configVideo['file_name'] = $video_name;

	        $this->load->library('upload', $configVideo);
	        $this->upload->initialize($configVideo);

	        if(!$this->upload->do_upload('video_upload')) 
	        {
	            // echo $this->upload->display_errors();
	            $this->load->view('error');
	            // redirect('home/create_question');
	            return;
	        }
	        else
	        {
	            $videoDetails = $this->upload->data();
	            $data['with_video'] =2;
	            $data['video_detail'] = $videoDetails;
	            $data['video_name']= $videoDetails['file_name'];
	        }

	    }
	    // print_r($data);
	    // return;
	    if (isset($data['q_name']))
	    {
	    	$query = $this->question->addQuestion($data);
	    }
        if ($query) redirect('home/category/'.$data['kategori']);
        else $this->load->view('error');
	}
}
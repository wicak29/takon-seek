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
		$this->load->view('header');
		// $this->load->view('header_tiny');
		$this->load->view('navbar', $user);
		$this->load->view('question_detail', $data);
	}

	public function chat($id)
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);
		$data['user'] = $this->chat->getUser($id);
		/*print_r($data);
		return;*/
		$this->load->view('header');
		$this->load->view('navbar', $user);
		$this->load->view('chat', $data);
	}

	public function create_question()
	{
		$userdata = $this->session->userdata('logged');
		$user = array(
				'id' => $userdata[0]['id'],
				'username' => $userdata[0]['username']
			);

		$this->load->view('header');
		$this->load->view('navbar', $user);
		$this->load->view('create_question');
	}

	public function add_answer($id)
	{
		$data = $this->input->post();
		$data['qid'] = $id;
		// print_r($data);
		// return;

		if (isset($_FILES['video_upload']['name']) && $_FILES['video_upload']['name'] != '') 
		{
			unset($config);
	        $date = date("ymd");
	        $configVideo['upload_path'] = './assets/video/comments';
	        $configVideo['max_size'] = '60000';
	        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
	        $configVideo['overwrite'] = FALSE;
	        $configVideo['remove_spaces'] = TRUE;
	        $video_name = $date.'-'.$_FILES['video_upload']['name'];
	        $configVideo['file_name'] = $video_name;

	        $this->load->library('upload', $configVideo);
	        $this->upload->initialize($configVideo);

	        if(!$this->upload->do_upload('video_upload')) 
	        {
	            echo $this->upload->display_errors();
	        }
	        else
	        {
	            $videoDetails = $this->upload->data();
	            $data['with_video'] =2;
	            $data['video_detail'] = $videoDetails;
	            $data['video_name']= $videoDetails['file_name'];
	        }

	    }

		$result = $this->question->addAnswer($data);
		if ($result) redirect('home/question_detail/'.$id);
	}

	public function create_new_question()
	{
		$data = $this->input->post();
		$data['with_video'] = 1;
		$data['user_id'] = $this->user_login[0]['id'];

		if (isset($_FILES['video_upload']['name']) && $_FILES['video_upload']['name'] != '') 
		{
			unset($config);
	        $date = date("ymd");
	        $configVideo['upload_path'] = './assets/video';
	        $configVideo['max_size'] = '60000';
	        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
	        $configVideo['overwrite'] = FALSE;
	        $configVideo['remove_spaces'] = TRUE;
	        $video_name = $date.'-'.$_FILES['video_upload']['name'];
	        $configVideo['file_name'] = $video_name;

	        $this->load->library('upload', $configVideo);
	        $this->upload->initialize($configVideo);

	        if(!$this->upload->do_upload('video_upload')) 
	        {
	            echo $this->upload->display_errors();
	        }
	        else
	        {
	            $videoDetails = $this->upload->data();
	            $data['with_video'] =2;
	            $data['video_detail'] = $videoDetails;
	            $data['video_name']= $videoDetails['file_name'];
	        }

	    }
	    $query = $this->question->addQuestion($data);
        $this->create_question();
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
	    $this->load->helper(array('url','html','form'));
	    $this->load->model('question');
	}
	public function index()
	{
		$this->load->view('home');
	}

	public function category($id)
	{
		$data['id_kategori'] = $id;
		$data['question_list'] = $this->question->getQuestionByCat($id);
		// print_r($data);
		// return;
		$this->load->view('question_list', $data);
	}

	public function question_detail($id)
	{
		$data['question_det'] = $this->question->getQuestionDetail($id);
		$data['answer_list'] = $this->question->getAnswerById($id);
		if(isset($data['question_det']['video_id']))
		{
			$data['video_detail'] = $this->question->getVideoDetail($data['question_det']['video_id']);
		}
		// print_r($data);
		// return;
		$this->load->view('question_detail', $data);
	}

	public function chat()
	{
		$this->load->view('chat');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function create_question()
	{
		$this->load->view('create_question');
	}

	public function add_answer($id)
	{
		$data = $this->input->post();
		$data['qid'] = $id;
		$result = $this->question->addAnswer($data);
		print_r($result);
		return;
	}

	public function create_new_question()
	{
		$data = $this->input->post();
		$data['with_video'] = 1;
		// $q_name = $data['q_name'];
		// $q_text = $data['q_text'];
		// $kategori = $data['kategori'];
		// return;

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
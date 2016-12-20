<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Model 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->data = array();
	}

	public function addQuestion($q)
	{
		if ($q['with_video']==2)
		{
			$video = array(
				'file_path' => $q['video_detail']['file_name'],
				'nama_video' => $q['video_detail']['file_name']
				);

			$this->db->insert('video', $video);
			$insert_id = $this->db->insert_id();
		}
		else
			$insert_id = null;

		$data = array(
			'title' => $q['q_name'], 
			'text' => $q['q_text'],
			'date_posted' => date('Y-m-d h:i:sa'),
			'category' => $q['kategori'],
			'user_id' => $q['user_id'],
			'video_id' => $insert_id,
			);
		$query = $this->db->insert('question', $data);
		return $query;
	}

	public function updateAnswerStatus($id)
	{
		$data = array('answer_status'=>1);
		$this->db->where('answer_id', $id);
		$result = $this->db->update('answer', $data);
		return $result;
	}

	public function addAnswer($answer)
	{
		$data = array(
			'answer_text' => $answer['answer'],
			'answer_status' => 0,
			'answer_date_posted' => date('Y-m-d h:i:sa'),
			'user_id' => $answer['user_id'],
			'question_id' => $answer['qid']
			);
		$query = $this->db->insert('answer', $data);
		return $query;
	}

	public function getAllQuestion()
	{
		$query = $this->db->query('SELECT * FROM question, user WHERE question.user_id=user.id ORDER BY question.id DESC');
		return $query->result_array();
	}

	public function getQuestionDetail($id)
	{
		$query = $this->db->get_where('question', array('id'=>$id));
		return $query->row_array();
	}

	public function getAnswerById($id)
	{
		$query = $this->db->query('SELECT * FROM answer, question, user WHERE answer.question_id=question.id and answer.user_id=user.id and answer.question_id='.$id);
		return $query->result_array();
	}

	public function getVideoDetail($id)
	{
		$query = $this->db->get_where('video', array('id'=>$id));
		return $query->result_array();
	}

	public function countAnswer($id)
	{
		$query = $this->db->query('SELECT * FROM answer WHERE question_id='.$id);
		return $query->num_rows();
	}

	public function getQuestionByCat($id)
	{
		$query = $this->db->query('SELECT * FROM question, user WHERE question.user_id=user.id AND question.category='.$id);
		return $query->result_array();
	}
}

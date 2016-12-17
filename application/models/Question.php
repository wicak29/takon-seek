<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Model 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
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
			'category' => $q['kategori'],
			'user_id' => '1',
			'video_id' => $insert_id,
			);
		$query = $this->db->insert('question', $data);
		return $query;
	}
}

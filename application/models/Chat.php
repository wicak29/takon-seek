<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Model 
{
	public function getUser($id)
	{
		$query = $this->db->query('SELECT * FROM user WHERE id='.$id);
		return $query->result_array();
	}
}

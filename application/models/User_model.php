<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function add_user($no, $nama, $telp)
	{
		// INSERT into 'user' values ('')
		$data = array(
			'no_identitas' => $no,
			'nama_user' => $nama,
			'no_telepon_user' => $telp
		);

		$query = $this->db->insert('user', $data);
		return $query;
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}

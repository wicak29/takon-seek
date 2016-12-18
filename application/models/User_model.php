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
	public function login($data) {
		$where = 'username="'.$data['username'].'" and password="'.$data['password'].'"';
		$query = $this->db->select('*')
			->from('user')
			->where($where)
			->limit(1)
			->get();

		if ($query->num_rows() == 1) {
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function signup($data) {
		$where = 'username="'.$data['username'].'"';
		$query = $this->db->select('*')
			->from('user')
			->where($where)
			->limit(1)
			->get();

		if ($query->num_rows() == 0) {
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return 'success';
			}else
				return FALSE;
		}else
			return 'exist';
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}

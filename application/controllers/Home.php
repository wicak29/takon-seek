<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->view('home');
	}

	public function question_detail()
	{
		$this->load->view('question_detail');
	}

	public function chat()
	{
		$this->load->view('chat');
	}

	public function login()
	{
		$this->load->view('login');
	}

}
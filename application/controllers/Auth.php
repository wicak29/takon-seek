<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
	    $this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('chat');
	}
	public function login(){
		$errors = array_filter($_POST);
		if (!empty($errors)) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == TRUE) {
				$data = array('error' => "Input not allowed");
				$this->load->view('login', $data);
			}else{
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password') 
				);
				$result = $this->user_model->login($data);
				// echo $result;
				if ($result == FALSE) {
					$data = array('error' => "Invalid username or password");
					$this->load->view('login', $data);
				}else {
					unset($result[0]['password']);
					$this->session->set_userdata('logged', $result);
					redirect('home');
				}
			}
		}else
			$this->load->view('login');
	}

	public function signup(){
		$errors = array_filter($_POST);
		if (!empty($errors)) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirm_Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == TRUE) {
				$data = array('error' => "Input not allowed");
				$this->load->view('signup', $data);
			}else{
				if ($this->input->post('password') != $this->input->post('confirm_password')) {
					$data = array('error' => "Password confrimation didn't match");
					$this->load->view('signup', $data);
				}else{
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password') 
					);
					$result = $this->user_model->signup($data);
					// echo $result;
					if ($result == 'success') {
						$data = array('result' => "Regsitration success. Please login first");
						$this->load->view('login', $data);
					}else if ($result == 'exist') {
						$data = array('error' => "User already exist");
						$this->load->view('signup', $data);
					} else {
						$data = array('error' => "Error whiel inserting data");
						$this->load->view('signup', $data);
					}
				}
			}
		}else
			$this->load->view('signup');
	}

}
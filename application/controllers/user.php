<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('user/user_model','user');
		$this->load->library('session');
		$this->load->helper('url');
	}

	
	/*
	 * 
	 * NOTE: To create your first user you will need to Comment out the checkLogin line in the Newuser function, once you have created your first
	 * user you can uncomment that line and then be able to make more users only after you are logged in.
	 * 
	 * 
	 * 
	 */	
	
	//////BEGIN pages
	//
	
	function index()
	{
		
		$this->user->checkLogin();
	}
	
	function newuser() 
	{
		
		$this->user->checkLogin();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email','required|min_length[5]|max_length[105]|valid_email');
		$this->form_validation->set_rules('password', 'Password','required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password 2','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->helper('form');
			$data['onpage'] = 'User';
			$data['subtitle'] = 'Creating a New User';
			$data['maintitle'] = 'New User';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('user/newuser');
			$this->load->view('footer');
			$this->load->view('close');
		} 
		else 
		{
			$post = $this->input->post();
			$result = $this->user->setNewUser($post['email'], $post['password']);
			redirect('','location');
		}		
		
	}
	
	function login() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('password', 'Password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->helper('form');
			$data['onpage'] = 'User';
			$data['subtitle'] = 'Logging in a User';
			$data['maintitle'] = 'User Login';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('user/userlogin');
			$this->load->view('footer');
			$this->load->view('close');
		} 
		else 
		{
			$post = $this->input->post();
			$this->user->loginUser($post['email'], $post['password']);
			$uri = $this->session->userdata('uri');
			if ($uri) 
			{
				redirect($uri, 'location');
			}
		}		
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
	}
	//////END pages
}


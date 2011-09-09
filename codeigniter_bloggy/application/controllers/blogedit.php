<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Blogedit extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('blogedit/blogedit_model','blog');
		$this->load->helper('url');
	}
	
	function index()
	{

		$data['results'] = $this->blog->getBlogEntry();
		$data['onpage'] = 'blogedit';
		$data['subtitle'] = 'blogedit';
		$data['maintitle'] = 'Blog Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('blogedit/blog');
		$this->load->view('footer');
		$this->load->view('close');		
	
	}
	
        /*
         * Blog page section
         */
	function blogedit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('subtitle', 'Patient Name','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->blog->getBlogEntry($id);
			$data['onpage'] = 'blogedit';
			$data['subtitle'] = 'blogedit';
			$data['maintitle'] = 'Blog Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('blogedit/blogedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->blog->updateBlogEntry($id,$post);
			redirect('blogedit/blog','location');
		}
	}
	
	function blogadd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('subtitle', 'Patient Name','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'blogedit Add Blog Entry';
			$data['subtitle'] = 'blogedit Add Blog Entry';
			$data['maintitle'] = 'Blog Entry Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('blogedit/blogadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->blog->setBlogEntry($post);
			redirect('blogedit/blog','location');
		}
		
	}
}
        
       

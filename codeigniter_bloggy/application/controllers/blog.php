<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Blog extends CI_Controller {

	var $kitten; 
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('blog/blog_model','blog');
		$this->load->helper('url');
		$this->kitten = 9;
		
	}

	//////BEGIN pages
	//
	function index($id = null)
	{
		$data['kittennum'] = $this->kitten;
		$data['results'] = $this->blog->getBlogEntry($id);
		$data['onpage'] = 'blog';
		$data['subtitle'] = 'Blog';
		$data['maintitle'] = 'My Blog!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		if ($data['results']) {
			if($data['results']->num_rows() > 1) {
				$this->load->view('blog/multimain');
			} else {
				$this->load->view('blog/singlemain');
			}
		}
		$this->load->view('footer');
		$this->load->view('close');
			
	}
	
	function topic($id = null)
	{
		//TODO this will list a certain topic.  URLs will look like /topic/apple & /topic/summer-school
		
	}
	
	function title($id = null)
	{
		//if $id is null gotta display a list
		//else 
		$data['kittennum'] = $this->kitten;
		$data['results'] = $this->blog->getBlogEntryByTitle($id);
		$data['onpage'] = 'blog';
		$data['subtitle'] = 'Blog search by Title';
		$data['maintitle'] = 'Blog by Title!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		if ($data['results']) {
			if($data['results']->num_rows() > 1) {
				$this->load->view('blog/blogtitlesearch');
			} else {
				$this->load->view('blog/singlemain');
			}
		}
		$this->load->view('footer');
		$this->load->view('close');		
	}	
	//////END pages
}

?>

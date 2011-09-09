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

	/*
	 *  Template without instruction 
	  $this->load->library('menus');
	  $data['nav'] = $this->menus->get_nav();
	  $data['title'] = $this->session->userdata('CompanyName').' Bereavement Application';
	  $data['census'] = $this->session->userdata('census');
	  $this->load->view('header',$data);
	  $this->load->view('bereavement/page');
	  $this->load->view('bombnav');
	  $this->load->view('footer');
	 * 
	 * 
	 * 
	 * Template with Instruction 
	  $this->load->library('menus');
	  $data['instructiontitle'] = 'Instruction: ';
	  $data['instruction'] = "you gotta go here and then click the other thing.";
	  $data['nav'] = $this->menus->get_nav();
	  $data['title'] = $this->session->userdata('CompanyName').' Bereavement Application';
	  $data['census'] = $this->session->userdata('census');
	  $this->load->view('header',$data);
	  $this->load->view('bereavement/page');
	  $this->load->view('bombnav');
	  $this->load->view('instruction');
	  $this->load->view('footer');
	 * 
	 * $this->load->library('form_validation');
	 * $this->form_validation->set_rules('patient', 'Patient Name','required');
	 * if($this->form_validation->run() == FALSE)
	 */
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
	
	function tab($id = null)
	{
		//should come in like "/droid+3/" or "/droid_3/"
		
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

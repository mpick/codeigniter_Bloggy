<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct() {
		parent::__construct();
                $this->load->helper('url');

	}

	
	//////BEGIN pages
	//
	function index($id = null)
	{
                $this->load->database();
		$this->load->model('project/project_model','project'); 
                $data['results'] =      $this->project->getProject($id);
		$count =		$data['results']->num_rows();
		$data['onpage'] =	'projects';
		$data['subtitle'] =	'My projects, past and present';
		$data['maintitle'] =	'Projects!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		if($count > 1) {
			$this->load->view('project/multiproject');
		} else {
			$this->load->view('project/singleproject');
		}		
		$this->load->view('footer');
		$this->load->view('close');
	}
	
	function title($id = null)
	{
                //TODO get this working for project title
		//TODO get the project table with a friendly url title
		//TODO add the friendly url title to the add & update
	}
	
	
	//////END pages
}

?>

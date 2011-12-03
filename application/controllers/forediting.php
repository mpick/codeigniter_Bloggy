<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Forediting extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('forediting/forediting_model','foredi');
		$this->load->model('user/user_model','user');
		$this->load->helper('url');		
		$this->load->library('session');
		$this->user->checkLogin(uri_string());
	}
	
	function index()
	{
		redirect('blog', 'location');
	
	}
	

	
	/*
	 * 
	 * NOTE: This forediting section contains functions and pages for more sections
	 * than blog; It also includes Projects, Links, and Software (you can see these pages
	 * being used on my site milespickens.com)
	 *
	 * 
	 * 
	 * 
	 */	
	
        /*
         * Blog page section
         */
	function blog($id = null)
	{
		//TODO find a way to display the blog entry rows and then make links
		//to edit each one, update tages, delete, etc. 
		//http://twitter.github.com/bootstrap/#tables
		$data['results'] = $this->foredi->getBlogEntry();
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Blog Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/blog');
		$this->load->view('footer');
		$this->load->view('close');
	}
	
	function blogedit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('subtitle', 'Patient Name','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getBlogEntry($id);
			$data['tags'] = $this->foredi->getTags();
			$data['selectedtags'] = $this->foredi->getBlogTags($id);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Blog Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/blogedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateBlogEntry($id,$post);
			redirect('forediting/blog','location');
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
			$data['tags'] = $this->foredi->getTags();
			$data['onpage'] = 'forediting Add Blog Entry';
			$data['subtitle'] = 'ForEditing Add Blog Entry';
			$data['maintitle'] = 'Blog Entry Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/blogadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			//print_r($post);
			$this->foredi->setBlogEntry($post);
			redirect('forediting/blog','location');
		}
		
	}
        
        /*
         * Links page section
         */        
	function link($id=null)
        {
		$data['results'] = $this->foredi->getLink();
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Link Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/link');
		$this->load->view('footer');
		$this->load->view('close');            
        }
        
        
        function linkadd()
        {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('desc', 'Description','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'forediting Add Link Entry';
			$data['subtitle'] = 'ForEditing Add Link Entry';
			$data['maintitle'] = 'Link Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/linkadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->setLink($post);
			redirect('forediting/link','location');
		}            
        }
        
	function linkedit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('desc', 'Description','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getLink($id);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Blog Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/linkedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateLink($id,$post);
			redirect('forediting/link','location');
		}
	}  
        
        /*
         * Software page section
         */ 
        
	function software($id=null)
        {
		$data['results'] = $this->foredi->getSoftware();
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Software Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/software');
		$this->load->view('footer');
		$this->load->view('close');            
        } 
        
        function softwareadd()
        {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('desc', 'Description','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'forediting Add Software Entry';
			$data['subtitle'] = 'ForEditing Add Software Entry';
			$data['maintitle'] = 'Software Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/softwareadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->setSoftware($post);
			redirect('forediting/software','location');
		}            
        }
        
	function softwareedit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('desc', 'Description','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getSoftware($id);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Software Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/softwareedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateSoftware($id,$post);
			redirect('forediting/software','location');
		}
	}
        
        /*
         * Project page section
         */ 
        
        
	function project($id=null)
        {
		$data['results'] = $this->foredi->getProject();
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Project Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/project');
		$this->load->view('footer');
		$this->load->view('close');            
        } 
	
        function projectadd()
        {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('sdate', 'SDate','required');
		$this->form_validation->set_rules('edate', 'EDate');
		$this->form_validation->set_rules('compname', 'CompanyName','required');
		$this->form_validation->set_rules('compurl', 'Company URL');
		$this->form_validation->set_rules('compperson', 'Company Person','required');
		$this->form_validation->set_rules('ccpersonemail', 'Company Person Email','required|valid_email');		
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');		
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'forediting Add Project Entry';
			$data['subtitle'] = 'ForEditing Add Project Entry';
			$data['maintitle'] = 'Project Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/projectadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->setProject($post);
			redirect('forediting/project','location');
		}            
        }	
	
	function projectedit($id)
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('sdate', 'SDate','required');
		$this->form_validation->set_rules('edate', 'EDate');
		$this->form_validation->set_rules('compname', 'CompanyName','required');
		$this->form_validation->set_rules('compurl', 'Company URL');
		$this->form_validation->set_rules('compperson', 'Company Person','required');
		$this->form_validation->set_rules('ccpersonemail', 'Company Person Email','required|valid_email');		
		$this->form_validation->set_rules('body', 'Body','required');
		$this->form_validation->set_rules('active', 'Active');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['projectid'] = $id;
			$data['results'] = $this->foredi->getProject($id);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Project Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/projectedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateProject($id,$post);
			redirect('forediting/project','location');
		}
	}
	
        /*
         * Milestone page section
         */ 
	
	function milestone($id)
	{
		$data['projectid'] = $id;
		$data['results'] = $this->foredi->getMilestone($id);
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Milestone Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/milestone');
		$this->load->view('footer');
		$this->load->view('close');   		
		
	}
	
        function milestoneadd($projectid)
        {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Title','required');
		$this->form_validation->set_rules('subtitle', 'SDate','required');
		$this->form_validation->set_rules('estrdate', 'EDate','required');
		$this->form_validation->set_rules('rdate', 'CompanyName');
		$this->form_validation->set_rules('body', 'body','required' );
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'forediting Add Milestone Entry';
			$data['subtitle'] = 'ForEditing Add Milestone Entry';
			$data['maintitle'] = 'Milestone Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/milestoneadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->setMilestone($projectid, $post);
			redirect('forediting/milestone/' . $projectid,'location');
		}            
        }
	
	function milestoneedit($id)
	{
		$data['milestoneid'] = $this->uri->segment(4);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Title','required');
		$this->form_validation->set_rules('subtitle', 'SDate','required');
		$this->form_validation->set_rules('estrdate', 'EDate','required');
		$this->form_validation->set_rules('rdate', 'CompanyName');
		$this->form_validation->set_rules('body', 'body','required' );
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getMilestone($id, $data['milestoneid']);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Milestone Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/milestoneedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateMilestone($data['milestoneid'],$post);
			redirect('forediting/milestone/' . $id,'location');
		}
	}
	
        /*
         * Task page section
         */ 
	
	function task($id)
	{
		$data['milestoneid'] = $id;
		$data['results'] = $this->foredi->getTask($id);
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Task Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/task');
		$this->load->view('footer');
		$this->load->view('close');   			
	}
	
        function taskadd($milestoneid)
        {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('duedate', 'Due Date','required');
		$this->form_validation->set_rules('ehours', 'Estimated Hours','required');
		$this->form_validation->set_rules('ahours', 'Actual Hours');
		$this->form_validation->set_rules('cdate', 'Completed Date');		
		$this->form_validation->set_rules('body', 'body','required' );
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['onpage'] = 'forediting Add Task Entry';
			$data['subtitle'] = 'ForEditing Add Task Entry';
			$data['maintitle'] = 'Task Add';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/taskadd');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->setTask($milestoneid, $post);
			redirect('forediting/task/' . $milestoneid,'location');
		}            
        }	
	
	function taskedit($id)
	{
		$data['taskid'] = $this->uri->segment(4);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title','required');
		$this->form_validation->set_rules('duedate', 'Due Date','required');
		$this->form_validation->set_rules('ehours', 'Estimated Hours','required');
		$this->form_validation->set_rules('ahours', 'Actual Hours');
		$this->form_validation->set_rules('cdate', 'Completed Date');		
		$this->form_validation->set_rules('body', 'body','required' );
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getTask($id, $data['taskid']);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Task Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/taskedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateTask($data['taskid'],$post);
			redirect('forediting/task/' . $id,'location');
		}
	}
	
        /*
         * Tags page section
         */  	
	function tags()
	{
		//query tags
		$data['results'] = $this->foredi->getTags();
		
		//display tage
		$data['onpage'] = 'forediting';
		$data['subtitle'] = 'ForEditing';
		$data['maintitle'] = 'Tag Editing';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('forediting/tag');
		$this->load->view('footer');
		$this->load->view('close'); 		
		//links to delete and edit
	}
	
	function tagdelete($id)
	{
		$this->foredi->deleteTag($id);
		redirect('forediting/tags','location');
	}
	
	function tagedit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description','required');
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
			$data['results'] = $this->foredi->getTags($id);
			$data['onpage'] = 'forediting';
			$data['subtitle'] = 'ForEditing';
			$data['maintitle'] = 'Tag Entry Edit';
			$this->load->view('head',$data);
			$this->load->view('topbar');
			$this->load->view('forediting/tagedit');
			$this->load->view('footer');
			$this->load->view('close');
		} else {
			$post = $this->input->post();
			$this->foredi->updateTag($id,$post['description']);
			redirect('forediting/tags','location');
		}
	}
}

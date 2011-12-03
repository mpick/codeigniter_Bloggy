<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Info extends CI_Controller {

	function __construct() {
		parent::__construct();
                $this->load->helper('url');

	}


	//////BEGIN pages
	//
	function index()
	{
		$data['onpage'] = 'index';
		$data['subtitle'] = 'Info';
		$data['maintitle'] = 'Welcome!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('info/main');
		$this->load->view('footer');
		$this->load->view('close');
	}
	
	function projects($id = null)
	{
                $this->load->database();
		$this->load->model('info/info_model','info'); 
                $data['results'] =      $this->info->getProject($id);
		$count =		$data['results']->num_rows();
		$data['onpage'] =	'projects';
		$data['subtitle'] =	'My projects, past and present';
		$data['maintitle'] =	'Projects!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		if($count > 1) {
			$this->load->view('info/multiproject');
		} else {
			$this->load->view('info/singleproject');
		}		
		$this->load->view('footer');
		$this->load->view('close');
	}
	
	function software_i_cannot_live_without($id = null)
	{
            //TODO create a main links php page and display the links there
            //There must be a better way to do this?
            //Get and Image? Get a link to an Image?
            
                $this->load->database();
		$this->load->model('info/info_model','info'); 
                $data['results'] =      $this->info->getSoftware($id);
		$data['onpage'] =       'software';
		$data['subtitle'] =     'Software that I cannot live without';
		$data['maintitle'] =    'Software!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('info/multisoftware');
		$this->load->view('footer');
		$this->load->view('close');
	}
	
	function webpages_i_cannot_live_without($id=null)
	{
		$this->load->database();
		$this->load->model('info/info_model','info'); 
                $data['results'] =      $this->info->getLink($id);            
		$data['onpage'] = 'webpage';
		$data['subtitle'] = 'Webpages that I cannot live without';
		$data['maintitle'] = 'Links!';
		$this->load->view('head',$data);
		$this->load->view('topbar');
		$this->load->view('info/multilink');
		$this->load->view('footer');
		$this->load->view('close');
	}	
	//////END pages
}

?>

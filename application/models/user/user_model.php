<?php

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->database();
	}
	
	/*
	 * 
	 * NOTE: Change your Static_salt value before making users
	 * 
	 * 
	 * 
	 */

	////////////////////////////////////
	//BEGIN supporting functions for XXX
	//////////////////////////////////// ]
	//
	
	function hashit($str, $salt = NULL)
	{
		if (!$salt) 
		{
			$dynamic_salt =		microtime();
		} 
		else 
		{
			$dynamic_salt =		$salt;
		}
		$static_salt =		'XYZ123';
		return			array(do_hash($str . $dynamic_salt . $static_salt), $dynamic_salt);
	}
	 
	function loginUser($username, $password)
	{
		$stored	= $this->getUser($username);
		if ($stored) 
		{
			$passhash	=	$this->hashit($password, $stored->row()->salt);
			if ( $stored->row()->password == $passhash[0] ) 
			{
				$sessiondata = array(
				    'username' =>	$stored->row()->username,
				    'logged_in' =>	TRUE
				);
				$this->session->set_userdata($sessiondata);
				return 'logged in';//true;
			} 
			else 
			{
				return 'not logged in';//false;
			}
		} 
		else 
		{
			
			return 'User does not exist';
		}
	
	}
	
	function setNewUser($username, $password)
	{
		if (!$this->taken($username)) 
		{
			$this->setUsername($username, $password);
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}
	
	function taken($username)
	{
		$query = $this->db->get_where('user', array('username' => $username));
		if ($query->num_rows > 0) 
		{
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	
	function getUser($username)
	{
		$query = $this->db->get_where('user', array('username' => $username));
		if ($query->num_rows > 0) 
		{
			return $query;
		} 
		else 
		{
			return FALSE;
		}
		
	}
	
	function setUsername($username, $password)
	{
		//hash the password and store the hashed password, store the salt, etc
		$passhash = $this->hashit($password);
		$data = array(
		    'username'	=>	$username ,
		    'password'	=>	$passhash[0] ,
		    'salt'	=>	$passhash[1] ,
		    'active'	=>	1
		);
		$this->db->insert('user', $data);
	}
	
	function checkLogin($uri = NULL)
	{	
		$status = $this->session->userdata('logged_in');
		if($status) 
		{
			return TRUE;
		} 
		else 
		{
			$this->session->set_userdata('uri',$uri);
			redirect('user/login','location');
		}
	
	}	
	
	////////////////////////////////////
	//END supporting functions for XXX
	////////////////////////////////////      
}


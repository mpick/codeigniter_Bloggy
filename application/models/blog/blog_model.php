<?php

class Blog_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	////////////////////////////////////
	//BEGIN supporting functions for Index
	////////////////////////////////////
	
	function getBlogEntry($id = NULL)
	{
		$this->db->select("idblogentry,title,titleurl,subtitle,entrydate,active,note");
		$this->db->from("blogentry");
		$this->db->where('active', 1);
		if($id)
		{
			$this->db->where('idblogentry', $id); 
		}
		$this->db->order_by('entrydate DESC');
		if ($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return FALSE;
		}
	} 
	
	function getBlogEntryByTitle($title = NULL)
	{
		$this->db->select("idblogentry,title,titleurl,subtitle,entrydate,active,note");
		$this->db->from("blogentry");
		$this->db->where('active', 1);
		if($title)
		{
			$this->db->where('titleurl', $title); 
		}
		$this->db->order_by('entrydate DESC');			
		if ($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return FALSE;
		}		
	}
	
	function getBlogTags($id)
	{
		
		$this->db->select('tagid, urlfriendly');
		$this->db->from('blogtags');
		$this->db->join('tagtypes', 'tagid = idtagtypes');
		$this->db->where('blogentryid', $id); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return FALSE;
		}
		

	}
	
	function getBlogFromTopic($topic)
	{
		//need to get topic ID
		$this->db->select('idtagtypes');
		$query = $this->db->get_where('tagtypes', array('urlfriendly' => $topic));
		if ($query->num_rows == 1) 
		{
			$tagid = $query->row()->idtagtypes;
			return $this->getBlogsWithTagId($tagid);
		} 
		else 
		{
			//could have returned Mult or most likely returned 0
			return false;
		}
		
	}
	
	function getBlogsWithTagId($tagid)
	{
		$this->db->select('idblogentry,title,titleurl,subtitle,entrydate,active,note');
		$this->db->from('blogentry');
		$this->db->join('blogtags', 'blogentryid = idblogentry');
		$this->db->where('tagid', $tagid);
		$this->db->order_by('entrydate desc'); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return FALSE;
		}				
	}
	////////////////////////////////////
	//END supporting functions for Index
	////////////////////////////////////      
}

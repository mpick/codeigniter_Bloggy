<?php

class Blog_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	////////////////////////////////////
	//BEGIN supporting functions for Index
	////////////////////////////////////
	
	function getBlogEntry($id=null)
	{
		$where = '';
		if($id) $where = " AND idblogentry = '{$id}'";
		$query = $this->db->query("SELECT idblogentry,title,titleurl,subtitle,entrydate,active,note
			FROM blogentry 
			WHERE active = 1 {$where}
			ORDER BY entrydate DESC");
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	} 
	
	function getBlogEntryByTitle($title = null)
	{
		$where = '';
		if($title) $where = " AND titleurl = '{$title}'";		
		$query = $this->db->query("SELECT idblogentry,title,titleurl,subtitle,entrydate,active,note
			FROM blogentry 
			WHERE active = 1 {$where}
			ORDER BY entrydate DESC");
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}		
	}
	////////////////////////////////////
	//END supporting functions for Index
	////////////////////////////////////      
}

?>

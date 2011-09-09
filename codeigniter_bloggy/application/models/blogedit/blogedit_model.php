<?php

class Blogedit_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	////////////////////////////////////
	//BEGIN supporting functions for Blog
	////////////////////////////////////
	function getBlogEntry($id=null)
	{
		$where = '';
		if($id) $where = " WHERE idblogentry = '{$id}'";
		$query = $this->db->query("SELECT idblogentry,title,titleurl,subtitle,entrydate,active,note
			FROM blogentry {$where}");
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	
	function getBlogTags($blogid)
	{
		$query = $this->db->query("SELECT description
		FROM blogtags INNER JOIN tagtypes ON tagid = idtagtypes
		WHERE blogentryid = '{$blogid}'");
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	
	function setBlogEntry(array $vars)
	{
		$titleurl = url_title($vars['title'],'dash',TRUE);
		if(!isset($vars['active'])) $vars['active'] = 0;		
		$sql = "INSERT INTO blogentry(title,titleurl,subtitle,entrydate,note,active) "
			. " VALUES({$this->db->escape($vars['title'])},'{$titleurl}', "
			. " {$this->db->escape($vars['subtitle'])},NOW(), "
			. " {$this->db->escape($vars['body'])}, {$this->db->escape($vars['active'])})";
		$this->db->query($sql);
	}
	
	function updateBlogEntry($id,array $vars)
	{
		$titleurl = url_title($vars['title'],'dash',TRUE);
		if(!isset($vars['active'])) $vars['active'] = 0;
		$sql = "UPDATE blogentry "
			. "SET title = {$this->db->escape($vars['title'])}, titleurl = '{$titleurl}', " 
			. "subtitle = {$this->db->escape($vars['subtitle'])}, note = {$this->db->escape($vars['body'])}, "
			. "active = {$this->db->escape($vars['active'])} "
			. "WHERE idblogentry = '{$id}'";
		$this->db->query($sql);
	}
	
	function deleteBlogEntry($id)
	{
		$sql = "UPDATE blogentry "
			. "SET active = 0 "
			. "WHERE idblogentry = '{$id}'";
		$this->db->query($sql);		
		
	}
	
	function setBlogEntryTags(array $array,$blogid)
	{
		$count = count($array);
		foreach ($array as $row) {
			$sql = "INSERT INTO blogtags(blogentryid,tagid) "
				. " VALUES('{$blogid}','{$row}')";
			$this->db->query($sql);	
		}
		return $count;
		
	}
	
	function deleteBlogEntryTag($tagid,$blogid)
	{
		$sql = "DELETE FROM blogtags "
			. " WHERE blogentryid = '{$blogid}',tagid = '{$tagid}')";
		$this->db->query($sql);			
		
	}
	  
	////////////////////////////////////
	//END supporting functions for Blog
	////////////////////////////////////  
	
}

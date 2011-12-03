<?php

class Forediting_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	////////////////////////////////////
	//BEGIN supporting functions for Blog
	////////////////////////////////////
	function getBlogEntry($id = NULL)
	{
		$this->db->select("idblogentry,title,titleurl,subtitle,entrydate,active,note");
		$this->db->from("blogentry");
		if($id)
		{
			$this->db->where('idblogentry', $id); 
		}
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
	
	function getBlogTags( $blogid )
	{
		$this->db->select("description");
		$this->db->from("blogtags");
		$this->db->join("tagtypes", 'tagid = idtagtypes');
		$this->db->where('blogentryid', $blogid);
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
	
	function setBlogEntry(array $vars)
	{
		$titleurl	=	url_title($vars['title'],'dash',TRUE);
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;	
		}
		$data = array(
		    'title'	=>	$vars['title'] ,
		    'titleurl'	=>	$titleurl ,
		    'subtitle'	=>	$vars['subtitle'] ,
		    'entrydate' =>	date("m/d/Y H:i") ,
		    'note'	=>	$vars['body'],
		    'active'	=>	$vars['active']
		);
		$this->db->insert('blogentry', $data); 
		$blogentry_id	=	$this->db->insert_id();
				
		//send tags array to enter into blogtags
		$this->setBlogEntryTags($vars['tags'], $blogentry_id);
		
		//Add new tag types and after each add, setBlogEntryTag with returned array
		if ($vars['addtags'] != '') 
		{
			$newtags	=	explode(",",$vars['addtags']);
			foreach ($newtags as $tag) 
			{
				$tag_id	=	$this->addTag($tag);
				$this->setBlogEntryTags($tag_id, $blogentry_id);
			}
		}
		
		
	}
	
	function updateBlogEntry($id ,array $vars)
	{
		$titleurl		=	url_title($vars['title'], 'dash', TRUE);
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'title'		=>	$vars['title'] ,
		    'titleurl'		=>	$titleurl ,
		    'subtitle'		=>	$vars['subtitle'] ,
		    'note'		=>	$vars['body'] ,
		    'active'		=>	$vars['active']
		);
		$this->db->where('idblogentry', $id);
		$this->db->update('blogentry', $data); 		
		
		//send tags array to enter into blogtags
		$this->deleteBlogEntryTags($id);
		$this->setBlogEntryTags($vars['tags'], $id);
		
		//Add new tag types and after each add, setBlogEntryTag with returned array
		if ($vars['addtags'] != '') 
		{
			$newtags	=	explode(",", $vars['addtags']);
			foreach ($newtags as $tag) 
			{
				$tag_id	=	$this->addTag($tag);
				$this->setBlogEntryTags($tag_id, $id);
			}
		}		
	}
	
	function deleteBlogEntry($id)
	{
		$data = array(
		    'active' => 0
		);
		$this->db->where('idblogentry', $id);
		$this->db->update('blogentry', $data);
		
	}
	
	function setBlogEntryTags($tag_s, $blogid)
	{
		//$tag_s can be one tag or an array of tags
		if ( !is_array($tag_s) )
		{
			$data = array(
			    'blogentryid' =>	$blogid,
			    'tagid' =>		$tag_s
			);
			$this->db->insert('blogtags', $data); 
		}
		else
		{
			foreach ($tag_s as $row) 
			{
				$data = array(
				    'blogentryid' =>	$blogid,
				    'tagid' =>		$row
				);
				$this->db->insert('blogtags', $data); 
			}			
		}
		
	}
	
	/////////////
	//If you need to update blog entry tags, just run a delete which
	//Will Delete all tags for that blog and then run the setBlogEntryTags 
	//Which will insert the array of tags chosen after the Blog is edited. 
	
	function deleteBlogEntryTags($blogid)
	{
		$this->db->delete('blogtags', array('blogentryid' => $blogid)); 
		
	}
	

	  
	////////////////////////////////////
	//END supporting functions for Blog
	////////////////////////////////////  
	
	////////////////////////////////////
	//BEGIN supporting functions for Links
	//////////////////////////////////// 	
	
        
	function getLink($id = NULL)
	{		
		$this->db->select("SELECT idlink,description,url,note,active");
		$this->db->from("link");
		if($id)
		{
			$this->db->where('idlink', $id);
		}
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
        function setLink(array $vars)
        {
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'description'	=>	$vars['desc'] ,
		    'url'		=>	$vars['url'] ,
		    'note'		=>	$vars['body'] ,
		    'active'		=>	$vars['active']
		);
		$this->db->insert('link', $data); 	    
            
        }
        
	function deleteLink( $id )
	{	
		$data = array(
		    'active'		=>	0
		);
		$this->db->where('idlink', $id);
		$this->db->update('link', $data); 		
		
	} 
        
	function updateLink($id, array $vars)
	{
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'description'	=>	$vars['desc'] ,
		    'url'		=>	$vars['url'] ,
		    'note'		=>	$vars['body'] ,
		    'active'		=>	$vars['active']
		);
		$this->db->where('idlink', $id);
		$this->db->update('link', $data); 	
	}        
        
	////////////////////////////////////
	//END supporting functions for Links
	//////////////////////////////////// 
        
	////////////////////////////////////
	//BEGIN supporting functions for Software
	////////////////////////////////////     
        
	function getSoftware($id = NULL)
	{
		$this->db->select("SELECT idsoftware,description,url,note,active");
		$this->db->from("software");
		if($id)
		{
			$this->db->where('idsoftware', $id);
		}
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
        
        function setSoftware(array $vars)
        {
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'description'	=>	$vars['desc'] ,
		    'url'		=>	$vars['url'] ,
		    'note'		=>	$vars['body'] ,
		    'active'		=>	$vars['active']
		);
		$this->db->insert('software', $data); 	    
            
        }        
        
	function deleteSoftware( $id )
	{	
		$data = array(
		    'active'		=>	0
		);
		$this->db->where('idsoftware', $id);
		$this->db->update('software', $data); 		
	} 
        
	function updateSoftware($id, array $vars)
	{
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'description'	=>	$vars['desc'] ,
		    'url'		=>	$vars['url'] ,
		    'note'		=>	$vars['body'] ,
		    'active'		=>	$vars['active']
		);
		$this->db->where('idsoftware', $id);
		$this->db->update('software', $data); 		
	}
        
	////////////////////////////////////
	//END supporting functions for Software
	////////////////////////////////////    
        
	////////////////////////////////////
	//BEGIN supporting functions for Projects
	////////////////////////////////////  
        
        
	function getProject($id = NULL)
	{
		$this->db->select("SELECT idproject,title, DATE_FORMAT(startdate,'%m/%d/%Y') AS startdate, DATE_FORMAT(enddate,'%m/%d/%Y') AS enddate,companyname, companyurl,companycontactperson,companycontactpersonemail, note,active");
		$this->db->from("project");
		if($id)
		{
			$this->db->where('idproject', $id);
		}
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
        
        function setProject(array $vars)
        {
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'title'			=>	$vars['title'] ,
		    'startdate'			=>	$vars['sdate'] ,
		    'enddate'			=>	$vars['edate'] ,
		    'companyname'		=>	$vars['compname'] ,
		    'companyurl'		=>	$vars['compurl'] ,
		    'companycontactperson'	=>	$vars['compperson'] ,
		    'companycontactpersonemail'	=>	$vars['ccpersonemail'] ,
		    'note'			=>	$vars['body'] ,
		    'active'			=>	$vars['active'] 
		);
		//there is also a featured field that is not yet being used or updated
		$this->db->insert('project', $data);           
        }
	
	function updateProject($id, array $vars)
	{
		if(!isset($vars['active']))
		{
			$vars['active'] = 0;
		}
		$data = array(
		    'title'			=>	$vars['title'] ,
		    'startdate'			=>	$vars['sdate'] ,
		    'enddate'			=>	$vars['edate'] ,
		    'companyname'		=>	$vars['compname'] ,
		    'companyurl'		=>	$vars['compurl'] ,
		    'companycontactperson'	=>	$vars['compperson'] ,
		    'companycontactpersonemail'	=>	$vars['ccpersonemail'] ,
		    'note'			=>	$vars['body'] ,
		    'active'			=>	$vars['active']
		);
		$this->db->where('idproject', $id);
		$this->db->update('project', $data); 			
	}
	

	

        
        
	////////////////////////////////////
	//END supporting functions for Projects
	////////////////////////////////////   
	
	////////////////////////////////////
	//BEGIN supporting functions for Milestone
	//////////////////////////////////// 
	
	function getMilestone($projectid, $id = null)
	{
		$this->db->select("SELECT idprojectmilestone,name,subtitle,description,	DATE_FORMAT(createddate,'%m/%d/%Y') as createddate,DATE_FORMAT(estimatedreleasedate,'%m/%d/%Y') as estimatedreleasedate,DATE_FORMAT(releasedate,'%m/%d/%Y') as releasedate,projectid");
		$this->db->from("projectmilestone");
		$this->db->where('projectid', $projectid);
		if($id)
		{
			$this->db->where('idprojectmilestone', $id);
		}
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
	
	function setMilestone($projectid, array $vars)
	{
		$data = array(
			'name'			=>	$vars['name'],
			'subtitle'		=>	$vars['subtitle'],
			'description'		=>	$vars['body'],
			'createddate'		=>	date("m/d/Y H:i"),
			'estimatedreleasedate'	=>	$vars['estrdate'],
			'releasedate'		=>	$vars['rdate'],
			'projectid'		=>	$projectid
		);
		$this->db->insert('projectmilestone', $data);	    
		
	}
	
	function updateMilestone($id, array $vars)
	{
		$data = array(
		    'name'			=>	$vars['name'],
		    'subtitle'			=>	$vars['subtitle'],
		    'description'		=>	$vars['body'],
		    'estimatedreleasedate'	=>	$vars['estrdate'],
		    'releasedate'		=>	$vars['rdate']
		);
		$this->db->where('idprojectmilestone', $id);
		$this->db->update('projectmilestone', $data); 	
	}	
	
	////////////////////////////////////
	//END supporting functions for Milestone
	//////////////////////////////////// 
	
	////////////////////////////////////
	//BEGIN supporting functions for Task
	//////////////////////////////////// 
	
	function getTask($milestoneid, $id = NULL)
	{
		$this->db->select("idmilestonetask,title,description, DATE_FORMAT(duedate,'%m/%d/%Y') AS duedate,estimatedhours,actualhours,DATE_FORMAT(completeddate,'%m/%d/%Y') AS completeddate,milestoneid");
		$this->db->from("milestonetask");
		$this->db->where('milestoneid', $milestoneid);
		if($id)
		{
			$this->db->where('idmilestonetask', $id);
		}
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
	
	function setTask($milestoneid, array $vars)
	{ 	
	    $data = array(
		'title'			=>	$vars['title'],
		'description'		=>	$vars['body'],
		'duedate'		=>	$vars['duedate'],
		'estimatedhours'	=>	$vars['ehours'],
		'actualhours'		=>	$vars['ahours'],
		'completeddate'		=>	$vars['cdate'],
		'milestoneid'		=>	$milestoneid
	    );
	    $this->db->insert('milestonetask', $data);
		
	}
	
	function updateTask($id, array $vars)
	{
		$data = array(
		    'title'		=>	$vars['title'],
		    'description'	=>	$vars['body'],
		    'duedate'		=>	$vars['duedate'],
		    'estimatedhours'	=>	$vars['ehours'],
		    'actualhours'	=>	$vars['ahours'],
		    'completeddate'	=>	$vars['cdate']
		);
		$this->db->where('idmilestonetask', $id);
		$this->db->update('milestonetask', $data); 
	}
	
	////////////////////////////////////
	//END supporting functions for Task
	//////////////////////////////////// 	
	
	////////////////////////////////////
	//BEGIN supporting functions for Tags
	////////////////////////////////////
	
	function getTags($id = NULL)
	{
		$this->db->select("idtagtypes,description,active,urlfriendly");
		$this->db->from("tagtypes");
		$this->db->where("active", 1);
		if($id)
		{
			$this->db->where('idtagtypes', $id);
		}
		$this->db->order_by('description');
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
	
	function addTag($desc)
	{
		
		$data = array(
		    'description' => $desc,
		    'urlfriendly' => url_title($desc)
		);
		$this->db->insert('tagtypes',$data);
		return $this->db->insert_id();	
	}
	
	function deleteTag($id)
	{
		$data = array(
		    'active' => 0
		);
		$this->db->update('tagtypes', $data, array('idtagtypes' => $id));
		
	} 
	
	function updateTag($id, $desc)
	{
		$data = array(
		    'description' => $desc,
		    'active' => 1,
		    'urlfriendly' => url_title($desc)
		);
		$this->db->update('tagtypes', $data, array('idtagtypes' => $id));	
		
	} 
	
	
	////////////////////////////////////
	//END supporting functions for Tags
	////////////////////////////////////	
}


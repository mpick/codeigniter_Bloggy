<?php

class Project_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    ////////////////////////////////////
    //BEGIN supporting functions for XXX
    ////////////////////////////////////  
    //

    function getProject($id = null)
    {
            $where = '';
            if($id) $where = " AND idproject = '{$id}'";
            $query = $this->db->query("SELECT idproject, title, DATE_FORMAT(startdate,'%m/%d/%Y') as startdate,
		    DATE_FORMAT(enddate,'%m/%d/%Y') as enddate, companyname, companyurl, companycontactperson, companycontactpersonemail,
		    note, active
                    FROM project
                    WHERE active = 1 {$where}
                    ORDER BY idproject DESC");
		return $query;    
            /*if($query->num_rows() > 1){
                return $query->result_array();
            }else{
                return $query->row_array();
            }*/	
    }
    
    function getMilestone($projectid, $id = null)
    {
            $where = '';
            if($id) $where = " AND idprojectmilestone = '{$id}'";
            $query = $this->db->query("SELECT idprojectmilestone, name, subtitle, description, DATE_FORMAT(createddate,'%m/%d/%Y') AS createddate, 
		    DATE_FORMAT(estimatedreleasedate,'%m/%d/%Y') AS estimatedreleasedate, 
		    DATE_FORMAT(releasedate,'%m/%d/%Y') AS releasedate, projectid
                    FROM projectmilestone
                    WHERE projectid = '{$projectid}' {$where}
                    ORDER BY idprojectmilestone DESC");
		return $query;    
            /*if($query->num_rows() > 1){
                return $query->result_array();
            }else{
                return $query->row_array();
            }*/	    
    }
    
    function getTask($milestoneid, $id = null)
    {
            $where = '';
            if($id) $where = " AND idmilestonetask = '{$id}'";
            $query = $this->db->query("SELECT idmilestonetask, title, description, DATE_FORMAT(duedate,'%m/%d/%Y') AS duedate,
		    estimatedhours, actualhours, DATE_FORMAT(completeddate,'%m/%d/%Y') AS completeddate, milestoneid
                    FROM milestonetask
                    WHERE milestoneid = '{$milestoneid}' {$where}
                    ORDER BY idmilestonetask DESC");
		return $query;    
            /*if($query->num_rows() > 1){
                return $query->result_array();
            }else{
                return $query->row_array();
            }*/	 	    
	    
    }
    
    function getOpenTask($milestoneid, $id = null)
    {
            $where = '';
            if($id) $where = " AND idmilestonetask = '{$id}'";
            $query = $this->db->query("SELECT idmilestonetask, title, description, DATE_FORMAT(duedate,'%m/%d/%Y') AS duedate,
		    estimatedhours, actualhours, DATE_FORMAT(completeddate,'%m/%d/%Y') AS completeddate, milestoneid
                    FROM milestonetask
                    WHERE milestoneid = '{$milestoneid}' {$where} and completeddate = 0 
                    ORDER BY idmilestonetask DESC");
		return $query;    
            /*if($query->num_rows() > 1){
                return $query->result_array();
            }else{
                return $query->row_array();
            }*/	 	    
	    
    }    
	
    
    ////////////////////////////////////
    //END supporting functions for XXX
    ////////////////////////////////////      
}

?>

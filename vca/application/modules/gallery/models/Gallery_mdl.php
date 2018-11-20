<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_mdl extends CI_Model
{
	private $table;
	
	function __construct()
	{
		parent::__construct();
		$this->table = "gallery";
	}
	
	function add_data($data)
	{
	   if($this->db->insert($this->table,$data)==true)
	        return true;
	    else
	        return false;
	}
	

	function update()
	{
	    $id = $_POST['id'];
	    $menu = $_POST['menu'];
	    $data=array(
	      "menu"=>$menu
	    );
	    
	    
	    $this->db->where("auto_id",$id);
	    if($this->db->update($this->table,$data)==true)
	        return true;
	    else
	        return false;
	}
	
	
	
	function add_data_from_array($data)
	{
	    $val=$data;
	    foreach (explode(',', $data['section']) as $sec)
	    {
	       if ($sec!=null)
	        {
    	       $val['section']=$sec;
    	       $result=$this->db->insert($this->table,$val);
    	    }
	    }	 
	    if($result==true)
	        return true;
	    else
	        return false;
	}
	
// 	function update_data($data,$values)
// 	{
// 	    $this->db->where($data);
// 	     if($this->db->update($this->table,$values)==true)
// 	        return true;
// 	    else
//     	        return false;
// 	}
	
	function view_data_distinct($data)
	{
	    $this->db->select($data);
	    $this->db->where($this->data);
	    $this->db->distinct($data);
	    $qresult = $this->db->get($this->table);
	    return $qresult;
	}
	
    function view_data($data)
	{
	    $this->db->where($data);
	    $this->db->order_by('auto_id',"desc");
		$qresult = $this->db->get($this->table);
		return $qresult;
	}
	function delete_data($data)
	{
	    $this->db->where($data);
	    if($this->db->delete($this->table)==true)
	        return true;
	    else
	        return false;
	}
	function check_unique($data)
	{
 	     $this->db->where($data);
	    if($this->db->get($this->table)->num_rows()>0)
	    {
	        $data=array(
	            "type"=>1,
	            "error"=>"<div class='alert alert-danger'>Class is already created</div>"
	        );
	        echo json_encode($data);
	        die(0);
	    }   
	    else
	        return false;
	}
	function check_unique_from_array($field,$val,$where)
	{
	    foreach (explode(',', $val) as $sec)
	    {
	       $where[$field]=$sec;
	       $this->db->where($where);
	       if($this->db->get($this->table)->num_rows()>0)
	       {
	           $data=array(
    	            "type"=>1,
    	            "error"=>"<div class='alert alert-danger'>$sec is already created for this class</div>"
	           );
	          echo json_encode($data);
	          die(0);
	       }
	    }
	    return false;
	}
	function fetch_section($data)
	{
	    $this->db->select('section');
	    $this->db->where($data);
	    $this->db->distinct('section');
	    $this->db->order_by('section');
	    $qresult = $this->db->get($this->table);
	    return $qresult;
	}
	function delete_if_exists_with_no_section($data)
	{
	    $this->db->where($data);
	    if($this->db->get($this->table)->num_rows()>0)
	    {
	        $this->db->where($data);
	        foreach ($this->db->get($this->table)->result() as $row)
	        {
	            if ($row->section=="")
	                $this->delete_data($data);
	        }
	        
	    }
	}
	
}	
	
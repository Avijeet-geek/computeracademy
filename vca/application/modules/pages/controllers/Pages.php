<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends MX_Controller
{	
    public function view($submenu)//pg_type= 1 menu,submenu and 2 page title
	{
	    if (@$_GET['type']==2){
	        $this->depend['page_title']=urldecode(str_replace("_", " ", $submenu));
	        $qq=$this->db->where($this->depend)->get('web_page');
	        if ($qq->num_rows()>0)
	        {
	            foreach ($qq->result() as $r)
	            {
	                $data=array(
	                    "module"=>'pages',
	                    "view_file"=>'view',
	                    "title"=>"$r->page_title | ".$this->profile['school_name'],
	                    "ctitle"=>$r->page_title,
	                    "page_content"=>$r->page_content,
	                    "image"=>$r->image,
    	                "thumb"=>$r->thumb,
	                    "meta_keywords"=>$r->meta_keywords,
	                    "meta_desc"=>$r->meta_description
	                );
	            }
	            echo Modules::run('template/layout2',$data);
	        }
	        else {
    	       echo Modules::run("error");
	        }
	        die();
	    }
	    if ($submenu=="Admission_Form")
	        redirect("admissionform");
	    
	    $this->depend['sub_menu']=urldecode(str_replace("_", " ", $submenu));
	    $this->db->where($this->depend);
	    $qry=$this->db->get('web_page',1);
	    if ($qry->num_rows()>0)
	    {
	        foreach ($qry->result() as $r)
    	    {
    	         $data=array(
    	             "module"=>'pages',
    	             "view_file"=>'view',
    	             "title"=>"$r->page_title | ".$this->profile['school_name'],
    	             "ctitle"=>$r->page_title,
    	             "page_content"=>$r->page_content,
    	             "image"=>$r->image,
    	             "thumb"=>$r->thumb,
    	             "meta_keywords"=>$r->meta_keywords,
    	             "meta_desc"=>$r->meta_description
    	         );
    	    }
    	    echo Modules::run('template/layout2',$data);
	    }
	    else 
	    {
	        $where=array_slice($this->depend, 0,2);
	        $where['menu']=urldecode(str_replace("_", " ", $submenu));
	        $this->db->where($where);
	        $qry2=$this->db->get('web_page');
	        if ($qry2->num_rows()>0)
	        {
	            foreach ($qry2->result() as $r)
	            {
	                $data=array(
	                    "module"=>'pages',
	                    "view_file"=>'view',
	                    "title"=>"$r->page_title | ".$this->profile['school_name'],
	                    "ctitle"=>$r->page_title,
	                    "page_content"=>$r->page_content,
	                    "image"=>$r->image,
    	                "thumb"=>$r->thumb,
	                    "meta_keywords"=>$r->meta_keywords,
	                    "meta_desc"=>$r->meta_description
	                );
	            }
	            echo Modules::run('template/layout2',$data);
	        }
	        else {
    	       echo Modules::run("error");
	        }
	    }
	}
	function privacy()
	{
	    $data['title']="Privacy policy, ".$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
	    $data['meta_desc']="";
	    $data['meta_keywords']="";
	    $data['module']='pages';
	    $data['view_file']='privacy_policy';
	    echo Modules::run('template/layout2',$data);
	}
}
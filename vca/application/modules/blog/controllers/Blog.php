<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MX_Controller {
 	function index()
	{
	    $blg=$this->db->where('pg_type',5)->order_by('page_id','desc')->get('pages');
	    $b=$blg->result();
	    $data['query']=$b;
// 	    print_r($blg->result());
	    if ($blg->num_rows()>0){
	        $blg=$blg->result();
	        $data['query']=$blg;
	        $data['title']=$blg[0]->title;
	        $data['description']=$blg[0]->description;
	        $data['module']="blog";
	        $data['view_file']="blog";
	        echo Modules::run('template/layout3',$data);
	    }else{
	        echo "Page Under Maintenance";
	    }
	}
	function view($bid){
	    $blg=$this->db->where('b_id',$bid)->get('blog');
	    $b=$blg->result();
	    $data['query']=$b;
	    // 	    print_r($blg->result());
	    if ($blg->num_rows()>0){
	        $blg=$blg->result();
	        $data['bquery']=$blg;
	        $data['title']=$blg[0]->title;
	        $data['description']=$blg[0]->description;
	        $data['module']="blog";
	        $data['view_file']="view";
	        echo Modules::run('template/layout3',$data);
	    }else{
	        echo "Invalid Blog url";
	    }
	}
	
}
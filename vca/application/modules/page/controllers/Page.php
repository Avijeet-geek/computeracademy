<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_page');
    }
    function index()
	{
	    
		$data['title']="vision";
		$data['module']="page";
		$data['view_file']="index";
		echo Modules::run('template/layout3',$data);
	}
	function error()
	{
	    $data['title']="vision";
	    $data['module']="page";
	    $data['view_file']="error";
	    echo Modules::run('template/layout3',$data);
	}
	

    function view($name="Flex")
	{
	    if ($this->input->get('page_id')){
	        $this->db->where('page_id',$this->input->get('page_id'));
	    }
	    elseif ($this->input->get('id')){
	        $pg=array('1','4','2');
	        $this->db->where('m_id',$this->input->get('id'))->where_in('menu_type',$pg);
	    }
	    else if ($this->input->get('s_id')){
	        $this->db->where('m_id',$this->input->get('s_id'))->where('menu_type','3');
	    }
// 	    else if ($this->input->get('cs_id')){
// 	        $this->db->where('c_id',$this->input->get('cs_id'));
// 	        $aa=$this->db->get('plans');
// 	        if ($aa->num_rows()>0){
// 	            $data['plan_qry']=$aa->result();
// 	        }
// 	        $this->db->where('m_id',$this->input->get('cs_id'))->where('menu_type','3');
// 	    }
	    $rr=$this->db->get('pages');  
// 	    print_r($rr->result());die();
	    $p=$rr->result();
	    $data['query']=$p;
	    if ($rr->num_rows()>0){
	        switch ($p[0]->pg_type){
	            case "0":
	                break;
	            case "1":
	                redirect("home");
	            case "2":
	                redirect("login");
                case "3":
                    redirect("registration");
                case "4":
                        redirect("contact");
                case "5":
                        redirect("blog");
                case "6":
                        redirect("career");
                case "7":
                    redirect("gallery");
	        }
	            
	        
	        $data['menu_nm']=$name;
    	    $data['title']=$p[0]->title." $name";
    	    $data['desc']=$p[0]->description;
    	    $data['keywords']=$p[0]->keywords;
    	    $data['module']="page";
    	    $data['view_file']="layout";
    	    echo Modules::run('template/layout3',$data);
	    }else{
	        $this->error(); 
	    }
	    
	}
}
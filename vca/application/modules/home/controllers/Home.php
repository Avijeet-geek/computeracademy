<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MX_Controller
{
// 	function index()
// 	{
// 	    $this->load->helper('text');
// 	    $data['title']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
// 		$data['meta_desc']="Snowdrops School was established in the year 1988 at Krishnanagar, Mirik, Darjeeling. The school has classes from Nursery to X and is affiliated to C.B.S.E. Delhi.";
// 		$data['meta_keywords']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
// 		$data['module']='home';
// 		$data['view_file']='home';
// 		echo Modules::run('template/layout1',$data);
	function index()
	{
	
	    $data['title']="GreenHill";
	    $data['module']="home";
	    $data['view_file']="home";
	    echo Modules::run('template/layout3',$data);
	}
	
	function courses()
	{
	
	    $data['title']="GreenHill";
	    $data['module']="courses";
	    $data['view_file']="courses";
	    echo Modules::run('template/layout3',$data);
	}
	
	function services()
	{
	
	    $data['title']="GreenHill";
	    $data['module']="services";
	    $data['view_file']="services";
	    echo Modules::run('template/layout3',$data);
	}
	function loan()
	{
	    $this->load->helper('text');
	    $data['title']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
	    $data['meta_desc']="Snowdrops School was established in the year 1988 at Krishnanagar, Mirik, Darjeeling. The school has classes from Nursery to X and is affiliated to C.B.S.E. Delhi.";
		$data['meta_keywords']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
	    $data['module']='home';
	    $data['view_file']='loan';
	    echo Modules::run('template/layout2',$data);
	}
	
}

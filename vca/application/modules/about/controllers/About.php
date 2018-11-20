<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About extends MX_Controller{
function index()
	{
	    
		$data['title']="Green Hills | About ";
		$data['module']="about";
		$data['view_file']="about";
		echo Modules::run('template/layout3',$data);
	}
	
}
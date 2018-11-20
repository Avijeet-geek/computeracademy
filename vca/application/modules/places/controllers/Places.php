<?php if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );
class Places extends MX_Controller
{
    function __construct(){
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        $this->load->model ( '');
    }
    
   function darjeeling()
    {
        $data['title']="Darjeeling | Green Hill" ;
        $data['module']='places';
        $data['view_file']='darjeeling';
        echo Modules::run('template/layout3',$data);
    }
    
    function dooarsbhutan()
    {
        $data['title']="Dooarsbhutan | Green Hill" ;
        $data['module']='places';
        $data['view_file']='dooarsbhutan';
        echo Modules::run('template/layout3',$data);
    }
  
	
    function kalimpong()
    {
        $data['title']="Kalimpong | Green Hill" ;
        $data['module']='places';
        $data['view_file']='kalimpong';
        echo Modules::run('template/layout3',$data);
    }
    function lavarishop()
    {
        $data['title']="Lavarishop | Green Hill" ;
        $data['module']='places';
        $data['view_file']='lavarishop';
        echo Modules::run('template/layout3',$data);
    }
    function sikkim()
    {
        $data['title']="Sikkim | Green Hill" ;
        $data['module']='places';
        $data['view_file']='sikkim';
        echo Modules::run('template/layout3',$data);
    }
    function thailand()
    {
        $data['title']="Thailand | Green Hill" ;
        $data['module']='places';
        $data['view_file']='thailand';
        echo Modules::run('template/layout3',$data);
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template extends MX_Controller
{
    function test(){
        $this->load->view('index');
    }
    
//     public $profile;
    function __construct(){
        parent::__construct();
//         $this->db->where($this->depend);
//         foreach ($this->db->get("web_logo")->result() as $row){
//             $this->profile['web_school_logo']=$row->school_logo;
//             $this->profile['web_school_favicon']=$row->school_favicon;
//         }
    }
    
    function layout1($data)
    {
        $data=array_merge($this->profile,$data);
        
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('slide');
        $this->load->view('body');
        $this->load->view('services');
        $this->load->view('footer');
    }
    function layout2($data)
    {
        $data=array_merge($this->profile,$data);
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('body');
        $this->load->view('services');
        $this->load->view('footer');
    }
    function layout3($data)
    {
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('body');
        $this->load->view('footer');
    }
    function layout4($data)
    {
        $data=array_merge($this->profile,$data);
    
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('slide');
        $this->load->view('body');
//         $this->load->view('services');
        $this->load->view('testimonial-page');
        $this->load->view('footer');
    }
  
}?>
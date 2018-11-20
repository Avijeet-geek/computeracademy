<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_services');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save()
    {
   
        $this->load->library('form_validation');
        $this->form_validation->set_rules("title","Title","required|trim");
        $this->form_validation->set_rules("desc","Description","required|max_length[500]");
        if ($this->form_validation->run()==TRUE)
        {
            $data['s_id']=$_POST['s_id'];
            $data['title']=ucfirst($_POST['title']);
            $data['desc']=$_POST['desc'];
            if (@$_POST['id']){//update
                $where['id']=$_POST['id'];
                echo $this->mdl_services->update_data($where,$data);
            }else{//add
                echo $this->mdl_services->add_data($data);
            }
        }
        else
            echo validation_errors();
    }
    function view()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['id']=$_GET['id'];
        if (isset($_GET['s_id']))
            $where['s_id']=$_GET['s_id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="service_head.name as sname,s_id,services.title,services.desc,services.id";
	    
        $return=$this->mdl_services->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['id']=$_GET['id'];
            $object=json_encode($this->mdl_services->view_data($where,"*")->result());
            $data_title= "Service Delete";
    
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_services->delete_data($where);
            }
        }
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_slider');
    }
    function index()
    {
        $this->load->view('slider');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        if (isset($_POST['id']) && $_POST['id'])//update
            $this->form_validation->set_rules("title","Title","required|trim");
        else 
            $this->form_validation->set_rules("title","Title","required|trim|is_unique[slider.title]");
        $this->form_validation->set_rules("height","Height","required|trim|numeric");
        $this->form_validation->set_rules("width","Width","required|trim|numeric");
        $this->form_validation->set_rules("speed","Speed","required|trim|numeric");
       
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['title']=ucfirst($_POST['title']);
            $data['height']=$_POST['height'];
            $data['width']=$_POST['width'];
            $data['speed']=$_POST['speed'];
            $data['modified']=$this->session->userdata('user_id');
            $data['com_id']=$this->data['com_id'];
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                
                $data['status']=$_POST['status'];
                $where['com_id']=$this->data['com_id'];
                $where['slider_id']=$_POST['id'];
                echo $this->mdl_slider->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_slider->add_data($data);
            }
        }
        else
            echo validation_errors();
    }
    function view_data()
    {
        $where['com_id']=$this->data['com_id'];
        if (isset($_GET['id']))
	         $where['slider_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_slider->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['com_id']=$this->data['com_id'];
            $where['slider_id']=$_GET['id'];
            $object=json_encode($this->mdl_slider->view_data($where,"*")->result());
            $data_title= "Slider  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_slider->delete_data($where);
            }
        }
    }
}
?>
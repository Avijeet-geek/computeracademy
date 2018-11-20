<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_cat');
    }
   
    function index()
    {
        $this->load->view('form');
    }
    
    function save_data()
    {
        $this->load->library('form_validation');
        if (isset($_POST['id']) && $_POST['id'])//update
            $this->form_validation->set_rules("name","Name","required|trim");
        else 
            $this->form_validation->set_rules("name","Name","required|trim|is_unique[menu.name]");
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=ucfirst($_POST['name']);
            $data['modified']=$this->session->userdata('user_id');
            $data['com_id']=$this->data['com_id'];
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $data['status']=$_POST['status'];
                $where['com_id']=$this->data['com_id'];
                $where['menu_id']=$_POST['id'];
                echo $this->mdl_cat->update_data($where,$data);
            }
            else //add
            {
                
                echo $this->mdl_cat->add_data($data);
            }
        }
        else
            echo validation_errors();
    }
    function view_data()
    {
                $where['com_id']=$this->data['com_id'];
        if (isset($_GET['id']))
	         $where['category_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_cat->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['com_id']=$this->data['com_id'];
            $where['category_id']=$_GET['id'];
            $object=json_encode($this->mdl_cat->view_data($where,"*")->result());
            $data_title= "Category  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_cat->delete_data($where);
            }
        }
    }
}
?>
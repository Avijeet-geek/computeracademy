<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blocks extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_blocks');
    }
//     function test(){
//         echo $this->data['com_id'];
//     }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        if (isset($_POST['id']) && $_POST['id'])//update
            $this->form_validation->set_rules("name","Block Name","required|trim");
        else 
            $this->form_validation->set_rules("name","Block Name","required|trim|is_unique[blocks.name]");
        $this->form_validation->set_rules("content","Content","required");
       
        if ($this->form_validation->run()==TRUE)
        {
            $this->data['name']=ucfirst($_POST['name']);
            $this->data['content']=$_POST['content'];
            $this->data['modified']=$this->session->userdata('user_id');
//              $this->data['com_id'];
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $this->data['status']=$_POST['status'];
                $where['com_id']=$this->data['com_id'];
                $where['blocks_id']=$_POST['id'];
                echo $this->mdl_blocks->update_data($where,$this->data);
            }
            else //add
            {
                echo $this->mdl_blocks->add_data($this->data);
            }
        }
        else
            echo validation_errors();
    }
    function view_data()
    {
        $where['com_id']=$this->data['com_id'];
        if (isset($_GET['id']))
	         $where['blocks_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_blocks->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['com_id']=$this->data['com_id'];
            $where['blocks_id']=$_GET['id'];
            $object=json_encode($this->mdl_blocks->view_data($where,"*")->result());
            $data_title= "blocks  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_blocks->delete_data($where);
            }
        }
    }
}
?>
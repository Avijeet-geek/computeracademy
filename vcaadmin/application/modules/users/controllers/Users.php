<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MX_Controller
{
    //wGtRkO8VoEyUjS
    private $type;
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_users');
        $this->type=$this->session->userdata('type');
        if ($this->type!="A")
        {
            echo "<br><pre><h3 align='center'>Sorry! you are not an Administrator...</h3></pre>";
            die();
        }
		header("Access-Control-Allow-Origin: *");
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","Name","required|trim");
        
        $this->form_validation->set_rules("usertype","usertype","required|trim");
//         if (isset($_POST['id']) && $_POST['id']){//update
        if($this->input->post('id')){
            $rule="";
        }else{
            $this->form_validation->set_rules("username","username","required|trim|alpha_numeric|is_unique[users.username]");
            $rule="|required";
        }
        $this->form_validation->set_rules("password","password","trim|min_length[6]$rule");
        $this->form_validation->set_rules("cpassword","confirm password","matches[password]");
        $this->form_validation->set_rules("phone","phone","required|trim|numeric|exact_length[10]");
        $this->form_validation->set_rules("phone2","phone2","trim");
        $this->form_validation->set_rules("email","email","trim|valid_email");
        
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=$_POST['name'];
            $data['usertype']=$_POST['usertype'];
            $data['phone']=$_POST['phone'];
            $data['phone2']=$_POST['phone2'];
            $data['email']=$_POST['email'];
            if($this->input->post('password')){
                $data['password']=md5($_POST['password']);
            }
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $data['status']=$_POST['status'];
                $where['user_id']=$_POST['id'];
                echo $this->mdl_users->update_data($where,$data);
            }
            else //add
            {
                $data['username']=$_POST['username'];
                $userid=$this->mdl_users->add_data($data);
                //privileges here
                $this->load->module('user_privileges');
                echo $this->user_privileges->add_default_privileges($userid,$_POST['usertype']);
            }
        }
        else 
            echo validation_errors();
        
    }
    function view_data()
    {
		header("Access-Control-Allow-Origin: *");
        $where=null;
        if (isset($_GET['id']))
	         $where['user_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_users->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
		header("Access-Control-Allow-Origin: *");
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['user_id']=$_GET['id'];
            $object=json_encode($this->mdl_users->view_data($where,"*")->result());
            $data_title= "Users  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_users->delete_data($where);
            }
        }
    }
}
?>
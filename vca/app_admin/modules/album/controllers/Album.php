<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Album extends MX_Controller
{
    function __construct()
    {
         parent::__construct();
         $this->load->model('mdl_album');
     }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        if (isset($_POST['id']) && $_POST['id'])//update
        {
            $this->form_validation->set_rules("title","Album title","required|trim");
        }
        else{ 
            $this->form_validation->set_rules("title","Album title","required|trim");
        }
        $this->form_validation->set_rules("description","Album description","required|trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['title']=$_POST['title'];
            $data['description']=$_POST['description'];
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['album_id']=$_POST['id'];
                $this->load->module('gallery');
//                 $r=$this->gallery->update_album_names($where,$data['title']);
//                 print_r($r);die();
                if ($this->gallery->update_album_names($where,$data['title']))
                {
                    echo $this->mdl_album->update_data($where,$data);
                }else echo "0";
            }
            else //add
            {
                echo $this->mdl_album->add_data($data);
            }
        }
        else 
            echo validation_errors();
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['album_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_album->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['album_id']=$_GET['id'];
            echo $this->mdl_album->delete_data($where);
        }
    }
}
?>
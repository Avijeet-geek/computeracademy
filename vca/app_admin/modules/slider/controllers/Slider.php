<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('slider_mdl');
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
            $this->form_validation->set_rules("title","slider title","required|trim");
        }
        else{ 
            $this->form_validation->set_rules("title","slider title","required|is_unique[slider.title]|trim");
            if (empty($_FILES['image']['name'])) {
                $this->form_validation->set_rules("image","Image","required|trim");
            }
        }
        $this->form_validation->set_rules("content","content","required|trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['title']=$_POST['title'];
            $data['content']=$_POST['content'];
            if (!empty($_FILES['image']['name'])) {
                $data['image']=$this->image_upload($data['title']);
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }
// print_r($data);die();
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['auto_id']=$_POST['id'];
                echo $this->slider_mdl->update_data($where,$data);
            }
            else //add
            {
                echo $this->slider_mdl->add_data($data);
            }
        }
        else 
            echo validation_errors();
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['auto_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->slider_mdl->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            
            $where['auto_id']=$_GET['id'];
            $return=$this->slider_mdl->view_data($where,$select="*");
            foreach ($return->result() as $q)
            {
                $a=$q->image;
            }
            $this->remove_image($a);  
            echo $this->slider_mdl->delete_data($where);
        }
    }
    function image_upload($title)
    {
        // upload coder starts here
        $config['upload_path'] = './assets/website/uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['min_width']=720;
    
        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        $title = str_replace(" ", "_", $title);
        $config['file_name'] = $title . "_" . $rand_number . $timestamp;
    
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
    
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('image'))
        {
            echo $this->upload->display_errors();
            die();
        }
        else
        {
            $image = $this->upload->data();
            return $image['file_name'];
        }
    }
    function remove_image($name)
    {
        $path1="./assets/website/uploads/slider/".$name;
        unlink($path1);
    }
}
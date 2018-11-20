<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider_img extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_slider_img');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules("parent_slider","Slider","required");
        $this->form_validation->set_rules("title","Title","required");
        $this->form_validation->set_rules("description","Description","required");
        if ($this->form_validation->run()==TRUE)
        {
            $data['parent_slider']=$_POST['parent_slider'];
            $data['title']=$_POST['title'];
            $data['description']=$_POST['description'];
            $data['com_id']=$this->data['com_id'];
            $data['modified']=$this->session->userdata('user_id');
            if (!empty($_FILES['image']['name'])) {
                $data['url_type']=0;
                $data['image']=$this->image_upload($data['title']);
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }else if ($this->input->post('image_url')){
                $data['url_type']=1;
                $data['image']=$this->input->post('image_url');
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $data['status']=$_POST['status'];
                $where['slider_img_id']=$_POST['id'];
                $where['com_id']=$this->data['com_id'];
                echo $this->mdl_slider_img->update_data($where,$data);
            }
            else //add
            {
              
                echo $this->mdl_slider_img->add_data($data);
            }
        }
        else
            echo validation_errors();
    }
    function view_data()
    {
            $where['com_id']=$this->data['com_id'];
        if (isset($_GET['id']))
	         $where['slider_img_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_slider_img->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['com_id']=$this->data['com_id'];
            $where['slider_img_id']=$_GET['id'];
            $object=json_encode($this->mdl_slider_img->view_data($where,"*")->result());
            $data_title= "slider_img  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_slider_img->delete_data($where);
            }
        }
    }
    function image_upload($title)
    {
        $folder="slider_img";
        // upload coder starts here
        $config['upload_path'] = './assets/website/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = "./assets/website/uploads/$folder/";
        $config['min_width']=100;
    
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
            if ($this->input->post('width'))
            {
                $config['width'] = $this->input->post('width');
            }else{
                if ($image['image_width']>720)
                    $config['width'] =720;
            }
            // image manipulation resizing 1
            $config['source_image'] = './assets/website/temp/' . $image['file_name'];
            $config['maintain_ratio'] = TRUE;
                
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
    
            if (! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();die();
            }
    
            $this->image_lib->clear();
            // image manipulation resizing 2
            $config['source_image'] = './assets/website/temp/' . $image['file_name'];
            $config['new_image'] = "./assets/website/uploads/$folder/thumb/";
            $config['file_name'] = $title . "_" . $rand_number . $timestamp;
            $config['maintain_ratio'] = TRUE;
            if ($image['image_width']>100){
                $config['width'] = 100;
            }
            $config['overwrite'] = FALSE;
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            if (! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();die();
            }
            else
            {
                unlink($config['source_image']);
                return $image['file_name'];
            }
        }
    }
    function remove_image($name)
    {
        $path1="./assets/website/uploads/slider_img/".$name;
        unlink($path1);
        $path2="./assets/website/uploads/slider_img/thumb/".$name;
        unlink($path2);
    }
}
?>
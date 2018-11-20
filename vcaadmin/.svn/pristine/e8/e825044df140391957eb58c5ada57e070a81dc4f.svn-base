<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_head extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_service_head');
       
    }
    function index()
    {
        $this->load->view('form');
    }
    function save()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("menu_id","Menu","required|trim");
        $this->form_validation->set_rules("name","Service Name","required|trim");
        $this->form_validation->set_rules("description","Description","required|max_length[500]");
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['menu_id']=ucfirst($_POST['menu_id']);
            $data['name']=ucfirst($_POST['name']);
            $data['description']=$_POST['description'];
           
            if (!empty($_FILES['image']['name'])) {
                $data['url_type']=0;
                $data['image']=$this->image_upload($data['name']);
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
            
            
            if (@$_POST['id']){//update
                $where['s_id']=$_POST['id'];
                echo $this->mdl_service_head->update_data($where,$data);
            }else{//add
                echo $this->mdl_service_head->add_data($data);
            }
        }
        else
            echo validation_errors();
    }
    function view()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['s_id']=$_GET['id'];
        if (isset($_GET['menu_id']))
            $where['menu_id']=$_GET['menu_id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="menu.name as mname,menu_id,service_head.description,service_head.status,service_head.name,service_head.s_id,service_head.image,service_head.url_type";
	    
        $return=$this->mdl_service_head->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['s_id']=$_GET['id'];
            $object=json_encode($this->mdl_service_head->view_data($where,"*")->result());
            $data_title= "Service Delete";
    
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_service_head->delete_data($where);
            }
        }
    }
    
    function image_upload($name)
    {
        $folder="service_head";
        // upload coder starts here
        $config['upload_path'] = './assets/website/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = "./assets/website/uploads/$folder/";
        $config['min_width']=100;
    
        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        $name = str_replace(" ", "_", $name);
        $config['file_name'] = $name . "_" . $rand_number . $timestamp;
    
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
            $config['file_name'] = $name . "_" . $rand_number . $timestamp;
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
        if (substr($name, 0,4)!="http"){
            $path1="./assets/website/uploads/service_head/".$name;
            unlink($path1);
            $path2="./assets/website/uploads/service_head/thumb/".$name;
            unlink($path2);
        }
    }
    
    
}
?>
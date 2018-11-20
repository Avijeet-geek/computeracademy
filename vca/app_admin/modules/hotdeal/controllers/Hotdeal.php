<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotdeal extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_hotdeal');
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
            $this->form_validation->set_rules("name","Name","required|trim");
        }
        else{ 
            $this->form_validation->set_rules("name","Name","required|trim|is_unique[hotdeal.name]");
        }
        $this->form_validation->set_rules("description","Description","required|trim");
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=$_POST['name'];
            $data['description']=$_POST['description'];
            if (!empty($_FILES['image']['name'])) {
                $data['image']=$this->image_upload($data['name']);
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['deal_id']=$_POST['id'];
                echo $this->mdl_hotdeal->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_hotdeal->add_data($data);
            }
        }
        else 
            echo validation_errors();
        
    }
    function image_upload($title)
    {
        // upload coder starts here
        $config['upload_path'] = './assets/website/temp';
        $config['allowed_types'] = '*';
        $config['new_image'] = './assets/website/uploads/hotdeal/';
        $config['min_width']=0;
    
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
            // image manipulation resizing 1
            $config['source_image'] = './assets/website/temp/' . $image['file_name'];
            $config['maintain_ratio'] = TRUE;
            if ($image['image_width']>720)
                $config['width'] = 720;
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
    
            if (! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();die();
            }
    
            $this->image_lib->clear();
            // image manipulation resizing 2
            $config['source_image'] = './assets/website/temp/' . $image['file_name'];
            $config['new_image'] = './assets/website/uploads/hotdeal/thumb/';
            $config['file_name'] = $title . "_" . $rand_number . $timestamp;
            $config['maintain_ratio'] = TRUE;
            if ($image['image_width']>300){
                $config['width'] = 300;
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
        $path1="./assets/website/uploads/hotdeal/".$name;
        unlink($path1);
        $path2="./assets/website/uploads/hotdeal/thumb/".$name;
        unlink($path2);
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['deal_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_hotdeal->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['deal_id']=$_GET['id'];
            echo $this->mdl_hotdeal->delete_data($where);
        }
    }
    function get_dept_name($id)
    {
        $select="name";
        $where["deal_id"]=$id;
        
        $return=$this->mdl_hotdeal->view_data($where,$select)->result();
        return $return[0]->name;
    }
}
?>
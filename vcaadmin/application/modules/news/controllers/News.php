<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MX_Controller
{
    function __construct()
    {
         parent::__construct();
         $this->load->model('mdl_news');
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
            $this->form_validation->set_rules("title","news title","required|trim");
        }
        else{ 
            $this->form_validation->set_rules("title","news title","required|is_unique[news.title]|trim");
        }
        $this->form_validation->set_rules("content","content","required|trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['title']=$_POST['title'];
            $data['content']=$_POST['content'];
            $data['com_id']=$this->data['com_id'];
            $data['date']=date("d/m/Y");
            if (!empty($_FILES['image']['name'])) {
                $data['image']=$this->image_upload($data['title']);
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['com_id']=$this->data['com_id'];
                $where['auto_id']=$_POST['id'];
                echo $this->mdl_news->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_news->add_data($data);
            }
        }
        else 
            echo validation_errors();
    }
    function view_data()
    {
        $where['com_id']=$this->data['com_id'];
        if (isset($_GET['id']))
	         $where['auto_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_news->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['com_id']=$this->data['com_id'];
            $where['auto_id']=$_GET['id'];
            $return=$this->mdl_news->view_data($where,$select="*");
            foreach ($return->result() as $q)
            {
                $a=$q->image;
            }
            $this->remove_image($a);  
            echo $this->mdl_news->delete_data($where);
        }
    }
    function image_upload($title)
    {
        // upload coder starts here
        $config['upload_path'] = './assets/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = './assets/uploads/news/';
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
            // image manipulation resizing 1
            $config['source_image'] = './assets/temp/' . $image['file_name'];
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
            $config['source_image'] = './assets/temp/' . $image['file_name'];
            $config['new_image'] = './assets/uploads/news/thumb/';
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
        $path1="./assets/uploads/news/".$name;
        unlink($path1);
        $path2="./assets/uploads/news/thumb/".$name;
        unlink($path2);
    }
}
//Copyright @ Groveus (www.groveus.com)
?>
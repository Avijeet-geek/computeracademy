<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctor extends MX_Controller
{
    function __construct()
    {
         parent::__construct();
         $this->load->model('mdl_doctor');
     }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","Name","required|trim");
        $this->form_validation->set_rules("department_id","Department","required|trim");
        $this->form_validation->set_rules("description","Description","trim");
        $this->form_validation->set_rules("phone1","Phone Number","required|trim");
        $this->form_validation->set_rules("phone2","Alternative Number","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("address","Address","required|trim");
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=$_POST['name'];
            $this->load->module('department');
            $data['department_id']=$_POST['department_id'];
            $data['department']=$this->department->get_dept_name($_POST['department_id']);
            $data['description']=$_POST['description'];
            $data['phone1']=$_POST['phone1'];
            $data['phone2']=$_POST['phone2'];
            $data['facebook']=$_POST['facebook'];
            $data['google']=$_POST['google'];
            $data['twitter']=$_POST['twitter'];
            $data['email']=$_POST['email'];
            $data['address']=$_POST['address'];
            if (!empty($_FILES['image']['name'])) {
                $data['image']=$this->image_upload($data['name']);
                if ($_POST['old_image'])
                {
                    $this->remove_image($_POST['old_image']);
                }
            }
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['doctor_id']=$_POST['id'];
                echo $this->mdl_doctor->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_doctor->add_data($data);
            }
        }
        else 
            echo validation_errors();
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['doctor_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_doctor->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            
            $where['doctor_id']=$_GET['id'];
            $return=$this->mdl_doctor->view_data($where,$select="*");
            foreach ($return->result() as $q)
            {
                $a=$q->image;
            }
            $this->remove_image($a);  
            echo $this->mdl_doctor->delete_data($where);
        }
    }
    function image_upload($title)
    {
        // upload coder starts here
        $config['upload_path'] = './assets/temp';
        $config['allowed_types'] = '*';
        $config['new_image'] = './assets/uploads/doctors/';
        $config['min_width']=200;
    
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
            $config['new_image'] = './assets/uploads/doctors/thumb/';
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
        $path1="./assets/uploads/doctors/".$name;
        unlink($path1);
        $path2="./assets/uploads/doctors/thumb/".$name;
        unlink($path2);
    }
    function fetch_department()
    {
        $where=null;
        if (isset($_GET['doctor_id']))
            $where['doctor_id']=$_GET['doctor_id'];
    
    
        $select="department,name";
        $return=$this->mdl_doctor->view_data($where,$select);
    
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
}
?>
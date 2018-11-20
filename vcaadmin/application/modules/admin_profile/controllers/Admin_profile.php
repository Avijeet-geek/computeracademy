<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_profile extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_admin');
//         $this->db->query("CREATE TABLE IF NOT EXISTS `admin_profile` (
//   `id` int(11) NOT NULL auto_increment,
//   `business_name` varchar(50) NOT NULL,
//   `admin_email` varchar(50) NOT NULL,
//   `logo` text NOT NULL,
//   `phone` int(12) NOT NULL,
//   `address` varchar(100) NOT NULL,
//   `gst_no` int(50) NOT NULL,
//   `bank_acc` int(50) NOT NULL,
//   `ifsc_code` int(50) NOT NULL,
//   `facebook` varchar(100) NOT NULL,
//   `twitter` varchar(100) NOT NULL,
//   `instagram` varchar(100) NOT NULL,
//   `whatsapp` int(12) NOT NULL,
//   `youtube` varchar(100) NOT NULL,
//   `gplus` varchar(50) NOT NULL,
//   `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
//   PRIMARY KEY  (`id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;");
       
    }
    function index()
    {
        $this->load->view('form');
    }
    function add()
    {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","Name","required|trim");
        $this->form_validation->set_rules("username","UserName","required|trim|is_unique[users.username]");
        $this->form_validation->set_rules("password","Password","required|trim");
        $this->form_validation->set_rules("business_name","Business Name","required|trim");
        $this->form_validation->set_rules("admin_email","Email","required|trim");
        $this->form_validation->set_rules("phone","Phone","required|numeric|trim");
        $this->form_validation->set_rules("address","Address","required|trim");
        $this->form_validation->set_rules("gst_no","Gst No","required|trim");
        $this->form_validation->set_rules("bank_acc","Bank Ac No","required|numeric|trim");
        $this->form_validation->set_rules("ifsc_code","Ifsc Code","required|trim");
        $this->form_validation->set_rules("facebook","Facebook","required|trim");
        $this->form_validation->set_rules("twitter","Twitter","required|trim");
        $this->form_validation->set_rules("instagram","Instagram","required|trim");
        $this->form_validation->set_rules("whatsapp","Whats App","required|numeric|trim");
        $this->form_validation->set_rules("youtube","Youtube","required|trim");
        $this->form_validation->set_rules("gplus","Google +","required|trim");
        $this->form_validation->set_rules("moto","Moto","required|trim");
        $this->form_validation->set_rules("about","About Us","required|trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=$_POST['name'];
            $data['username']=$_POST['username'];
            $data['password']=md5($_POST['password']);
            $data['business_name']=$_POST['business_name'];
            $data['admin_email']=$_POST['admin_email'];
            $data['phone']=$_POST['phone'];
            $data['address']=$_POST['address'];
            $data['gst_no']=$_POST['gst_no'];
            $data['ifsc_code']=$_POST['ifsc_code'];
            $data['bank_acc']=$_POST['bank_acc'];
            $data['facebook']=$_POST['facebook'];
            $data['twitter']=$_POST['twitter'];
            $data['instagram']=$_POST['instagram'];
            $data['whatsapp']=$_POST['whatsapp'];
            $data['youtube']=$_POST['youtube'];
            $data['gplus']=$_POST['gplus'];
            $data['seo_analytics']=$_POST['seo_analytics'];
            $data['webmaster_code']=$_POST['webmaster_code'];
            $data['google_map']=$_POST['google_map'];
            $data['moto']=$_POST['moto'];
            $data['about']=$_POST['about'];
            $data['gfooter']=$_POST['gfooter'];
            $data['gheader']=$_POST['gheader'];
            
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
            
            
        if (isset($_POST['id']) && $_POST['id'])//update
            {
                $id=$_POST['id']; 
                echo $this->mdl_admin->update_data($id,$data); die();
            }
            else //add
            {
                
               echo $this->mdl_admin->add($data);
            }
        }
        else
            echo validation_errors();
}
    
    function view()
    {
        $where=null;
        if (isset($_GET['id']))
            $where['id']=$_GET['id'];
    
        if (isset($_GET['data']))
            $select=$_GET['data'];
        else $select="*";
         
        $return=$this->mdl_admin->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
function image_upload($name)
    {
        $folder="page";
        // upload coder starts here
        $config['upload_path'] = './assets/website/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = "./assets/website/uploads/$folder/";
        $config['min_width']=100;
    
        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        $name= str_replace(" ", "_", $name);
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
        $path1="./assets/website/uploads/page/".$name;
        unlink($path1);
        $path2="./assets/website/uploads/page/thumb/".$name;
        unlink($path2);
    }
    

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_settings');
        $this->module="weight_details";
        $this->load->module('user_privileges');
    }
    function index()
    {
        $this->load->view('form');
    }
    function vechiles_inside(){
        $this->load->view('vechiles_inside');
    }
    function view_data($res=null,$where=null,$select="weight_id, vehicle_num, weight_time as time, weight_date as date, vehicle_including_goods_weight as v_weight, supplier.name,rate_id")
    {
        if ($res){
            return $this->mdl_settings->view_data($where,$select);
        }
        
        if (isset($_GET['num']))
            $where['vehicle_num']=$_GET['num'];
    
        if (isset($_GET['data']))
            $select=$_GET['data'];
        else $select="*";
        
        if (isset($_GET['join'])){
            
            $this->db->join('supplier','supplier_id');
        }
        
        $return=$this->mdl_settings->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
    function save_data()
    {
       
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("passbook_price","Passbook Price","required|trim");
        $this->form_validation->set_rules("min","Minimum Weight","required|trim");
        $this->form_validation->set_rules("max","maximum Weight","required|trim");
        $this->form_validation->set_rules("print_header","Print Header","required|trim");
         
        if ($this->form_validation->run()==TRUE)
        {   
            $data['passbook_price']=$_POST['passbook_price'];
            $data['min']=$_POST['min'];
            $data['max']=$_POST['max'];
          
            if($this->input->post('sms_vehicle_entry'))
                $data['sms_vehicle_entry']=1;
            else $data['sms_vehicle_entry']=0;
            
            if($this->input->post('sms_vehicle_exit'))
                $data['sms_vehicle_exit']=1;
            else $data['sms_vehicle_exit']=0;
            
            if($this->input->post('sms_grade_assign'))
                $data['sms_grade_assign']=1;
            else $data['sms_grade_assign']=0;
            
            if($this->input->post('sms_supplier_ad'))
                $data['sms_supplier_ad']=1;
            else $data['sms_supplier_ad']=0;
           
            if($this->input->post('sms_supplier_payment'))
                $data['sms_supplier_payment']=1;
            else $data['sms_supplier_payment']=0;
            
            $data['print_header']=$_POST['print_header'];
            
        if (!empty($_FILES['logo']['name'])) {
           
                $data['logo']=$this->image_upload("CompanyLogo");
                 if ($_POST['old_logo'])
                {
                   $this->remove_image($_POST['old_logo']);
                  
                }
            }
            
            echo $this->mdl_settings->update_data($data);
        }
        else 
            echo validation_errors();
    }
    
    // Save Function For Weight Session Function
    
    
 function image_upload($title)
    {
        // upload coder starts here
        $config['upload_path'] = './assets/uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = './assets/uploads/logo/';
        $config['min_width']=100;
        
    
        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        $title = str_replace(" ", "_", $title);
        $config['file_name'] = $title . "_" . $rand_number . $timestamp;
    
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
    
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('logo'))
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
        $path1="./assets/uploads/logo/".$name;
        unlink($path1);
    }
}
?>
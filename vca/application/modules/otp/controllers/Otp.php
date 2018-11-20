<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Otp extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_otp');
    }
    function generate_otp()
    {
        return rand(000000, 999999);
    }
    function add_data($phone)
    {
        $this->depend['user']=$this->session->userdata('parent_id');
        $this->depend['phone']=$phone;
        $this->depend['unit']="WP";
        //delete previous OTP if any
        if($this->mdl_otp->view_data($this->depend)->num_rows()>0)
            $this->mdl_otp->delete_data($this->depend);
        //
        $this->depend['otp']=$this->generate_otp();
        
        if($this->mdl_otp->add_data($this->depend))
        {
            /*
            $this->load->module('sms');
            $this->sms->send_otp($this->depend['otp'],$phone); 
            */
            redirect('parents/primary_number');
        }
    }
    function check_otp($phone)
    {
        $this->depend['user']=$this->session->userdata('parent_id');
        $this->depend['phone']=$phone;
        $this->depend['unit']="WP";
        
        if($this->mdl_otp->view_data($this->depend)->num_rows()>0)
        {
            return "<span class='col-sm-1'>OTP </span> <span class='col-sm-4'><input name='otp_key' class='form-control' placeholder='Enter OTP key' required></span>";    
        }
    }
    function otp_verification($phone,$otp)
    {
        $this->depend['user']=$this->session->userdata('parent_id');
        $this->depend['phone']=$phone;
        $this->depend['unit']="WP";
        $this->depend['otp']=$otp;
        
        if($this->mdl_otp->view_data($this->depend)->num_rows()>0)
        {
            return true;
        }
        else 
        {
            return false;
        }
        
    }
}
?>
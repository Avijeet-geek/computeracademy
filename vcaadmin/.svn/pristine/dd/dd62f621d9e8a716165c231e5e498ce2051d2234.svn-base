<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{
    //wGtRkO8VoEyUjS   
    function index()
    {
        
    }
    function admin()
    {
        $this->load->view('view');
    }
    function fetch_cards_data()
    {
        $data=array(
            "admin_profile"=>$this->db->get('admin_profile')->num_rows(),
            "contact"=>$this->db->get('contact')->num_rows(),
            "menu"=>$this->db->get('menu')->num_rows(),
            "pages"=>$this->db->get('pages')->num_rows(),
            "plans"=>$this->db->get('plans')->num_rows(),
            "services"=>$this->db->get('services')->num_rows(),
            "service_head"=>$this->db->get('service_head')->num_rows(),
            "users"=>$this->db->get('users')->num_rows(),
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    
}
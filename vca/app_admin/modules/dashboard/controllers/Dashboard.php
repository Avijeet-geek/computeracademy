<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{
   
    function index()
    {
        $data= array(
            "title"=>"Admin Dashboard",
            "module"=>"dashboard",
            "view_file"=>"dashboard"
        );
        echo Modules::run('template/layout1', $data);
    }
    function admin()
    {
        $this->load->view('view');
    }
    function fetch_cards_data()
    {
        $data=array(
//             "doctor_row"=>$this->db->get('doctor')->num_rows(),
            "guestbook_row"=>$this->db->get('guestbook')->num_rows(),
//             "hotdeal_row"=>$this->db->get('hotdeal')->num_rows(),
            "department_row"=>$this->db->get('department')->num_rows(),
            "gallery_row"=>$this->db->get('gallery')->num_rows(),
//             "slider_row"=>$this->db->get('slider')->num_rows(),
//             "news_row"=>$this->db->get('news')->num_rows(),
//             "appointment_row"=>$this->db->get('appointment')->num_rows(),
//             "booking_row"=>$this->db->get('booking')->num_rows(),
            "contact_row"=>$this->db->get('contact')->num_rows()
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    
}
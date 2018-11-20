<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template extends MX_Controller
{
    function layout1($data)
    {
        if ($this->session->userdata('is_logged_in'))
        {
            $this->load->view('header',$data);
            $this->load->view('navigation');
            $this->load->view('body');
            $this->load->view('footer');
        }
        else redirect('login');
    }
    function login_layout($data)
    {
        $this->load->view('header',$data);
        $this->load->view('body');
        $this->load->view('footer');
    }
    
    function app_main()
    {
        if ($this->session->userdata('is_logged_in'))
        {
            //app
            $this->load->view('app/main.js');
            //controllers
            $this->load->view('dashboard/ctrl_dashboard.js');
            $this->load->view('guestbook/ctrl_guestbook.js');
            $this->load->view('department/ctrl_department.js');
            $this->load->view('hotdeal/ctrl_hotdeal.js');
            $this->load->view('contact/ctrl_contact.js');
            $this->load->view('booking/ctrl_booking.js');
            $this->load->view('doctor/ctrl_doctor.js');
            $this->load->view('timetable/ctrl_timetable.js');
            $this->load->view('news/ctrl_news.js');
            $this->load->view('gallery/ctrl_gallery.js');
            $this->load->view('appointment/ctrl_appointment.js');
            $this->load->view('album/ctrl_album.js');
            $this->load->view('slider/ctrl_slider.js');
            $this->load->view('course/ctrl_course.js');
            $this->load->view('services/ctrl_services.js');


        }
        else redirect('login');
    }
    function pagination()
    {
        $this->load->view('dirPagination.tpl.html');
    }
    function help()
    {
        $this->load->view('help/help');
    }
}
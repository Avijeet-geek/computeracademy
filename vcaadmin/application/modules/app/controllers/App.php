<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends MX_Controller
{
    function index()
    {
        if ($this->session->userdata('username'))
        {
            $this->load->view('header');
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
		
        if ($this->session->userdata('username'))
        {
            //app
            $this->load->view('main/main.js');
            //controllers
			
                $this->load->view('login/ctrl_login.js');
                $this->load->view('menu/ctrl_menu.js');
                $this->load->view('our_services/ctrl_our_services.js');
                $this->load->view('service_head/ctrl_service_head.js');
                $this->load->view('services/ctrl_services.js');
                $this->load->view('plans/ctrl_plans.js');
                 $this->load->view('dashboard/ctrl_dashboard.js');
                 $this->load->view('page/ctrl_page.js');
                 $this->load->view('slider/ctrl_slider.js');
                 $this->load->view('slider_img/ctrl_slider_img.js');
                 $this->load->view('contact/ctrl_contact.js');
                 $this->load->view('career/ctrl_career.js');
                 $this->load->view('admin_profile/ctrl_admin.js');
                 $this->load->view('enquiry/ctrl_enquiry.js');
                 $this->load->view('blog/ctrl_blog.js');
                 $this->load->view('gallery/ctrl_gallery.js');
                 $this->load->view('album/ctrl_album.js');
                 $this->load->view('courses/ctrl_courses.js');
                 $this->load->view('logs/ctrl_logs.js');
                 
                 $this->load->view('blocks/ctrl_blocks.js');
                 $this->load->view('testimonial/ctrl_testimonial.js');
                 $this->load->view('socialmedia/ctrl_socialmedia.js');
               

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
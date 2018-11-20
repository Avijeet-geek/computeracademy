<?php if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );
class Contact extends MX_Controller
{
    function __construct(){
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        $this->load->model ( 'contact_mdl');
    }
    
    function index()
    {
        $data['title']=" Contact Us | Green Hill";
        $data['module']='contact';
        $data['view_file']='contactus';
        echo Modules::run('template/layout3',$data);
    }
    
	
    public function add() 
    {
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'name_contact', 'First Name', 'trim|required');
		$this->form_validation->set_rules ( 'lastname_contact', 'Last Name', 'trim|required');
		$this->form_validation->set_rules ( 'email_contact', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules ( 'phone_contact', 'Phone Number','trim|numeric');
		$this->form_validation->set_rules ( 'message_contact', 'Message', 'trim|required' );
		
		if($this->form_validation->run()==true)
		{
		    $this->load->model('contact_mdl');
		    $check=$this->contact_mdl->insert();
		    if($check==true)
		    {
		       
		        echo "<div  class='alert alert-success'>Success ! Thanks For Contacting Us.<br><small>We will get back to you soon.</small></div>";
		    }
		}
		else
		{
		    echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		}
		
	}
}



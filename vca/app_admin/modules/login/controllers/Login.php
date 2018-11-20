<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller {

 	function index()
	{
		$data['heading']="LOGIN";
		$data['title']="Login Section ";
		$data['module']="login";
		$data['view_file']	= "login";
		echo Modules::run('template/login_layout',$data);
	}
	function check_valid_session()
	{
	    if($this->session->userdata('is_logged_in'))
	        echo "1";
	    else echo "0";
	}
	function check()
	{
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
	
		if($this->form_validation->run()==true)
		{
			$this->load->model('mdl_login');
			if($this->mdl_login->validate()==TRUE)
			{
				redirect('dashboard');
			}
			else
			{
				$data['heading']="LOGIN";
				$data['msg']= "Unauthorise User !!! ";
				$data['title']="Login Section";
				$data['module']="login";
				$data['view_file']	= "login";
				echo Modules::run('template/login_layout',$data);
			}
		}
		else
		{
			$data['heading']="LOGIN";
			$data['title']="Login Section | Sinet";
			$data['module']="login";
			$data['view_file']	= "login";
			echo Modules::run('template/login_layout',$data);
		}
	}
	
	
	function account()
	{
		$data['heading']="CHANGE PASSWORD";
		$data['module']="login";
		$data['view_file']="account";
		echo Modules::run('template/emp_layout',$data);
	}
	
	function changed_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('currentpass','Current Password','required|trim');
		$this->form_validation->set_rules('newpass','New Password','required|trim|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('cmpassword','Confirm new Password','required|trim|matches[newpass]');
		
		if($this->form_validation->run()==True)
		{
			$this->load->model('mdl_login');
			if($this->mdl_login->change_pwd()==TRUE)
			{
				echo "changed successfully";die();
				redirect('employee/changed');
			}
			else
			{
				$data['msg']= "Unauthorise User !!!";
				$data['heading']="CHANGE PASSWORD";
				$data['module']="login";
				$data['view_file']="account";
				echo Modules::run('template/emp_layout',$data);
			}
		}
		else
		{
			$this->account();
		}
	
	}
	 function logout()
	 {	
		$this->session->set_userdata('');
		$this->session->sess_destroy();
		redirect('login');
	}
}



<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_login extends CI_Model
{
	public function validate()
	{
		$this->load->helper('security');
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$password2=do_hash($password,'md5');
		$this->db->where('username',$username);
		$this->db->where('password',$password2);
		
		$query=$this->db->get('login');
		if($query->num_rows()>0)
		{
		    foreach ($query->result() as $a)
		    {
		        $data=array('username'=>$this->input->post('username'),
		            'is_logged_in'=> true
				);
		    }
			$this->session->set_userdata($data);
			return true;
		}
		else
		{
			return false;
		}
	}
	function change_pwd()
	{
		$username=$this->session->userdata('username');
		$old_password=$_POST['currentpass'];
		$new_password=$_POST['newpass'];
		
		$this->load->helper('security');
		$new_pwd=do_hash($new_password,'md5');
		$old_pwd=do_hash($old_password,'md5');
		
		$this->db->where('username',$username);
		$this->db->where('password',$old_pwd);
		
		$query=$this->db->get('user');
		$row = $query->num_rows();
		//die();
		if($row>0)
		{
			$data=array(
						"password"=>$new_pwd
					);
			$this->db->where('username',$username);
			$this->db->where('password',$old_pwd);
			$this->db->update('user',$data);
			
			$msg="Password Changed Successfully";
			redirect("login/account?msg=$msg");
		}
		else
		{
			$data['msg']="Error 404... Login Credentials not Matched...<br> Data Not Updated...!!!";
			$data['heading']="Change Password";
			$data['module']="login";
			$data['view_file']="account";
			echo Modules::run('template/layout1',$data);
			//die();
		}
	}
 		
}
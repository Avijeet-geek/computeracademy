<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller 
{
    function index()
    {
        $data['title']="Login | ".$this->profile["school_name"];
        $data['module']="login";
        $data['view_file']	= "index";
        echo Modules::run('template/layout2',$data);
    }
    
    function auth_valid ()
    {
        if ($this->session->userdata('admission_id')){
            return true;
        }else if($this->input->get('std_id') && $this->input->get('key') && $this->input->get('token')){
            $wher['admission_id']=$_GET['std_id'];
            $wher['key']=$_GET['key'];
            $wher['device_token']=$_GET['token'];
            
            $this->db->where($wher);
            $query=$this->db->get('gcm_tokens');
            if($query->num_rows()>0)
            { 
                $where['admission_id']=$_GET['std_id'];
                $im = $this->db->where($where)->get('student_image')->result();//images
                $where['school_id']=$this->depend['school_id'];
                $where['branch_id']=$this->depend['branch_id'];
                $qq=$this->db->where($where)->order_by('auto_id','desc')->get('class_details')->result();
                     
                $q=$this->db->where($where)->get('student_details');
                foreach ($q->result() as $row){
                    
                    $data=array(
                        'admission_id'=>$row->admission_id,
                        'class_name'=>$qq[0]->class_name,
                        'section'=>$qq[0]->section,
                        'student_name'=>$row->student_name,
                        'gender'=>$row->gender,
                        'student_image' => $im[0]->image,
                        'date_of_birth'=>$row->date_of_birth,
                        'primary_number'=>$row->primary_number,
                        'email'=>$row->email,
                        'address'=>$row->address,
                        'city'=>$row->city,
                        'pin'=>$row->pin,
                        'state'=>$row->state,
                        'country'=>$row->country,
                        'previous_school'=>$row->previous_school,
                        'previous_board'=>$row->previous_board,
                        'nationality'=>$row->nationality,
                        'boarding'=>$row->boarding,
                        'aim'=>$row->aim,
                        'is_logged_in'=> true
                    );
                }
                $this->session->set_userdata($data);
                return true;
            }
            else
            {
                echo "<h3 align='center'>Oops Something went wrong...</h3><h5 align='center'>Please Login Again</h5>";
                die();
            }
        }
        else {
            echo "Session Logout";die();
            redirect('login');
        }
    }
    
    function create_password()
    {
        $data['title']=$this->session->userdata('name')." | ".$this->profile["school_name"];
        $data['module']="login";
        $data['view_file']	= "create_password";
        echo Modules::run('template/layout2',$data);
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
            if($this->mdl_login->validate($this->depend))
            {
                $data=array(
                    "error"=>0,
                    "msg"=>"<div class='alert alert-success'>Welcome</div>"
                );  
            }
            else
            {
                $data=array(
                    "error"=>1,
                    "msg"=>"<div class='alert alert-danger'>Please enter valid username and password</div>"
                );
            } 
        }
        else
        { 
            $data=array(
                "error"=>1,
                "msg"=>"<div class='alert alert-info'>".validation_errors()."</div>"
            );
        }
        echo json_encode($data);
    }
    
    function new_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('student_id','Studen ID','trim|required');
        if (@$_POST['otp'] && $_POST['otp']){
            if ($_POST['otp']==$_SESSION['ng-otp']){
                $data=array(
                    "error"=>0,
                    "msg"=>"<div class='alert alert-success'>OTP Validated</div>",
                    "url"=>site_url("login/create_password"),
                );
            }else{
                $data=array(
                    "error"=>1,
                    "msg"=>"<div class='alert alert-danger'>OTP Error</div>",
                    "url"=>"login?err=Otp",
                );
            }
            echo json_encode($data);
            die();
        }
        if($this->form_validation->run()==true)
        {
            $this->load->model('mdl_login');
            if($this->mdl_login->new_login_validate($this->depend))
            {
                $sender=$this->profile["msg_id"];
                $temp_id=95370;
                $pushid=1;
                
                $mobile=$_SESSION['primary_number'];
                
                //                 Please Enter OTP: #VAL# for your #VAL# website panel registration. Regards
                $message="Please Enter OTP: ".$_SESSION['ng-otp']." for your ".$this->profile['school_name']." website panel registration. Regards";
                $output='';
                /*
                 ob_start();
                 $this->load->library('sms_function');
                 $this->sms_function->TransSingle($sender,$temp_id,$mobile,$message,$pushid);
                 $output = ob_get_contents(); //Grab output(message_id)
                 ob_end_clean();
                 
                 $val=explode(",", trim($output));
                 if ($val[0]=="0")
                 {
                 echo "<br>";
                 $data=array(
                 "error"=>1,
                 "msg"=>"<div class='alert alert-danger'>SMS Error: $val[1]</div>"
                 );
                 die();
                 }*/
                
                $data=array(
                    'sms_res'=>$output,
                    "error"=>0,
                    "msg"=>"<div class='alert alert-success'>OTP sent to mobile number ( *******".$mobile[7].$mobile[8].$mobile[9]." )</p></div>"
                );
            }
            else
            {
                $data=array(
                    "error"=>1,
                    "msg"=>"<div class='alert alert-danger'>Please Enter Valid Student ID</div>"
                );
            }
        }
        else
        {
            $data=array(
                "error"=>1,
                "msg"=>"<div class='alert alert-info'>".validation_errors()."</div>"
            );
        }
        echo json_encode($data);
    }
    
    function check_new_password()
    {  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('school_id','school_id','trim|required');
        $this->form_validation->set_rules('branch_id','branch_id','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]'); 
        if($this->form_validation->run()==true)
        {
            $this->load->model('mdl_login');
            if($this->mdl_login->set_new_password($this->depend))
            {  
                $data=array(
                    "error"=>0,
                    "msg"=>"<div class='alert alert-success'>Welcome</div>"
                );
            }
            else
            { 
                $data=array(
                    "error"=>1,
                    "msg"=>"<div class='alert alert-danger'>Please enter valid username and password</div>"
                );
            }
        }
        else
        { 
            $data=array(
                "error"=>1,
                "msg"=>"<div class='alert alert-danger'>".validation_errors()."</div>"
            );
        }
        echo json_encode($data);
    }

    
	
	
	function test()
	{
	    $j=array(); 
	    for ($i=0;$i<5;$i++)
	    {
	        array_push($j, "A".$i);
	    }
	    $j=implode($j,",");
	    print_r($j);
	}
	function account()
	{
		$data['heading']="CHANGE PASSWORD";
		$data['module']="login";
		$data['view_file']="account";
		echo Modules::run('template/emp_layout',$data);
	}
	
	function change_password()
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
				echo "<div class='alert alert-success'>Password Changed Successfully</div>";die();
			}
			else
			{
				echo "<div class='alert alert-danger'>Unauthorise User !!!</div>";
			}
		}
		else
		{
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		}
	
	}
	
    function logout()
    {	
       $this->session->set_userdata('');
       $this->session->sess_destroy();
	   redirect('home');
	}
}
?>
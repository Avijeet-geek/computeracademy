<?php if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );
class Newsletter extends MX_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model ( 'newsletter_mdl');
    }
    function signup_mail($email)
    {
        $this->load->library('email');
        $this->email->set_mailtype("html");

        $domain=site_url('home');
        $secret_key=md5($this->depend['school_id']);
        $unsub_link=site_url('newsletter/unsubscribe')."?email=".$email."&secret=$secret_key";
        $school_name=$this->profile['school_name'];
        
        $where=array_splice($this->depend, 0,2);
        $this->db->where($where);
        foreach ($this->db->get("web_school_profile")->result() as $row){
            $admin_email=$row->admin_email;
        }
        $this->db->where($where);
        foreach ($this->db->get("web_logo")->result() as $row2){
            $logo=$this->bios_path."assets/website_uploads/school_logo/".$row2->school_logo;
        }
        
        $clientmsg="Hi <b>".$email."</b>,<br> Thanks for subscribing our newsletters. We will inform you about our news and latest updates.<br><br><br><i>Regards</i>,<br><b>".strtoupper($school_name)."</b> (<a href='mailto:$admin_email'>$admin_email</a>).<br>
        <a href='$domain' title='".strtoupper($school_name)."'><img src='$logo' alt='".strtoupper($school_name)."' title='".strtoupper($school_name)."'></a><br><br><br><br>
        <p style='align:center;font-size:10px'>Click here to <a href='$unsub_link'>Unsubscribe</a></p>
        ";
        
        //clients mail
        $this->email->to($email);
        $this->email->from($admin_email);
        $subject=strtoupper($school_name)." | Thanks for subscribing newsletter";
        $this->email->subject($subject);
        $this->email->message($clientmsg);
        $this->email->send();
    }
    function unsubscribe()
    {
        $link=site_url('home');
        $secret_key=md5($this->depend['school_id']);
        if (@$_GET['email'] && @$_GET['secret'])
        {
            if ($_GET['secret']==$secret_key)
            {
                $data['status']=0;
                $this->depend['email']=$_GET['email'];
                $this->db->where($this->depend);
                if($this->db->update('web_newsletters',$data)){
                    echo "<br><br><h1 align='center'>Successfully Unsubscribed from receiving <br>".strtoupper($this->profile["school_name"])." Newsletters.</h1><br><h3  align='center'>Thank You.</h3>";
                }   
            }
            else {
                echo "<p align='center'>Invalid request or link.</p>";
            }
            echo "<p align='center'><a href='$link'>Go to Home</a></p>";
        }
    }
    public function add() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		$this->depend["email"]=$_POST['email'];
		$this->check_unique($this->depend);
		
		if ($this->form_validation->run() == true) {
		    $check = $this->newsletter_mdl->add_data($this->depend,$this->profile["school_name"],$this->bios_path);
			if ($check == true) {
			    $this->signup_mail($_POST['email']);
				echo "<font color='green'><b>Success ! You have successfully subscribed to our Newsletters. <br>Please  check your email for welcome message</b></font>";
				die();
			}
		} else {
			echo "<font color='red'>" . validation_errors() . "</font>";
		}
	}
	function check_unique($where)
	{
	    if($this->db->where($where)->get('web_newsletters')->num_rows()==0)
	        return true;//proceed
	    else {
	        //update the newsletter status
	        $data['status']=1;
	        $this->depend['email']=$_POST['email'];
	        $this->db->where($this->depend);
	        $qry=$this->db->update('web_newsletters',$data);
	        if($this->db->affected_rows($qry)==0)        
	           echo "<font color='red'>Email already registered and active.</font>";
	        else
	           echo "<font color='red'>Email Re-joined for newsletters successfully. <br>Thanks for re-subscribing our newsletters.</font>";
	        
	        die();
	    }
	}

}

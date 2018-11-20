<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletter_mdl extends CI_Model{
    
    public $table;
    function __construct(){
        parent::__construct();
        $this->table= "web_newsletters";
    }
    
	public function add_data($data,$school_name){
		return $this->db->insert($this->table,$data);
		
// 		if($insert==false){
// 		    return false;
// 		}
// 		else{
// 		    $where=array_slice($data, 0,2);
// 		    $this->db->where($where);
// 		    foreach ($this->db->get("web_school_profile")->result() as $row){
// 		      $admin_email=$row->admin_email;
// 		    }
// 		    $this->db->where($where);
// 		    foreach ($this->db->get("web_logo")->result() as $row2){
// 		        $logo=$row2->school_logo;
// 		    }
// 			$this->load->library('email');
// 			$this->email->set_mailtype("html");
// 			$domain=site_url('home');
// 			$unsub_link=site_url('newsletter/unsubscribe')."/".$data['email'];
			
// 			$clientmsg="Hi <b>".$data['email']."</b>,<br> Thanks for subcribing our newsletters. We will inform you about our news and latest updates.<br><br><br><i>Regards</i>,<br><b>".strtoupper($school_name)."</b> (<a href='mailto:$admin_email'>$admin_email</a>).<br><a href='$domain' title='".strtoupper($school_name)."'><img src='$logo' title='".strtoupper($school_name)."'><br><br><br><br>
// 			    <p style='align:center;font-size:10px'>Click here to <a href='$unsub_link'>Unsubscribe</a></p>
// 			    ";
// 			//clients mail
// 			$this->email->to($data['email']);
// 			$this->email->from($admin_email);
// 			$subject=strtoupper($school_name)." | Thanks for subscribing newsletter";
// 			$this->email->subject($subject);
// 			$this->email->message($clientmsg);
// 			$this->email->send();

// 			//Admin  mail
// 			$this->email->to($admin_email);
// 			$this->email->from($email);
// 			$this->email->subject('New Contact Message Received');
// 			$this->email->message($message);
// 			$this->email->send();
// 			return true;
// 		}		
	}
	
// 	public function news_insert(){
// 		$email=$this->input->post('email');
// 		$data=array("email"=>$email);
// 		$insert=$this->db->insert('newsletters',$data);
// 		if(!$insert)
// 		{
// 			$errNo   = $this->db->_error_number();
// 			$errMess = $this->db->_error_message();
// 		}
// 		else
// 		{
// 			$this->load->library('email');
// 			$this->email->set_mailtype("html");
				
	
// 			$message="New Subscriber Joined<br><font color='red'>Email : $email";
					
// 			//clients mail
// 			$this->email->to($email);
// 			$this->email->from('admin@cambridgeenglishschool.org');
// 			$this->email->subject('Thanks for Subscribing us');
// 			$this->email->message('Hi '.$email.',<br> Thanks for Subscribing to our newsletters. We will update you soon.<br><br><br>Regards,<br>Cambridge English School(admin@cambridgeenglishschool.org).');
// 			$this->email->send();
	
// 			//stepart mail
// 			$this->email->to('admin@cambridgeenglishschool.org');
// 			$this->email->from($email);
// 			$this->email->subject("New Subscriber Joined");
// 			$this->email->message($message);
// 			$this->email->send();
		
// 			return true;
// 		}
// 	}
}
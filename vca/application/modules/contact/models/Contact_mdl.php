<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_mdl extends CI_Model{
    
	public function insert(){
// 	    print_r($_POST);
// 	    DIE();
	    $insert=$this->db->insert('contact',$_POST);
	    if(!$insert){
	        $errNo   = $this->db->_error_number();
	        $errMess = $this->db->_error_message();	    
	    
	    }
	    else{
	        
			$this->load->library('email');
			$this->email->set_mailtype("html");
			
			$admin="info@greenhilltrip.com";
			$name=$this->input->post('name_contact');
			$name1=$this->input->post('lastname_contact');
			$email=$this->input->post('email_contact');
			$phn=$this->input->post('phone_contact');
			$msg1=$this->input->post('message_contact');
			
			$message="$msg1<br><font color='red'>First Name : $name<br> Last Name: $name1 <br> Email: $email <br> Phone No: $phn ";
			
			//clients mail
			$this->email->to($email);
			$this->email->from($admin);
			$this->email->subject('Thanks for Contacting us');
			$this->email->message('Hi '.$name.',<br> Thanks for contacting us. We will reach you soon.<br><br><br>Regards,<br> Green Hill Trip  ');
			$this->email->send();

			//groveus mail
			$this->email->to($admin);
			$this->email->from($email);
			$this->email->subject('New Contacts Submitted');
			$this->email->message($message);
			$this->email->send();
				
			return true;
	}
	}
	function add_data($data)
	{
	    $a=$this->db->insert('contact', $data);
	    return $this->db->affected_rows($a);
	    //         return true;
	}
// 	public function news_insert(){
// 		$email=$this->input->post('email');
// 		$data=array("email"=>$email);
// 		$insert=$this->db->insert('contact',$data);
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
// // 			$this->email->to($email);
// // 			$this->email->from($this->admin);
// // 			$this->email->subject('Thanks for Subscribing us');
// // 			$this->email->message('Hi '.$email.',<br> Thanks for Subscribing to our newsletters. We will update you soon.<br><br><br>Regards,<br> Janki Publication(admin@jankipublication.com).');
// // 			$this->email->send();
	
// 			//stepart mail
// 			$this->email->to($this->admin);
// 			$this->email->from($email);
// 			$this->email->subject("New Subscriber Joined");
// 			$this->email->message($message);
// 			$this->email->send();
		
// 			return true;
// 		}
// 	}
}
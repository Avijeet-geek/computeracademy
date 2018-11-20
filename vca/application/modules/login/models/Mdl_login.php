<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_login extends CI_Model
{ 
    public function new_login_validate($where)
    {
        // 	    $data=array(
        // 	        "error"=>1,
        // 	        "msg"=>"<div class='alert alert-info'>".$_POST['student_id']."</div>"
        // 	    );echo json_encode($data);
        // 	    die();
       
//         echo "<pre>"; print_r($where); die();

        $where['admission_id']=$_POST['student_id'];
        $this->db->where($where);
        $query2=$this->db->get('student_details');
        if ($query2->num_rows()<1){
            return false;
        }
        else
        {
            $row=$query2->result();
            if($row[0]->web=="1")
            { 
                $data=array(
    	           "error"=>1,
                   "msg"=>"<div class='alert alert-info'>You are already registered</div>"
        	    );
                echo json_encode($data); die(); 
            }
            else
            {  
//                 $this->db->where($where);
//                 $query=$this->db->get('student_details');
//                 if($query->num_rows()>0)
//                 {
//                     foreach ($query->result() as $a)
//                     {
//                         $q=$this->db->select("admission_id")->where($where)->get('student_details');
                    if ($row[0]->status==1)
                    {
                        $where['ng-otp']=0007;
                        $where['admission_id']=$row[0]->admission_id;
                        //                     $where['ng-otp']=rand(1000,9999);
                        $where['primary_number']=$row[0]->primary_number;
                    }
                    $this->session->set_userdata($where);
                    return true;
//                 }
//                 else return false;
            }
        }
   }
    
    function set_new_password($data)
    {  
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        
        $this->load->helper('security'); 
        $con_pwd=do_hash($confirm_password,'md5');
            $data["admission_id"]=$_SESSION['admission_id']; 
            $data["created_date"]=date('d/m/Y');
            $data["password"]=$con_pwd;
              
            $this->db->insert('student_login',$data); 
            
            $where['school_id']=$data['school_id'];
            $where['branch_id']=$data['branch_id'];
            $where['admission_id']=$data['admission_id'];
            
            $data2=array(
                "web"=>1, 
            ); 
                
            $this->db->where($where);
            $chk=$this->db->update('student_details',$data2);
            if ($chk == TRUE)
            {
                return true;
            }
    }
    
	public function validate()
	{ 
 	    $this->load->helper('security');
		$username=$_POST['username'];
		$password=$_POST['password'];
		 
		$password2=do_hash($password,'md5');
		$this->db->where('admission_id',$username);
		$this->db->where('password',$password2);
		$this->db->where('status',1);
		$query=$this->db->get('student_login');
		if($query->num_rows()>0)
		{
		    foreach ($query->result() as $a)
		    {    
		       $where['admission_id']=$username;
		       $im = $this->db->where($where)->get('student_image')->result();//images
		       $q=$this->db->where($where)->get('student_details');
		          foreach ($q->result() as $row){ 
		              $where['admission_id']=$row->admission_id;
		              $q=$this->db->where($where)->get('class_details');
		              foreach ($q->result() as $row3){  
                if ($a->status==1)
                { 
                    $data=array(
                        'admission_id'=>$row->admission_id,
                        'class_name'=>$row3->class_name,
                        'section'=>$row3->section,
                        'student_name'=>$row->student_name,
                        'gender'=>$row->gender,
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
                        'student_image' => @$im[0]->image,
                        'boarding'=>$row->boarding,
                        'aim'=>$row->aim,
                        'is_logged_in'=> true
                    );   
                }
		    }
		          }
		    }
			$this->session->set_userdata($data);
			return true;
		}
		else return false;
	}
	function change_pwd()
	{
		$where['parent_id']=$this->session->userdata('parent_id');
		$old_password=$_POST['currentpass'];
		$new_password=$_POST['newpass'];
		
		$this->load->helper('security');
		$new_pwd=do_hash($new_password,'md5');
		$old_pwd=do_hash($old_password,'md5');
		
		$where['password']=$old_pwd;
		
		$this->db->where($where);
		$query=$this->db->get('user_manager');
		$row = $query->num_rows();
		if($row>0)
		{
			$data=array(
						"password"=>$new_pwd
					);
			$this->db->where($where);
			return $this->db->update('user_manager',$data);
		}
		else
		{
			return false;
		}
	}
 		
}
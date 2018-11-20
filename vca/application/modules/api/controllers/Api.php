<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends MX_Controller
{
    function __construct(){
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
    }
    function list_news()
	{
	    $this->db->order_by('auto_id','desc');
        $return = $this->db->select("news_title,posted_date,auto_id,news_thumb,type")
                  ->where($this->depend)->get('web_news');
        
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function full_news()
	{
	    if (@$_GET['id'] && $_GET['id'])
	    {
	        $id=$_GET['id'];
    	    $return = $this->db->select("news_title,news,posted_date,auto_id,news_image_file,type")
    	    ->where($this->depend)->where('auto_id',$id)->get('web_news');
    	
    	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }  
	}
	function list_events()
	{
	    if (@$_GET['month'] && $_GET['month'] && @$_GET['year'] && $_GET['year'])
	    {
	        $month = array('January'=>'01','February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06','July'=>'07','August'=>'08','September'=>'09','October'=>'10','November'=>'11','December'=>'12');
	        $pattern=$month[ucfirst($_GET['month'])]."/".$_GET['year'];
	        $this->db->like('start_date',$pattern,'before');
	    }
	    else
	    {
	        $pattern=date('m/Y');
	        $this->db->like('start_date',$pattern,'before');
	    }   
// 	    $this->db->order_by('auto_id','desc');
	    $return = $this->db->select("title,start_date,auto_id,timetable,hh,mm")
	    ->where($this->depend)->get('events_master');
	
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function full_events()
	{
	    if (@$_GET['id'] && $_GET['id'])
	    {
	        $id=$_GET['id'];
	        $return = $this->db->select("title,start_date,auto_id,details,timetable,hh,mm")
	        ->where($this->depend)->where('auto_id',$id)->get('events_master');
	         
	        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }
	}
	function list_gallery()
	{
	    $this->db->order_by('auto_id','desc')->where('album_id',"random");
	    $return = $this->db->select("gallery_title,gallery_image,gallery_image_thumb")
	    ->where($this->depend)->get('web_gallery');
	
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function album_name()
	{
	    $this->db->order_by('auto_id','desc');
	    $return = $this->db->select("album_id,album_name")
	    ->where($this->depend)->get('web_album');
	
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function list_album_pictures()
	{
	    if (@$_GET['id'] && $_GET['id'])
	    {
	        $id=$_GET['id'];
	        $this->db->where('album_id',$id);
	        $return = $this->db->select("gallery_title,gallery_image,gallery_image_thumb")
	        ->where($this->depend)->get('web_gallery');
	
	        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }
	}
	function join_siblings()
	{
	    if (@$_POST['admission_id'] && $_POST['admission_id'])
	    {
	        $where1['parent_id']=$this->session->userdata('parent_id');
	        $where2['admission_id']=$_POST['admission_id'];
	
	        $res=$this->db->where($where1)->get('parent_details');
	        $rs=$res->result();
	        $p_name1=$rs[0]->name;
	        $contact1=$rs[0]->contact1;
	         
	        $res=$this->db->where($where2)->get('parent_details');
	        if ($res->num_rows()>0){
	            $rs=$res->result();
	            $p_name2=$rs[0]->name;
	            $contact2=$rs[0]->contact1;
	        }else{
	            echo "<div class='alert alert-danger'>Invalid Admission ID</div>";
	            die();
	        }
	         
	         
	        if ($p_name1==$p_name2 && $contact1==$contact2)
	        {
	            $data1['parent_id']=$this->session->userdata('parent_id');
	            $data2['status']=0;
	             
	            $res=$this->db->where($where2)->update('parent_details',$data1);
	            $res=$this->db->where($where2)->update('parent_details',$data2);
	            if ($this->db->affected_rows($res)>0)
	            {
	                echo "<div class='alert alert-success'>Congrats ! You have successfully joined your child in a single Parent ID</div>";
	                die();
	            }
	            else{
	                echo "<div class='alert alert-info'>Unable to process your request.</div>";
	                die();
	            }
	        }
	        else{
	            echo "<div class='alert alert-danger'>Sorry your present details doesn't match with the given student's parent's details. Please Contact School Admin.</div>";
	            die();
	        }
	    }else{
	        echo "<div class='alert alert-warning'>Please fill Admission ID</div>";
	    }
	}
	function fetch_sessions()
	{
        $return = $this->db->select('session_name,session_id')->where($this->depend)->get('session_master');
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function fetch_exams()
	{
	    if (@$_GET['session_id'] && $_GET['session_id'])
	    {
	        $this->depend['session_id']=$_GET['session_id'];
	        $return = $this->db->select('exam_name,exam_id')->where($this->depend)->get('exam_master');
	        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }
	}
	function fetch_classes()
	{
	    if (@$_GET['exam_id'] && $_GET['exam_id'] && @$_GET['session_id'] && $_GET['session_id'])
	    {
	        $this->depend['exam_id']=$_GET['exam_id'];
	        $this->depend['session_id']=$_GET['session_id'];
	        $return = $this->db->select('class_name')->where($this->depend)->get('exam_master');
	        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }
	}
	function fetch_sections()
	{
	    if (@$_GET['class_name'] && $_GET['class_name'])
	    {
	        $this->depend['class_name']=$_GET['class_name'];
	        $return = $this->db->select('section')->where($this->depend)->get('class_master');
	        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }
	}
	function check_result()
	{
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules ('session_id', 'Session', 'trim|required');
	    $this->form_validation->set_rules ('exam_id', 'Exam', 'trim|required');
	    $this->form_validation->set_rules ('class_name', 'Class', 'trim|required');
	    $this->form_validation->set_rules ('section', 'Section', 'trim|required');
	    $this->form_validation->set_rules ('roll_no', 'Roll No', 'trim|required');
	    
	    if ($this->form_validation->run () == true)
	    {
	        $this->depend["session_id"]=$_POST['session_id'];
	        $this->depend["class_name"]=$_POST['class_name'];
	        $this->depend["section"]=$_POST['section'];
	        $this->depend["roll_no"]=$_POST['roll_no'];
	        
			echo "<p style='color:red;padding:20px'>Result under processing...</p>";die();
// 	        print_r($this->depend);die();
	        $where["exam_id"]=$_POST['exam_id'];
	        
	        $cls=$this->db->where($this->depend)->get("class_details");
	        if ($cls->num_rows()>0)
	        {
	            $cls=$cls->result();
	            $where['admission_id']=$cls[0]->admission_id;
	            
	            $select="marksheet_details.auto_id, admission_id,student_name, exam_id, roll_no, class, section, total, percentage, grade, attendance, rank, remarks";
	            $this->db->select($select)->where($where);
	            $data['marksheetDetails']=$this->db->from('marksheet_details')->join('student_details','admission_id')->get();
	            
	            $this->db->select("subject_name,subject_code,subject_prefix,exam_id,obtain_marks")->where($where);
	            $data['resultData']=$this->db->from('subject_master')->join('marksheet_result','subject_code')->get();
	            
	            $this->load->view('result_layout',$data);
	        }
	        else {
	            echo "<div class='alert alert-danger'>Roll no not found</div>";
	        }
	    } 
	    else
	        echo "<div class='alert alert-danger'>".validation_errors()."</div>";
	}
	function get_student_details($adm_id)
	{
	    $st_res=$this->db->select("student_name,roll_no,admission_id,class_name,section,gender")->where("admission_id",$adm_id)->get('admission');
	    if($st_res->num_rows()>0)
	    {
	        return $st_res->result();
	    }else{
	        echo "<div class='alert alert-danger'>Invalid Admission ID</div>";
	    }
	}
	
	function get_fees_details()
	{
	    if (sizeof($this->session->userdata('admission_id'))>0)
	    {
	        $data="<table class='table'><tr class='active'><th>Student Name</th><th>Admission ID</th><th>Class</th><th>Section</th><th>Roll No</th><th>Action</th></tr>";
	        foreach($this->session->userdata('admission_id') as $id):
    	        foreach($this->get_student_details($id) as $st):
    	        $data.="<tr><th>$st->student_name</th><th>$st->admission_id</th><th>$st->class_name</th><th>$st->section</th><th>$st->roll_no</th><th><a href='".site_url("parents/fees_particulars?adm_id=$st->admission_id")."' class='btn btn-info'>View Fees</a></th></tr>";
    	        endforeach;
	        endforeach;
	        $data.="</table>";
	        echo $data;
	    }
	}
	function view_today_birthday()
	{
	    $date=date("d/m/");
	    $where=array_slice($this->depend,0,2);
	
	    $this->db->select('admission_id,student_name,date_of_birth')->where($where)->like('date_of_birth',$date,"after");
	    return $this->db->get('student_details');
	}
}
?>
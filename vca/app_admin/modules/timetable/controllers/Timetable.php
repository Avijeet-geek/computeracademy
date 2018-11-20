<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Timetable extends MX_Controller
{
function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_timetable');
    }
    function index()
    {
        $this->load->view('form');
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
            $where['timetable_id']=$_GET['id'];
        if (isset($_GET['department']))
            $where['department']=$_GET['department'];
        if (isset($_GET['doctor_id']))
            $where['doctor_id']=$_GET['doctor_id'];
        
        if (isset($_GET['data']))
            $select=$_GET['data'];
        else $select="*";
         
        $return=$this->mdl_timetable->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function save_data()
    {
        $this->load->library('form_validation');
       
        $this->form_validation->set_rules("doctor_id","Doctor Name","required|trim");
        $this->form_validation->set_rules("department","Department","required|trim");
        $this->form_validation->set_rules("doctor_name","Doctor Name","trim");
        $this->form_validation->set_rules("description","Chamber Address","required|trim");
        $this->form_validation->set_rules("day","Day","required|trim");
        $this->form_validation->set_rules("arrival_time","Arrival Time","required|trim");
        $this->form_validation->set_rules("departure_time","Departure Time","required|trim");
       
    
        if ($this->form_validation->run()==TRUE)
        {
            $data['doctor_id']=$_POST['doctor_id'];
            $data['department']=$_POST['department'];
            $data['doctor_name']=$_POST['doctor_name'];
            $data['description']=$_POST['description'];
            $data['day']=$_POST['day'];
            $data['arrival_time']=$_POST['arrival_time'];
            $data['departure_time']=$_POST['departure_time'];
//     print_r($data);
//     die();
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['timetable_id']=$_POST['id'];
                echo $this->mdl_timetable->update_data($where,$data);
            }
            else //add
            {
                
                echo $this->mdl_timetable->add_data($data);
            }
        }
        else
            echo validation_errors();
    
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['timetable_id']=$_GET['id'];
            echo $this->mdl_timetable->delete_data($where);
        }
    }
    
}
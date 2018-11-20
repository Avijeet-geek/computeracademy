<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_booking');
    }
    function index()
    {
        $this->load->view('form');
    }
   
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['auto_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_booking->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
    function get_dept_name($id)
    {
        $select="name";
        $where["department_id"]=$id;
        
        $return=$this->mdl_department->view_data($where,$select)->result();
        return $return[0]->name;
    }
}
?>
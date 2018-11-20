<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Career extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_career');
    }
    function index()
    {
        $this->load->view('data');
    }

    
    function view_data()
    {
        $where=null;
        if (isset($_GET['ca_id']))
	         $where['ca_id']=$_GET['ca_id'];
        
        if (isset($_GET['met']))
            $where['address']=$_GET['met'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="career.name,career.phone,career.email,career.city,career.address,career.image";
	    
        $return=$this->mdl_career->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['ca_id']) && $_GET['ca_id'])
        {
            $where['ca_id']=$_GET['ca_id'];
            $object=json_encode($this->mdl_career->view_data($where,"*")->result());
            $data_title= "Career  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_career->delete_data($where);
            }
        }
    }
}
?>
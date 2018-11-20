<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_calendar');
    }
    function index($year=null,$month=null){
        if($year==null) $year=date('Y');
        if($month==null) $month=date('m');
//         $this->mdl_calendar->generate($year,$month,$this->depend);
        $data['calendar']=$this->mdl_calendar->generate_cal($year,$month,$this->depend);
        $data['year']=$year;
        $data['month']=$month;
        
        $data['title']=$this->profile["school_name"]." Calendar";
        $data['module']="calendar";
        $data['view_file']	= "calendar";
        $data['meta_desc']=$this->profile["school_name"]." Calendar";
        $data['meta_keywords']="latest news, examinations events, results, ".$this->profile["school_name"];
        echo Modules::run('template/layout2',$data);
    }
    function display($year=null,$month=null)
    {
        if($year==null) $year=date('Y');
        if($month==null) $month=date('m');
        $data['calendar']=$this->mdl_calendar->generate_cal($year,$month,$this->depend);
        $data['year']=$year;
        $data['month']=$month;
        
        $data['title']=$this->profile["school_name"]." Calendar";
        $data['module']="calendar";
        $data['view_file']	= "calendar";
        $data['meta_desc']=$this->profile["school_name"]." Calendar";
        $data['meta_keywords']="latest news, examinations events, results, ".$this->profile["school_name"];
        echo Modules::run('template/layout2',$data);
    }
    function get_events()
    {
        if (strlen($_GET['day'])==1)
            $day="0".$_GET['day'];
        else
            $day=$_GET['day'];
        
        if (strlen($_GET['month'])==1)
            $month="0".$_GET['month'];
        else
            $month=$_GET['month'];
        
        $this->depend['start_date']=$day."/".$month."/".$_GET['year'];
//         echo "<pre>";print_r($this->depend);die();
        $res=$this->db->where($this->depend)->get('events_master')->result();
        foreach($res as $rs)
        {
            echo "<h3 class='title'>".strtoupper($rs->title)." <small>".$rs->start_date."</small></h3>";
            echo "<p>".strip_tags($rs->details)."</p>";
            
            if($rs->timetable)
            {
                echo "<i>Timing: <b>".$rs->hh."h:".$rs->mm."m onwards</b></i>";
            }
            echo "<br>";
        }
    }
}
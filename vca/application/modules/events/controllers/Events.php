<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Events extends MX_Controller{
	
	function index()
	{
// 		redirect("events/view");
	    $prefs['template'] = '
	    
        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}
	    
        {heading_row_start}<tr>{/heading_row_start}
	    
        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
	    
        {heading_row_end}</tr>{/heading_row_end}
	    
        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
	    
        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
	    
        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
	    
        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
	    
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
	    
        {cal_cell_other}{day}{/cal_cel_other}
	    
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}
	    
        {table_close}</table>{/table_close}
';
	    
	    $this->load->library('calendar', $prefs);
	    
	    echo $this->calendar->generate();
	    
	}
	function view()
	{
		echo Modules::run('pagination/events');
	}
	function list_events()
	{
	    $this->db->order_by('auto_id','desc');
        $return = $this->db->select("events_title,posted_date,auto_id,events_thumb,type")
                  ->where($this->depend)->get('web_events');
        
	    header("Access-Control-Allow-Origin: *");
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function full_events()
	{
	    if (@$_GET['id'] && $_GET['id'])
	    {
	        $id=$_GET['id'];
    	    $return = $this->db->select("events_title,events,posted_date,auto_id,events_image_file,type")
    	    ->where($this->depend)->where('auto_id',$id)->get('web_events');
    	
    	    header("Access-Control-Allow-Origin: *");
    	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }  
	}
	
	function read($id)
	{
	    $this->load->helper('text');
		$this->db->where('auto_id',$id);
		$query=$this->db->get('web_events');
		foreach ($query ->result() as $row){
		    //$link=site_url("events_videos/view_story/$row->auto_id");
		    $data['content']=$row->events;
		    $data['ctitle']=$row->events_title;
		    $data['time']=$row->timestamp;
		    $data['type']=$row->type;
		    if ($data['type']=="I")
		        $data['file']=$this->bios_path."assets/website_uploads/events/images/$row->events_image_file";
		    elseif ($data['type']=="F")
		        $data['file']=$this->bios_path."assets/website_uploads/events/docfile/$row->events_image_file";
		    
		    $data['school_id']=$row->school_id;
		    $data['auto_id']=$row->auto_id;
		    
		}
	
		$data['title']=$data['ctitle']." | ".$this->profile["school_name"];
		$data['module']="events";
		$data['view_file']	= "full_view";
		$data['meta_desc']=word_limiter(strip_tags($data['content']),60);
		$data['meta_keywords']="latest news, examinations events, results, ".$this->profile["school_name"];
		echo Modules::run('template/layout2',$data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_calendar extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "events_master"; //view
        
        $this->conf=array(
            "start_day"=>"sunday",
            'show_next_prev'  => TRUE,
            'next_prev_url'   => site_url("calendar/display")
        );
        $this->conf['template'] = '
           {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">{/table_open}

        {heading_row_start}<tr class="active">{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td class="active">{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<span class="event_day"><a href="javascript:void(0)" title="Click to view Event" onclick="getEvent({day})">{day} <div class="hidden-xs">{content}</div></a></span>{/cal_cell_content}
        {cal_cell_content_today}<span class="highlight"><a href="javascript:void(0)" title="Click to view today\'s Event" onclick="getEvent({day})">{day}<br><div class="hidden-xs">{content}</div></a></span>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}{day}{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        ';
    }
    function view_data($year,$month,$where)
    {
        $this->load->helper('text');
        $this->db->where($where);
        $query=$this->db->select('start_date,title')->from('events_master')->like('start_date',"$month/$year",'before')->get();
        $cal_data=array();
        
        foreach ($query->result() as $row)
        {
            $day=substr($row->start_date, 0,2);
            if (strpos($day, '/'))//if user has inputed one day character it should not fetch the slash(/)
                $day=substr($day, 0,1);
            elseif(substr($day, 0,1)=='0')//library dnt need zero prefix
                $day=substr($day, 1,2);
            
            if(array_key_exists($day, $cal_data))//if multiple events on same day
                $cal_data[$day]=ucfirst(character_limiter($row->title,20,"&#8230;")). "<div><span style='color:#8995a9'>More Events</span></div>";
            else
                $cal_data[$day]=ucfirst(character_limiter($row->title,20,"&#8230;"));
        }
        return $cal_data;
    }
    function generate_cal($year,$month,$where)
    {
        $this->load->library('calendar',$this->conf);
        $cal_data=$this->view_data($year,$month,$where);
        
        return $this->calendar->generate($year,$month,$cal_data);
    }
       
}
?>
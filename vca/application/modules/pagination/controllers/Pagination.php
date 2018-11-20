<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagination extends MX_Controller{
	
	public function news()  	//pagination
	{
		$this->load->library('pagination');
		$this->load->helper('text');//to wrap text
		
		$config['base_url'] = site_url('news/view');
		$this->db->where($this->depend);
		$config['total_rows'] = $this->db->get('web_news')->num_rows();
		$config['per_page'] = 6;
		$config['num_links']= 4;

	    $config['full_tag_open'] = '<ul class="pagination center">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		//
	
		$this->pagination->initialize($config);
		$this->db->where($this->depend);
		$this->db->order_by("auto_id", "desc");
		$data['query'] =$this->db->get('web_news',$config['per_page'],$this->uri->segment(3));
// 		$this->load->view('test',$data);
// 		die();
		$data['title']="Latest News | ".$this->profile["school_name"];
		$data['meta_desc']="Latest news and bulletins of ".$this->profile["school_name"] ." Online Results, Exams dates routines etc.";
		$data['meta_keywords']="latest news, examinations news, online result news ".$this->profile["school_name"];
		$data['module']='news';
		$data['view_file']='news';
		echo Modules::run('template/layout2',$data);
	}
	public function events()  	//pagination
	{
	    $this->load->library('pagination');
	    $this->load->helper('text');//to wrap text
	
	    $config['base_url'] = site_url('events/view');
	    $this->db->where($this->depend);
	    $config['total_rows'] = $this->db->get('events_master')->num_rows();
	    $config['per_page'] = 6;
	    $config['num_links']= 4;
	
	    $config['full_tag_open'] = '<ul class="pagination center">';
	    $config['full_tag_close'] = '</ul>';
	    $config['prev_link'] = '&laquo;';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    //
	
	    $this->pagination->initialize($config);
	    $this->db->where($this->depend);
	    $this->db->order_by("auto_id", "desc");
	    $data['query'] =$this->db->get('events_master',$config['per_page'],$this->uri->segment(3));
	    //$this->load->view('test',$data);
	    //die();
	    $data['title']="Latest News | ".$this->profile["school_name"];
	    $data['meta_desc']="Latest events and calendar of ".$this->profile["school_name"] ." Online calendar, Exams dates events etc.";
	    $data['meta_keywords']="latest events, calendar news, online calendar news ".$this->profile["school_name"];
	    $data['module']='events';
	    $data['view_file']='events';
	    echo Modules::run('template/layout2',$data);
	}
	public function gallery()  	//pagination
	{
	    $this->load->library('pagination');
	
	    $config['base_url'] = site_url('gallery/view');
	    $config['total_rows'] = $this->db->get('gallery')->num_rows();
	    $config['per_page'] = 9;
	    $config['num_links']= 5;
	    //
	    $config['full_tag_open'] = '<ul class="pagination center">';
	    $config['full_tag_close'] = '</ul>';
	    $config['prev_link'] = '&laquo;';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    //
	
	    $this->pagination->initialize($config);
	
	    $this->db->order_by("auto_id", "desc");
	    $data['query'] =$this->db->get('gallery',$config['per_page'],$this->uri->segment(3));
	    //$this->load->view('test',$data);
	    //die();
	    $data['title']="Photo Gallery | GreenHills Photo Gallery";
	    $data['module']='gallery';
	    $data['view_file']='gallery';
	    echo Modules::run('template/layout2',$data);
	
	}
}
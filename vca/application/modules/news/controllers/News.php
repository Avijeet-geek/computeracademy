<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MX_Controller{
	
	function index()
	{
		redirect("news/view");
	}
	function view()
	{
		echo Modules::run('pagination/news');
	}
	function list_news()
	{
	    $this->db->order_by('auto_id','desc');
        $return = $this->db->select("news_title,posted_date,auto_id,news_thumb,type")
                  ->where($this->depend)->get('web_news');
        
	    header("Access-Control-Allow-Origin: *");
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function full_news()
	{
	    if (@$_GET['id'] && $_GET['id'])
	    {
	        $id=$_GET['id'];
    	    $return = $this->db->select("news_title,news,posted_date,auto_id,news_image_file,type")
    	    ->where($this->depend)->where('auto_id',$id)->get('web_news');
    	
    	    header("Access-Control-Allow-Origin: *");
    	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	    }  
	}
	
	function read($id=null)
	{
	    $this->load->helper('text');
		$this->db->where('auto_id',$id);
		$query=$this->db->get('web_news');
		foreach ($query ->result() as $rrow){
// 			print_r($row);die();		    //$link=site_url("news_videos/view_story/$row->auto_id");
		    $data['content']=$rrow->news;
		    $data['ctitle']=$rrow->news_title;
		    $data['posted_date']=$rrow->posted_date;
		    $data['time']=$rrow->timestamp;
		    $data['type']=$rrow->type;
		    if ($data['type']=="I")
		        $data['file']=$this->bios_path."assets/website_uploads/news/images/$rrow->news_image_file";
		    elseif ($data['type']=="F")
		        $data['file']=$this->bios_path."assets/website_uploads/news/docfile/$rrow->news_image_file";
		    
		    $data['school_id']=$rrow->school_id;
		    $data['auto_id']=$rrow->auto_id;
		}
	
		$data['title']=$data['ctitle']." | ".$this->profile["school_name"];
		$data['module']="news";
		$data['view_file']	= "full_view";
		$data['meta_desc']=word_limiter(strip_tags($data['content']),60);
		$data['meta_keywords']="latest news, examinations news, results, ".$this->profile["school_name"];
// 		echo "<pre>";print_r($data);die();
		echo Modules::run('template/layout2',$data);
	}
	
}
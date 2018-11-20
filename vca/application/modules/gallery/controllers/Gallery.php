<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MX_Controller {

	function index()
	{
// 		redirect('gallery/view');
	    $this->db->where("album_id","0");
	    $data['gallery_qry']=$this->db->get("gallery");
	    
	    $this->db->order_by("album_id","desc");
	    $data['album_qry']=$this->db->get("album");
	    
	    if (isset($_GET["id"])){
	        $this->db->where("album_id",$_GET['id']);
	        $data['album_picture']=$this->db->get("gallery");
	        $this->db->where("album_id",$_GET['id']);
	        foreach ($this->db->get("album",1)->result() as $alb)
	        {
	            $data['album_name']=$alb->title;
	        }
	    }
	    $data['title']="Gallery | Teesta Thumpers in Siliguri";
	    $data['module']='gallery';
	    $data['view_file']='gallery';
	    echo Modules::run('template/layout3',$data);
	}
// 	function view()
// 	{
// 		echo Modules::run('pagination/gallery');
// 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
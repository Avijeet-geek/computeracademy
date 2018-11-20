<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_mdl extends CI_Model{
	public function add($data){
	    $a=$this->db->insert('blog',$data);
	    return $this->db->affected_rows($a);
	}

}

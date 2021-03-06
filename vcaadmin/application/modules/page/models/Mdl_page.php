<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_page extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "pages"; //view
        
        $this->db->query("CREATE TABLE IF NOT EXISTS `pages` (
  `com_id` varchar(30) NOT NULL,
  `page_id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `menu_type` int(11) NOT NULL,
  `menu_services` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `url_type` tinyint(1) NOT NULL,
  `content` longtext NOT NULL,
  `description` varchar(200) NOT NULL,
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `keywords` text NOT NULL,
  `status` int(11) NOT NULL default '1',
  `modified` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");           
    }
    
    
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('page_id',"desc");
        return $this->db->get( $this->table);
    }
    function add_data($data)
    {
        $a=$this->db->insert($this->table,$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        $this->db->where($where);
        $a=$this->db->update($this->table,$data);
        return $this->db->affected_rows($a);
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete($this->table);
        return $this->db->affected_rows($a);
    }
    
}
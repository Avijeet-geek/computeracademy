<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_plans extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "plans"; //view
        
        $this->db->query("
CREATE TABLE IF NOT EXISTS `plans` (
  `p_id` int(11) NOT NULL auto_increment,
  `s_id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(50) NOT NULL,
  `status` int(11) NOT NULL default '1',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;");
        
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('p_id',"desc");
        $this->db->join('services','plans.c_id=services.id');
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
?>
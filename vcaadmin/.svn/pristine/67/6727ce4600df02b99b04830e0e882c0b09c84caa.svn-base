<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_cat extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
       
        
        $this->table =  "CREATE TABLE IF NOT EXISTS `album` (
            `com_id` varchar(30) NOT NULL,
            `album_id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(300) NOT NULL,
            `description` text NOT NULL,
            `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`album_id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;";
        
        $this->table = "category"; //view
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('category_id',"desc");
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
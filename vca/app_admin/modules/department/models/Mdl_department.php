<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_department extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "department"; //view
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('department_id',"desc");
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
        $image=$this->db->get($this->table);
        foreach ($image->result() as $row)
        {
            $path="./assets/website/uploads/tour/$row->image";
            $path2="./assets/website/uploads/tour/thumb/$row->image";
        }
        $this->db->where($where);
         
       $a= $this->db->delete($this->table);
        unlink($path);
        unlink($path2);
        return $this->db->affected_rows($a);
    }
    
}
?>
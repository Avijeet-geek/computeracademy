<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_otp extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "otp_records"; //view
    }
    function add_data($data)
    {
        return $this->db->insert($this->table,$data);
    }
    function update_data($data,$values)
    {
        $this->db->where($data);
        return $this->db->update($this->table,$values);
    }
    function view_data($data)
    {
        $this->db->where($data);
        $this->db->order_by('auto_id',"desc");
        return $this->db->get($this->table); 
    }
    function delete_data($data)
    {
        $this->db->where($data);
        return $this->db->delete($this->table);
    }	
}
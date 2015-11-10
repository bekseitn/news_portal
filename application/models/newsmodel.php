<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Newsmodel extends CI_Model 
{
    var $table = "news";
    function __construct()
    {
        parent::__construct();
    }

    function getAll($limit = null)
    {
        if($limit != null)
        {
            $this->db->limit($limit['limit'],$limit['offset']);
        }
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
 
    function countAll()
    {
        return $this->db->count_all($this->table);
    }
    

    function add($data)
    {
        $this->db->insert($this->table,$data);
    }

    function update($data,$id)
    {
        $this->db->where("id",$id);
        $this->db->update($this->table,$data);
    }

    function delete($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function getById($id)
    {
        $this->db->where("id",$id);
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
    }

    function update_counter($id) { 
        $this->db->where('id', $id); 
        $this->db->select('count'); 
        $count = $this->db->get('news')->row(); 
        $this->db->where('id', $id);
        $this->db->set('count', ($count->count + 1)); 
        $this->db->update('news'); 
    }     
}
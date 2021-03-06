<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandM extends CI_Model {
    
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function InsertBrand($array) 
	{
        $this->db->insert('Brand', $array);
        return true;
    }
    
    public function GetAllBrand()
    {
        $this->db->select('*');
		$this->db->from('Brand');
        $result= $this->db->get();
        // echo ("<pre>");
        // print_r($result);
        // die();
        return $result->result_array();
    }

    
	public function get_single_brand($id)
	{
        $this->db->select('*')->from('Brand')->where('id',$id);
        $result=$this->db->get()->row();
        return $result;

        // echo ("<pre>");
        // print_r($result);
        // die();
    }
    
    public function update($id, $name)
	{
        $result=$this->db->set('name', $name)->where('id', $id)->update('Brand');
        return $result;
	}
    
    public function delete($id)
	{
        $result=$this->db->where('id', $id)->delete('Brand');
        return $result;
	}

}
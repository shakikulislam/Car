<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BodyM extends CI_Model {
    
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function InsertBody($array) 
	{
        $this->db->insert('Body', $array);
        return true;
    }
    
    public function GetAllBody()
    {
        $this->db->select('*');
		$this->db->from('Body');
        $result= $this->db->get();
        // echo ("<pre>");
        // print_r($result);
        // die();
        return $result->result_array();
    }

    
	public function get_single_Body($id)
	{
        $this->db->select('*')->from('Body')->where('id',$id);
        $result=$this->db->get()->row();
        return $result;

        // echo ("<pre>");
        // print_r($result);
        // die();
    }
    
    public function update($id, $name)
	{
        $result=$this->db->set('name', $name)->where('id', $id)->update('Body');
        return $result;
	}
    
    public function delete($id)
	{
        $result=$this->db->where('id', $id)->delete('Body');
        return $result;
	}

}
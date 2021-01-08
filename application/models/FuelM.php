<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FuelM extends CI_Model {
    
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function InsertFuel($array) 
	{
        $this->db->insert('Fuel', $array);
        return true;
    }
    
    public function GetAllFuel()
    {
        $this->db->select('*');
		$this->db->from('Fuel');
        $result= $this->db->get();
        // echo ("<pre>");
        // print_r($result);
        // die();
        return $result->result_array();
    }

    
	public function get_single_fuel($id)
	{
        $this->db->select('*')->from('Fuel')->where('id',$id);
        $result=$this->db->get()->row();
        return $result;

        // echo ("<pre>");
        // print_r($result);
        // die();
    }
    
    public function update($id, $name)
	{
        $result=$this->db->set('name', $name)->where('id', $id)->update('Fuel');
        return $result;
	}
    
    public function delete($id)
	{
        $result=$this->db->where('id', $id)->delete('Fuel');
        return $result;
	}

}
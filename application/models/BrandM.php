<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandM extends CI_Model {

    protected $tableName = 'Brand';
    
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

    
	public function get_brandById($id)
	{
        $this->db->select('*')->from('Brand')->where('id'==$id);
        $result=$this->db->get();
        return $result->result();

        echo ("<pre>");
        print_r($result);
        die();
	}

    public function Update($brandId)
    {
        // $this->db->Update()
    }

}
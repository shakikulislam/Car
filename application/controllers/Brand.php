<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {


	function __construct () {
		parent::__construct();
		$this->load->model("BrandM");
	}

	public function index()
	{	

        // $data=array();
        // $data['mainContent']=$this->load->view('admin/brand/list','',true);
		// $this->load->view('index',$data);

		$listOfBrand=$this->BrandM->GetAllBrand();
		// echo json_encode($listOfBrand);
		// $data['sub_view']='admin/brand/list';
		// $this->load->view('index', $data);
		// $data['mainContent']=$this->load->view('admin/brand/list','listOfBrand',true);
		// $this->load->view('index', $data);

		$this->data["listOfBrand"] = $listOfBrand;
		$this->data["subview"] = "admin/brand/list";
		$this->load->view('index', $this->data);

	}

	public function InsertBrand() 
	{
		$array = array();
		$array["name"] = $this->input->post("brand");

		$result= $this->BrandM->InsertBrand($array);
		echo json_encode($result);
		redirect(base_url('brand'));
	}

	public function Update() 
	{
		$brandId = $this->input->post("BrandId");

		$result= $this->BrandM->Update($brandId);
		echo json_encode($result);
	}

	// public function get_brandById()
	// {
	// 	$id=$this->input->post("brandId");;
	// 	$result=$this->BrandM->get_brandById($id);
	// 	echo json_encode($result);
	// }
}

?>
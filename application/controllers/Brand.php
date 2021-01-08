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

	public function get_single_brand()
	{
		$brandId=$this->input->post('brandId');
		$brandName=$this->BrandM->get_single_brand($brandId);
		echo json_encode($brandName);
	}

	public function update()
	{
		$brandId=$this->input->post('brandId');
		$brandName=$this->input->post('brandName');
		$this->BrandM->update($brandId, $brandName);
	}

	public function delete()
	{
		$brandId=$this->input->post('brandId');
		$this->BrandM->delete($brandId);
	}

	public function InsertBrand() 
	{
		$array = array();
		$array["name"] = $this->input->post("brand");

		$result= $this->BrandM->InsertBrand($array);

		echo json_encode($result);
		redirect(base_url('brand'));
	}
}

?>
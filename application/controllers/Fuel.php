<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel extends CI_Controller {


	function __construct () {
		parent::__construct();
		$this->load->model("FuelM");
	}

	public function index()
	{	
        $listOfFuel=$this->FuelM->GetAllFuel();
        
		$this->data["listOfFuel"] = $listOfFuel;
		$this->data["subview"] = "admin/fuel/list";
		$this->load->view('index', $this->data);

	}

	public function get_single_fuel()
	{
		$fuelId=$this->input->post('fuelId');
		$fuelName=$this->FuelM->get_single_fuel($fuelId);
		echo json_encode($fuelName);
	}

	public function update()
	{
		$fuelId=$this->input->post('fuelId');
		$fuelName=$this->input->post('fuelName');
		$this->FuelM->update($fuelId, $fuelName);
	}

	public function delete()
	{
		$fuelId=$this->input->post('fuelId');
		$this->FuelM->delete($fuelId);
	}

	public function InsertFuel() 
	{
		$array = array();
		$array["name"] = $this->input->post("fuel");

		$result= $this->FuelM->InsertFuel($array);

		echo json_encode($result);
		redirect(base_url('fuel'));
	}
}

?>
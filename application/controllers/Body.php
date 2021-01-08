<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Body extends CI_Controller {


	function __construct () {
		parent::__construct();
		$this->load->model("BodyM");
	}

	public function index()
	{	

        // $data=array();
        // $data['mainContent']=$this->load->view('admin/body/list','',true);
		// $this->load->view('index',$data);

		$listOfBody=$this->BodyM->GetAllBody();
		// echo json_encode($listOfbody);
		// $data['sub_view']='admin/body/list';
		// $this->load->view('index', $data);
		// $data['mainContent']=$this->load->view('admin/body/list','listOfbody',true);
		// $this->load->view('index', $data);

		$this->data["listOfBody"] = $listOfBody;
		$this->data["subview"] = "admin/body/list";
		$this->load->view('index', $this->data);

	}

	public function get_single_body()
	{
		$bodyId=$this->input->post('bodyId');
		$bodyName=$this->BodyM->get_single_body($bodyId);
		echo json_encode($bodyName);
	}

	public function update()
	{
		$bodyId=$this->input->post('bodyId');
		$bodyName=$this->input->post('bodyName');
		$this->BodyM->update($bodyId, $bodyName);
	}

	public function delete()
	{
		$bodyId=$this->input->post('bodyId');
		$this->BodyM->delete($bodyId);
	}

	public function InsertBody() 
	{
		$array = array();
		$array["name"] = $this->input->post("body");

		$result= $this->BodyM->Insertbody($array);

		echo json_encode($result);
		redirect(base_url('body'));
	}
}

?>
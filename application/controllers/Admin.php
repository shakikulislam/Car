<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        // $data=array();
        // $data['mainContent']=$this->load->view('admin/index','',true);
		// $this->load->view('index',$data);

		$this->data["subview"] = "admin/index";
		$this->load->view('index', $this->data);
	}
}

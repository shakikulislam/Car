<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	public function index()
	{
        $data=array();
        $data['mainContent']=$this->load->view('admin/brand/list','',true);
		$this->load->view('index',$data);
	}
}

?>
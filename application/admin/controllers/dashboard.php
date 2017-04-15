<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends My_Controller
{
	public function index()
	{
	    redirect(site_url("modal/index"));
	    /*
		$this->layout->title("Site index page");
		$data=array("layout"=>$this->layout);
		$this->layout->view("dashboard/index",$data);*/
	}
}
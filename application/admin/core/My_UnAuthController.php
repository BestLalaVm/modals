<?php
defined("BASEPATH") or exit("No direct script access allowed");
class My_UnAuthController extends CI_Controller
{
	public $layout_view="layout/default.php";
	function __construct()
	{
		parent::__construct();
		$this->loadLayout();
		$this->load->helper("url");
		$this->load->database();

		$this->loadResources();
	}

	protected function is_post(){
		return $this->input->server('REQUEST_METHOD') == 'POST';
	}

	protected function wrapviewdata($data)
	{
		if(!isset($data["pageNavTitle"]))
		{
			$data["pageNavTitle"]="管理员界面";
		}
		if(!isset($data["pageNavdescription"]))
		{
			$data["pageNavdescription"]="管理员界面";
		}
		if(!isset($data["pageName"]))
		{
			$data["pageName"]="管理员界面员界面";
		}

		return $data;
	}

	protected function loadLayout()
	{
		$this->load->library("layout");
	}

	protected function loadResources()
	{		
		
	}
}
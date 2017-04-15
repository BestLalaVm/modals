<?php
class user extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("user_model","user");
	}


	public function index(){
		$this->layout->title("用户列表");
		$pageIndex=1;
		$pageSize=20;
		if(isset($_REQUEST["pageIndex"]))
        {
            $pageIndex= $_REQUEST["pageIndex"]+0;
        }
        if(isset($_REQUEST["pageSize"]))
        {
            $pageSize=$_REQUEST["pageSize"]+0;
        }

		$data=$this->user->getAll($_GET,$pageIndex,$pageSize);

        $data["filterKeyword"]="";
        if(array_key_exists("keyword",$_GET))
        {
            $data["filterKeyword"]=$_GET["keyword"];
        }

		$this->layout->view("user/index",$data);
	}
}
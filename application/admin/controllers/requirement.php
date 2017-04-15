<?php
class requirement extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("requirement_model","requirement");
	}


	public function index(){
		$this->layout->title("用户需求列表");
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

		$data=$this->requirement->getAll($_GET,$pageIndex,$pageSize);

        $data["filterKeyword"]="";
        if(array_key_exists("keyword",$_GET))
        {
            $data["filterKeyword"]=$_GET["keyword"];
        }

		$this->layout->view("requirement/index",$data);
	}

    public function detail($id)
    {
        $data = $this->requirement->get($id);
        if(is_null($data)){
            redirect(site_url("requirement/index"));
            return;
        }

        $this->load->library("form_validation");
        $this->form_validation->set_rules("modal_id","模型","required");
        if($this->is_post() && $this->form_validation->run()==TRUE)
        {
            $this->requirement->assignModal($id,$_POST["modal_id"]);

            redirect(site_url("requirement/index"));
            return;
        }

        $this->layout->view("requirement/detail",array("id"=>$data->id,"description"=>$data->description,"modal_id"=>$data->modal_id,"name"=>$data->name));
    }

}
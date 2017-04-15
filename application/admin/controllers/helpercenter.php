<?php
class helpercenter extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("help_model","help");
	}
	
	public function index($id){
		$this->layout->title("管理员列表");

        $data = $_POST;
        if($this->is_post())
        {
            $data["id"]=$id;
            $this->help->save($id,$data);
        }else{
            $result = $this->help->get($id);
            if(is_null($result) )
            {
                $data=array("id"=>$id,"title"=>"","content"=>"");
            }else{
                $data=array("id"=>$id,"title"=>$result->title,"content"=>$result->content);
            }
        }

		$this->layout->view("helpercenter/index",$data);
	}
}
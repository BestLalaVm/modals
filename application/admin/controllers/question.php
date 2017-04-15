<?php
class question extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("question_model","question");
	}


	public function index(){
		$this->layout->title("在线问答列表");
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

		$data=$this->question->getAll($_GET,$pageIndex,$pageSize);

        $data["filterKeyword"]="";
        if(array_key_exists("keyword",$_GET))
        {
            $data["filterKeyword"]=$_GET["keyword"];
        }
        $data["filterStartDate"]="";
        if(array_key_exists("startDate",$_GET))
        {
            $data["filterStartDate"]=$_GET["startDate"];
        }
        $data["filterEndDate"]="";
        if(array_key_exists("endDate",$_GET))
        {
            $data["filterEndDate"]=$_GET["endDate"];
        }

		$this->layout->view("question/index",$data);
	}

    public function edit($id)
    {
        $data = $this->input->post();
        $data = $this->initialize($data);

        if($this->is_post())
        {
            if($this->form_validation->run()==TRUE)
            {
                $this->question->save($id,$data["answer"]);
                redirect(site_url("question/index"));
                return;
            }
        }
        else
        {
            $result=$this->question->get($id);
            if($result==null || !isset($result))
            {
                redirect(site_url("question/index"));
                return;
            }

            $data=array("id"=>$result->id,"question"=>$result->question,"answer"=>$result->answer,"created"=>$result->createdTime,"email"=>$result->email);
        }

        $this->layout->view("question/edit",$data);
    }

    private function initialize($data){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("answer","名称","required");

        if(!isset($data["answer"]))
        {
            $data["answer"]="";
        }
        if(!isset($data["question"]))
        {
            $data["question"]="";
        }

        return $data;
    }
}
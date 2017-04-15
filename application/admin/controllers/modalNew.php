<?php
class modalNew extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("modalNew_model","modalNew");
	}
	
	public function index(){
		$this->layout->title("模式新闻列表");

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

        $data=$this->modalNew->getAll($this->getFilterDatas(),$pageIndex,$pageSize);

        $this->layout->view("modalNew/index",$data);
	}
	
	public function create()
	{		
		$this->layout->title("新增模式新闻");
		$data=$this->input->post();
		$data =$this->initialize($data);
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				$data["operatorUserName"]="xxx";
				$data["operatorName"]="xxx";
				try {
					$this->modalNew->save($data);
						
					redirect(site_url("modalNew/index"));
					return;
				}
				catch (Exception $e)
				{
					$data["uniqueError"]=$e->getMessage();
				}
			}
		}
		
		$data["tag_list"]=$this->loadModalTagsData();
		$this->layout->view("modalNew/create",$data);
	}
	
	public function edit($id)
	{
		$data = $this->input->post();
		$data = $this->initialize($data);
		$data["id"]=$id;
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				$this->modalNew->save($data);
				redirect(site_url("modalNew/index"));
				return;
			}		
		}
		else
		{
			$result=$this->modalNew->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("modalNew/index"));
				return;
			}
			
			$data=$result;
		}
        
		$data["tag_list"]=$this->loadModalTagsData();
		$this->layout->view("modalNew/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modalNew->delete($id);
		
		redirect(site_url("modalNew/index"));
		return;
	}
	
	private function initialize($data){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","标题","required");
		$this->form_validation->set_rules("keyword","关键字","required");
        $this->form_validation->set_rules("introducation","简介","required");
		
		if(!isset($data["name"]))
		{
			$data["name"]="";
		}
		if(!isset($data["introducation"]))
		{
			$data["introducation"]="";
		}
        if(!isset($data["keyword"]))
        {
            $data["keyword"]="";
        }
		if(!isset($data["isPublished"]))
		{
			$data["isPublished"]=false;
		}
		
		if(!isset($data["content"]))
		{
			$data["content"]="";
		}
		if(!isset($data["publishedDateFrom"]))
		{
			$data["publishedDateFrom"]="";
		}		
		if(!isset($data["publishedDateTo"]))
		{
			$data["publishedDateTo"]="";
		}
		if(!isset($data["tags"]))
		{
			$data["tags"]=array();
		}
		
		return $data;
    }
    
    private function loadModalTagsData()
    {
    	$this->load->model("modalTag_model","modalTag");
    	$modalTags = $this->modalTag->getOptions();
    
    	$data=array();
    	foreach($modalTags as $item )
    	{
    		$data[$item->id]=$item->name;
    	}
    
    	return $data;
    }

    private function getFilterDatas()
    {
        $data = array("name"=>"","keyword"=>"","startDate"=>"","endDate"=>"");
        if(isset($_REQUEST["name"]))
        {
            $data["name"]=$_REQUEST["name"];
        }
        if(isset($_REQUEST["keyword"]))
        {
            $data["keyword"]=$_REQUEST["keyword"];
        }
        if(isset($_REQUEST["startDate"]))
        {
            $data["startDate"]=$_REQUEST["startDate"];
        }
        if(isset($_REQUEST["endDate"]))
        {
            $data["endDate"]=$_REQUEST["endDate"];
        }

        return $data;
    }
}
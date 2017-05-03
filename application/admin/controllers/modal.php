<?php
class modal extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("modal_model","modal");
	}
	
	public function index(){
		$this->layout->title("3D模式列表");
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

		$data=$this->modal->getAll($this->getFilterDatas(),0,$pageIndex,$pageSize);
		
		$this->layout->view("modal/index",$data);
	}
	
	public function create()
	{		
		$this->layout->title("新增3D模式");
		$data=$this->input->post();
		$data =$this->initialize($data);
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				$data["operatorUserName"]="xxx";
				$data["operatorName"]="xxx";
				try {
					$data = $this->processUploadedAttachment($data);
					
					$this->modal->save($data);
						
					redirect(site_url("modal/index"));
					return;
				}
				catch (Exception $e)
				{
					$data["uniqueError"]=$e->getMessage();
				}
			}
		}
		
		$data["tag_list"]=$this->loadModalTagsData();
		$data["meterial_list"]= $this->loadmodalMeterialsData();
		$data["category_list"]= $this->loadmodalCategoriesData();
		$this->layout->view("modal/create",$data);
	}
	
	public function edit($id)
	{
		$data = $this->input->post();
		$data = $this->initialize($data);
		$data["id"]=$id;
		if($this->is_post())
		{
		    try{
                if($this->form_validation->run()==TRUE)
                {
                    $data = $this->processUploadedAttachment($data);
                    $this->modal->save($data);
                    redirect(site_url("modal/index"));
                    return;
                }
            }catch (Exception $e){
                $data["error"]=$e->getMessage();
            }
		}
		else
		{
			$result=$this->modal->get($id);
			if($result==null || !array_key_exists("id",$result))
			{
				redirect(site_url("modal/index"));
				return;
			}
			
			$data=$result;
		}
        
		$data["tag_list"]=$this->loadModalTagsData();
		$data["meterial_list"]= $this->loadmodalMeterialsData();
		$data["category_list"]= $this->loadmodalCategoriesData();
		$this->layout->view("modal/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modal->delete($id);
		
		redirect(site_url("modal/index"));
		return;
	}
	
	private function initialize($data){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","名称","required");
		$this->form_validation->set_rules("keyword","关键字","required");
		$this->form_validation->set_rules("category_id","类别","required");
		$this->form_validation->set_rules("attachment","附件","required");
        $this->form_validation->set_rules("introducation","简介","required");

		if(!isset($data["name"]))
		{
			$data["name"]="";
		}
		if(!isset($data["keyword"]))
		{
			$data["keyword"]="";
		}
		if(!isset($data["isPublished"]))
		{
			$data["isPublished"]=false;
		}
		
		if(!isset($data["description"]))
		{
			$data["description"]="";
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
		if(!isset($data["meterials"]))
		{
			$data["meterials"]=array();
		}
		if(!isset($data["image"]))
		{
			$data["image"]="";
		}
		if(!isset($data["thumbImage"]))
		{
			$data["thumbImage"]="";
		}
		if(!isset($data["smallImage"]))
		{
			$data["smallImage"]="";
		}
		if(!isset($data["attachment"]))
		{
			$data["attachment"]="";
		}
		if(!isset($data["attachmentSize"]))
		{
			$data["attachmentSize"]="";
		}
		if(!isset($data["isDownloadable"]))
		{
			$data["isDownloadable"]="";
		}
		if(!isset($data["category_id"]))
		{
			$data["category_id"]="";
		}
		if(!isset($data["shownImages"]))
		{
			$data["shownImages"]=array();
		}
		if(!isset($data["shownType"]))
		{
			$data["shownType"]="html";
		}
		if(!isset($data["shownVedio"]))
		{
			$data["shownVedio"]="";
		}
        if(!isset($data["introducation"]))
        {
            $data["introducation"]="";
        }
        if(!isset($data["shownDescription"]))
        {
            $data["shownDescription"]="";
        }
        if(!isset($data["author"]))
        {
            $data["author"]="";
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
    
    private function loadmodalMeterialsData()
    {
    	$this->load->model("modalMeterial_model","modalMeterial");
    	$modalMeterials = $this->modalMeterial->getOptions();
    
    	$data=array();
    	foreach($modalMeterials as $item )
    	{
    		$data[$item->id]=$item->name;
    	}
    
    	return $data;
    }
    
    private function loadmodalCategoriesData()
    {
    	$this->load->model("modalCategory_model","modalCategory");
    	$modalCategories = $this->modalCategory->getOptions();
    
    	$data=array(""=>"请选择类别");
    	foreach($modalCategories as $item )
    	{
    		$data[$item->id]=$item->name;
    	}
    
    	return $data;
    }

	private function processUploadedAttachment($data)
	{
		$this->load->library("upload");
		$relativePath = "assets/uploads/attachments";
		
		$config=array("upload_path"=>$relativePath,"overwrite"=>FALSE,"allowed_types"=>"*");
		$this->upload->initialize($config);
		
		if($this->upload->do_upload("newattachment"))
		{
			$d = $this->upload->data();
			$data["attachment"]=("/".$relativePath."/".$d["client_name"]);
			$data["attachmentSize"]=$d["file_size"];
		}else{
		    if(isset($_FILES["newattachment"]["error"]) &&$_FILES["newattachment"]["error"]!=4 ) {
                $error = $this->upload->display_errors();
                if (strpos($error, "文件超出") >= 0) {
                    $error = strip_tags($error) . ", 当前设置允许上传的文件大小为:" . ini_get("upload_max_filesize");
                }
                throw new Exception($error);
            }
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

    public function cmindex(){
        $this->layout->title("用户模型列表");
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

        $data=$this->modal->getAll($this->getFilterDatas(),1,$pageIndex,$pageSize);

        $this->layout->view("modal/cm/index",$data);
    }

    public function cmedit($id)
    {
        $data = $this->input->post();
        $data["id"]=$id;
        if($this->is_post())
        {
            $this->modal->audit($id,$data["ispassed"]);
            redirect(site_url("modal/cmindex"));
        }
        else
        {
            $result=$this->modal->get($id);
            if($result==null || !isset($result))
            {
                redirect(site_url("modal/cmindex"));
                return;
            }

            $data=$result;
        }

        $data["tag_list"]=$this->loadModalTagsData();
        $data["meterial_list"]= $this->loadmodalMeterialsData();
        $data["category_list"]= $this->loadmodalCategoriesData();

        $this->layout->view("modal/cm/edit",$data);
    }

    public function getOptions(){
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

        $data=$this->modal->getOptions($pageIndex,$pageSize);

        $data["success"]=true;

        echo json_encode($data);
    }
}
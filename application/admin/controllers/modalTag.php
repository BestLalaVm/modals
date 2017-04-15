<?php
class modalTag extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("modalTag_model","modalTag");
	}
	
	public function index(){
		$this->layout->title("模式标签列表");
		$data["list"] = $this->modalTag->getAll();
		
		$this->layout->view("modalTag/index",$data);
	}
	
	public function create()
	{		
		$this->form_validation->set_rules("name","名称","required");
		$this->layout->title("新增模式标签");
		$data=$this->input->post();
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				try {
					$this->modalTag->save($data);
						
					redirect(site_url("modalTag/index"));
					return;
				}
				catch (Exception $e)
				{
					$data["uniqueError"]=$e->getMessage();
				}
			}
		}
		
		if(!isset($data["name"]))
		{
			$data["name"]="";
		}
		if(!isset($data["description"]))
		{
			$data["description"]="";
		}
		
		$this->layout->view("modalTag/create",$data);
	}
	
	public function edit($id)
	{
		$this->form_validation->set_rules("name","名称","required");
		$data = $this->input->post();
		$data["id"]=$id;
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				$this->modalTag->save($data);
				redirect(site_url("modalTag/index"));
				return;
			}		
		}
		else
		{
			$result=$this->modalTag->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("modalTag/index"));
				return;
			}
			
			$data=array("id"=>$result->id,"name"=>$result->name,"description"=>$result->description);
		}
        
		$this->layout->view("modalTag/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modalTag->delete($id);
		
		redirect(site_url("modalTag/index"));
		return;
	}
}
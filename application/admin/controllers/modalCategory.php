<?php
class modalCategory extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("modalCategory_model","modalCategory");
	}
	
	public function index(){
		$this->layout->title("3D模型类别列表");
		$data["list"] = $this->modalCategory->getAll();
		
		$this->layout->view("modalCategory/index",$data);
	}
	
	public function create()
	{		
		$this->form_validation->set_rules("name","名称","required");
		$this->layout->title("新增3D模型类别");
		$data=$this->input->post();
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				try {
					$this->modalCategory->save($data);
						
					redirect(site_url("modalCategory/index"));
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
		
		$this->layout->view("modalCategory/create",$data);
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
				$this->modalCategory->save($data);
				redirect(site_url("modalCategory/index"));
				return;
			}		
		}
		else
		{
			$result=$this->modalCategory->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("modalCategory/index"));
				return;
			}
			
			$data=array("id"=>$result->id,"name"=>$result->name,"description"=>$result->description);
		}
        
		$this->layout->view("modalCategory/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modalCategory->delete($id);
		
		redirect(site_url("modalCategory/index"));
		return;
	}
}
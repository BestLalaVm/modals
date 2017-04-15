<?php
class modalMeterialCategory extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("modalMeterialCategory_model","modalMeterialCategory");
	}
	
	public function index(){
		$this->layout->title("模式材料类别列表");
		$data["list"] = $this->modalMeterialCategory->getAll();
		
		$this->layout->view("modalMeterialCategory/index",$data);
	}
	
	public function create()
	{		
		$this->form_validation->set_rules("name","名称","required");
		$this->layout->title("新增模式材料类别");
		$data=$this->input->post();
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				try {
					$this->modalMeterialCategory->save($data);
						
					redirect(site_url("modalMeterialCategory/index"));
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
		
		$this->layout->view("modalMeterialCategory/create",$data);
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
				$this->modalMeterialCategory->save($data);
				redirect(site_url("modalMeterialCategory/index"));
				return;
			}		
		}
		else
		{
			$result=$this->modalMeterialCategory->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("modalMeterialCategory/index"));
				return;
			}
			
			$data=array("id"=>$result->id,"name"=>$result->name,"description"=>$result->description);
		}
        
		$this->layout->view("modalMeterialCategory/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modalMeterialCategory->delete($id);
		
		redirect(site_url("modalMeterialCategory/index"));
		return;
	}
}
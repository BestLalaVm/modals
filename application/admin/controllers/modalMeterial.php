<?php
class modalMeterial extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("modalMeterial_model","modalMeterial");
	}
	
	public function index(){
		$this->layout->title("模式材料列表");
		$data["list"] = $this->modalMeterial->getAll();
		
		$this->layout->view("modalMeterial/index",$data);
	}
	
	public function create()
	{		
		$this->layout->title("新增模式材料");
		$data=$this->input->post();
		$data =$this->initialize($data);
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				try {
					$this->modalMeterial->save($data);
						
					redirect(site_url("modalMeterial/index"));
					return;
				}
				catch (Exception $e)
				{
					$data["uniqueError"]=$e->getMessage();
				}
			}
		}
		
		$data["meterialCategory_list"]=$this->loadMeterialCategoryData();
		$this->layout->view("modalMeterial/create",$data);
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
				$this->modalMeterial->save($data);
				redirect(site_url("modalMeterial/index"));
				return;
			}		
		}
		else
		{
			$result=$this->modalMeterial->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("modalMeterial/index"));
				return;
			}
			
			$data=array(
					"name"=>$result->name,"color"=>$result->color,"price"=>$result->price,
					"accuracy"=>$result->accuracy,"size"=>$result->size,"technology"=>$result->technology,
					"workday"=>$result->workday,"special"=>$result->special,"suitableProduct"=>$result->suitableProduct,
					"unSuitableProduct"=>$result->unSuitableProduct,"description"=>$result->description,"image"=>$result->image,
					"thumbImage"=>$result->thumbImage,"smallImage"=>$result->smallImage,"meterialCategory_ID"=>$result->meterialCategory_ID,
					"id"=>$result->id
			);
		}
        
		$data["meterialCategory_list"]=$this->loadMeterialCategoryData();
		$this->layout->view("modalMeterial/edit",$data);
	}
	
	public function delete($id)
	{
		$this->modalMeterial->delete($id);
		
		redirect(site_url("modalMeterial/index"));
		return;
	}
	
	private function initialize($data){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","名称","required");
		$this->form_validation->set_rules("color","颜色","required");
		$this->form_validation->set_rules("price","价格","required");
		$this->form_validation->set_rules("accuracy","精度","required");
		$this->form_validation->set_rules("size","成型尺寸","required");
		$this->form_validation->set_rules("technology","工艺","required");
		$this->form_validation->set_rules("workday","交工周期","required");
		$this->form_validation->set_rules("special","特点","required");
		$this->form_validation->set_rules("suitableProduct","适合做","required");
		$this->form_validation->set_rules("unSuitableProduct","不适合做","required");
		$this->form_validation->set_rules("image","图片","required");
		$this->form_validation->set_rules("meterialCategory_ID","材料类别","required");
		
		if(!isset($data["name"]))
		{
			$data["name"]="";
		}
		if(!isset($data["color"]))
		{
			$data["color"]="#f2223b";
		}
		if(!isset($data["price"]))
		{
			$data["price"]="";
		}
		if(!isset($data["accuracy"]))
		{
			$data["accuracy"]="";
		}
		if(!isset($data["size"]))
		{
			$data["size"]="";
		}
		if(!isset($data["technology"]))
		{
			$data["technology"]="";
		}
		if(!isset($data["workday"]))
		{
			$data["workday"]="";
		}
		if(!isset($data["special"]))
		{
			$data["special"]="";
		}
		if(!isset($data["suitableProduct"]))
		{
			$data["suitableProduct"]="";
		}
		if(!isset($data["unSuitableProduct"]))
		{
			$data["unSuitableProduct"]="";
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
		if(!isset($data["meterialCategory_ID"]))
		{
			$data["meterialCategory_ID"]="";
		}
		if(!isset($data["description"]))
		{
			$data["description"]="";
		}
		
		return $data;
    }
    
    private function loadMeterialCategoryData()
    {
    	$this->load->model("modalMeterialCategory_model","modalMeterialCategory");
    	$departs = $this->modalMeterialCategory->getOptions();
    
    	$data=array();
    	foreach($departs as $item )
    	{
    		$data[$item->id]=$item->name;
    	}
    
    	return $data;
    }
}
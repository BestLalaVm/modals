<?php
class administrator extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("administrator_model","administrator");	
	}
	
	public function index(){
		$this->layout->title("管理员列表");
		$data["list"] = $this->administrator->getAll();
		
		$this->layout->view("administrator/index",$this->wrapviewdata($data));
	}
	
	public function create()
	{		
		$this->form_validation->set_rules("userName","用户名","required");
        $this->form_validation->set_rules("password","密码","required");
		$this->layout->title("新增管理员");
		$data=$this->input->post();
		if($this->is_post())
		{
			if($this->form_validation->run()==TRUE)
			{
				if(!isset($data["isSuper"]))
				{
					$data["isSuper"]=0;
				}
				
				try {
					$this->administrator->save($data);
						
					redirect(site_url("administrator/index"));
					return;
				}
				catch (Exception $e)
				{
					$data["uniqueError"]=$e->getMessage();
				}
			}
		}
		
		if(!isset($data["userName"]))
		{
			$data["userName"]="";
		}
		if(!isset($data["isSuper"]))
		{
			$data["isSuper"]=false;
		}
		if(!isset($data["isPasswordChanged"]))
		{
			$data["isPasswordChanged"]=true;
		}
		$this->layout->view("administrator/create",$this->wrapviewdata($data));
	}
	
	public function edit($id)
	{
		$this->form_validation->set_rules("userName","用户名","required");
		$data = $this->input->post();
		$data["id"]=$id;
		if($this->is_post())
		{
            if(array_key_exists("isPasswordChanged",$data) && $data["isPasswordChanged"]=="1" && empty($data["password"])) {
                $this->form_validation->set_rules("password", "密码", "required");
            }
			if($this->form_validation->run()==TRUE)
			{
				$this->administrator->save($data);
				redirect(site_url("administrator/index"));
				return;
			}		
		}
		else
		{
			$result=$this->administrator->get($id);
			if($result==null || !isset($result))
			{
				redirect(site_url("administrator/index"));
				return;
			}
			
			$data=array("id"=>$result->id,"userName"=>$result->userName,"isSuper"=>$result->isSuper,"isPasswordChanged"=>false);
		}
        
		$this->layout->view("administrator/edit",$this->wrapviewdata($data));
	}
	
	public function delete($id)
	{
		$this->administrator->delete($id);
		
		redirect(site_url("administrator/index"));
		return;
	}
	
	protected function wrapviewdata($data)
	{
		if(!isset($data["pageNavTitle"]))
		{
			$data["pageNavTitle"]="管理员界面";
		}
		if(!isset($data["pageNavdescription"]))
		{
			$data["pageNavdescription"]="用于维护所有后台管理权限的用户";
		}
		if(!isset($data["pageName"]))
		{
			$data["pageName"]="管理员界面";
		}
	
		return $data;
	}
}
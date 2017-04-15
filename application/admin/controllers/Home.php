<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_UnAuthController
{
    private $CI;
	function __construct(){
		parent::__construct();

		$this->CI = &get_instance();
	}
	
	public function index()
	{
		redirect(site_url("home/login"));
	}
	
	public function login()
	{
        $data = $this->input->post();
        $data["errorMessage"]="";
		if($this->is_post())
		{
            $this->CI->form_validation->set_rules("userName","用户名","required");
            $this->CI->form_validation->set_rules("password","密码","required");
            if($this->CI->form_validation->run()==TRUE)
            {
                $this->CI->load->model("administrator_model","administrator");
                try
                {
                    $result = $this->CI->administrator->login($data["userName"],$data["password"]);
                    MyAuth::setLoginUser(array("id"=>$result["id"],"userName"=>$result["userName"],"isSuper"=>$result["isSuper"]));
                    redirect(site_url("dashboard/index"));
                    return ;
                }
                catch (Exception $e)
                {
                    $data["errorMessage"]=$e->getMessage();
                }
            }
		}
		
		$this->load->helper(array("form","url"));
		
		$this->layout->title("Site index page");
		//$data=array("layout"=>$this->layout);
        if(!isset($data["userName"]))
        {
            $data["userName"]="";
        }
        if(!isset($data["password"]))
        {
            $data["password"]="";
        }

		$this->layout->view("home/login",$data);
	}
	
	public function logout()
	{
        //$this->CI->session->unset_userdata("currentUser");
        MyAuth::logout();
		redirect(site_url("home/index"));
	}
	
	/*
	protected function loadLayout()
	{
		$this->layout_view="layout/login.php";
		parent::loadLayout();
	}
	
	*/

    protected function loadResources()
    {
        $this->layout->js(base_url("/assets/media/js/jquery-1.10.1.min.js"));

        $this->layout->css(base_url("/assets/login/css/login.css"));
    }
}
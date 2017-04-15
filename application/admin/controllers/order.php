<?php
class order extends My_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array("form","url"));
		$this->load->model("order_model","order");
	}
	
	public function index(){
		$this->layout->title("订单列表");

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

        $data=$this->order->getAll($_GET,$pageIndex,$pageSize);

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

        $this->layout->view("order/index",$data);
	}
	
	public function detail($id)
	{
	    if($this->is_post()){
          $this->order->changeStatus($id,$_POST["status"]);
          redirect(site_url("order/index"));
        }else
        {
            $result=$this->order->get($id);
            if($result==null || !isset($result))
            {
                redirect(site_url("order/index"));
                return;
            }

            $this->layout->view("order/detail",array("data"=>$result));
        }
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 9:46 PM
 */
class modalnews extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("dbreader_model","dbreader");
    }

    function index()
    {
        $pageIndex=1;
        $pageSize=20;
        if(array_key_exists("pageIndex",$_GET))
        {
            $pageIndex = $_GET["pageIndex"]+0;
        }
        if(array_key_exists("pageSize",$_GET))
        {
            $pageSize = $_GET["pageSize"]+0;
        }

        $data = $this->dbreader->getmodalNews($pageIndex,$pageSize);

        $this->layout->view("modalnews/index",$data);
    }

    function detail($id)
    {
        $data = $this->dbreader->getmodalNewsById($id);

        if(is_null($data))
        {
            redirect(site_url("modalnews/index"));
            return;
        }

        $this->layout->view("modalnews/detail",array("data"=>$data));
    }

    function getRelativeOverviewNews()
    {
        $relativeTagIds = array();
        if(array_key_exists("relativeTagIds",$_POST))
        {
            $relativeTagIds = $_POST["relativeTagIds"];
        }

        $m = $this->dbreader->getmodalNewsOverviewByTagIds($relativeTagIds);

        $data = array("datas"=>$m,"success"=>true);

        echo json_encode($data);
    }
}
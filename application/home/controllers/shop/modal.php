<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:26 PM
 */
class modal extends Shop_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("shopdbreader_model","shopdbreader");
        $this->load->model("dbreader_model","dbreader");
        $this->load->helper("form");
    }

    function index()
    {
        $queryString="";
        $pageIndex=1;
        $pageSize=16;
        if(array_key_exists("pageIndex",$_GET))
        {
            $pageIndex = $_GET["pageIndex"]+0;
        }
        if(array_key_exists("pageSize",$_GET))
        {
            $pageSize = $_GET["pageSize"]+0;
        }
        $keyword="";
        if(array_key_exists("keyword",$_GET))
        {
            $keyword = $_GET["keyword"];
            if(!empty($keyword))
            {
                $queryString.="keyword=".$keyword;
            }
        }

        //$data = $this->shopdbreader->getmodalsOvervoew($keyword,0,$pageIndex,$pageSize);
        $userId=$this->getCurrentUserId();
        $data = $this->dbreader->getmodalsOverview(array("userId"=>$userId,"iscustomizeModal"=>0),$pageIndex,$pageSize);

        $data["queryString"]=$queryString;

        $this->layout->view("shop/modal/index",$data);
    }

    function cmindex()
    {
        $queryString="";
        $pageIndex=1;
        $pageSize=16;
        if(array_key_exists("pageIndex",$_GET))
        {
            $pageIndex = $_GET["pageIndex"]+0;
        }
        if(array_key_exists("pageSize",$_GET))
        {
            $pageSize = $_GET["pageSize"]+0;
        }
        $keyword="";
        if(array_key_exists("keyword",$_GET))
        {
            $keyword = $_GET["keyword"];
            if(!empty($keyword))
            {
                $queryString.="keyword=".$keyword;
            }
        }

        /*$data = $this->shopdbreader->getmodalsOvervoew($keyword,1,$pageIndex,$pageSize);*/
        $userId=$this->getCurrentUserId();
        $data = $this->dbreader->getmodalsOverview(array("userId"=>$userId,"iscustomizeModal"=>1),$pageIndex,$pageSize);

        $data["queryString"]=$queryString;

        $this->layout->view("shop/modal/index",$data);
    }

    function detail($id)
    {
        $userId = $this->getCurrentUserId();
        $modal = $this->dbreader->getmodalByid($id,$userId);
        if($modal==null || empty($modal["id"]))
        {
            show_404();
            return;
        }

        $this->layout->view("shop/modal/detail",array("data"=>$modal));
    }
}
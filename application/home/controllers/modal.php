<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 9:14 PM
 */
class modal extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("dbreader_model","dbreader");
        $this->load->helper("form");
    }

    function index()
    {
        $queryString="";
        $pageIndex=1;
        $pageSize=10;
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

        $author="";
        if(array_key_exists("author",$_GET))
        {
            $author = $_GET["author"];
            if(!empty($author))
            {
                if(empty($queryString))
                {
                    $queryString.="author=".$author;
                }else{
                    $queryString.="&author=".$author;
                }
            }

        }
        $dateFrom=null;
        if(array_key_exists("dateFrom",$_GET) && validateDate($_GET["dateFrom"]))
        {
            $dateFrom = $_GET["dateFrom"];

            if(!empty($dateFrom))
            {
                if(empty($queryString))
                {
                    $queryString.="dateFrom=".$dateFrom;
                }else{
                    $queryString.="&dateFrom=".$dateFrom;
                }
            }
        }
        $dateTo=null;
        if(array_key_exists("dateTo",$_GET)&& validateDate($_GET["dateTo"]))
        {
            $dateTo = $_GET["dateTo"];

            if(!empty($dateTo))
            {
                if(empty($queryString))
                {
                    $queryString.="dateTo=".$dateTo;
                }else{
                    $queryString.="&dateTo=".$dateTo;
                }
            }
        }
        $userId=$this->getCurrentUserId();
        $data = $this->dbreader->getmodalsOverview(
                    array("keyword"=>$keyword,"author"=>$author,"dateFrom"=>$dateFrom,"dateTo"=>$dateTo,"userId"=>$userId,"iscustomizeModal"=>"2"),
                    $pageIndex,$pageSize);
        $data["queryString"]=$queryString;

        $this->layout->view("modal/index",$data);
    }

    function detail($id)
    {
      $userId=$this->getCurrentUserId();
      $modal = $this->dbreader->getmodalByid($id,$userId);
      if($modal==null || empty($modal["id"]))
      {
          redirect(site_url("modal/index"));
          return;
      }

      $this->layout->view("modal/detail",array("data"=>$modal));
    }

    function getByCategoryId()
    {
        $categoryId = $_GET["categoryId"];
        $pageIndex=0;
        $pageSize=20;
        if(array_key_exists("pageIndex",$_GET))
        {
            $pageIndex = $_GET["pageIndex"];
        }

        if(array_key_exists("pageSize",$_GET))
        {
            $pageSize = $_GET["pageSize"];
        }

        $userId=$this->getCurrentUserId();
        $data = $this->dbreader->getmodalOverview($categoryId,$userId,$pageIndex,$pageSize);

        echo json_encode($data);
    }

    function getRelativeOverviewModals()
    {
        $relativeTagIds = array();
        if(array_key_exists("relativeTagIds",$_POST))
        {
            $relativeTagIds = $_POST["relativeTagIds"];
        }
        $excludeModalId="";
        if(array_key_exists("excludeModalId",$_POST))
        {
            $excludeModalId=$_POST["excludeModalId"];
        }

        $m = $this->dbreader->getmodalsOverviewByTagIds($relativeTagIds,$excludeModalId);

        $data = array("datas"=>$m,"success"=>true);

        echo json_encode($data);
    }
}
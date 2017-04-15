<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 8:55 PM
 */
class home extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("dbreader_model","dbreader");
    }

    function index()
    {
        $categories = $this->dbreader->getCategories();
        $homeitems= $this->config->item("home","3dmodal-site");
        $selectedModalIds=$homeitems["secondbanner"]["modalIds"];
        $userId=$this->getCurrentUserId();
        $selectedModals = $this->dbreader->gethomeModalsByIds($selectedModalIds,$userId);

        $this->layout->view("home/index",array("categories"=>$categories,"currentCategoryId"=>"1","secondmodals"=>$selectedModals));
    }

    function advance()
    {
        $keyword="";
        if(array_key_exists("keyword",$_GET))
        {
            $keyword = $_GET["keyword"];
        }
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
        $data = $this->dbreader->searchModalBases($keyword,$pageIndex,$pageSize);

        $this->layout->view("home/advance",$data);
    }
}
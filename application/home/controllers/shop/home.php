<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:26 PM
 */
class home extends Shop_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("shopdbreader_model","shopdbreader");
        $this->load->model("dbreader_model","dbreader");
    }

    function index()
    {
        $m = $this->shopdbreader->gettop10modalOverview();
        $meterialDatas = $this->shopdbreader->getMeterials();
        $this->layout->view("shop/home/index",array("data"=>array("modals"=>$m,"meterials"=>$meterialDatas)));
    }

    function getTop5Meterials()
    {
        $m = $this->shopdbreader->getMeterials();
        $data = array("datas"=>$m,"success"=>true);

        echo json_encode($data);
    }

    function getmodalOverview()
    {
        $m = $this->shopdbreader->gettop10modalOverview();
        $data = array("datas"=>$m,"success"=>true);

        echo json_encode($data);
    }

    function login()
    {
        $this->layout->view("shop/home/login",array());
    }
}
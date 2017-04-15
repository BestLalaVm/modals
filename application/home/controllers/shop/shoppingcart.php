<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/12/2017
 * Time: 3:43 PM
 */
class shoppingcart extends Shop_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("shoppingcart_model","shoppingcart");
    }

    function index()
    {
        $this->layout->view("shop/shoppingcart/index",array());
    }

    function getShoppingCartItems()
    {
        $data["success"]=true;
        if(!MyAuth::isLogin())
        {
            $data["success"]=false;
            $data["message"]="请先登入系统";
            $data["redirectUrl"]=site_url("shop/home/login");
        }else{
            $modals = $this->shoppingcart->getAll(MyAuth::getCurrentUser()->id);

            $data["data"]=$modals;
            if(count($modals)==0){
                $data["redirectUrl"]=site_url("shop/home/index");
                $data["success"]=false;
            }
        }

        echo json_encode($data);
    }

    function removeItem($id)
    {
        $data["success"]=true;
        if(!MyAuth::isLogin())
        {
            $data["success"]=false;
            $data["message"]="请先登入系统";
            $data["redirectUrl"]=site_url("shop/home/login");
        }else{
            $modals = $this->shoppingcart->remove(MyAuth::getCurrentUser()->id,$id);

            $data["data"]=$modals;

        }

        echo json_encode($data);
    }

    function update(){
        $response["success"]=true;
        if(!$this->is_post()){
            return;
        }else{
            if(MyAuth::isLogin()){
                $data = $_POST["data"];

                $this->shoppingcart->update(MyAuth::getCurrentUser()->id,$data);
            }else{
                $response["redirectUrl"]=site_url("shop/home/index");
                $response["success"]=false;
                $data["message"]="请先登入系统";
            }
        }

        echo json_encode($response);
    }

    function addAndBuy(){
        $response["success"]=true;
        if(!$this->is_post()){
            return;
        }else{
            if(MyAuth::isLogin())
            {
                $data = $_POST["data"];

                $this->shoppingcart->add(MyAuth::getCurrentUser()->id,$data["modalId"],$data["meterialId"],$data["quantity"],$data["size"],$data["weight"]);
                $response["redirectUrl"]=site_url("shop/shoppingcart/index");
            }else{
                $response["redirectUrl"]=site_url("shop/home/login");
                $response["message"]="请先登入系统";
            }
        }

        echo json_encode($response);
    }
}
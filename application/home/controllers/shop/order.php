<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/12/2017
 * Time: 3:43 PM
 */
class order extends Shop_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("order_model","order");
    }

    function checkout(){
        $response["success"]=true;
        if(!$this->is_post()){
            return;
        }else{
            $shippingAddress = $_POST["shippingAddress"];

            try{
                $result = $this->order->create(MyAuth::getCurrentUser()->id,$shippingAddress);
                $response["order"]=$result;

                $response["redirectUrl"]=site_url("shop/payment/index/".$result["orderNumber"]);

                $newUser = array("shippingName"=>$shippingAddress["shippingName"],"shippingAddress"=>$shippingAddress["shippingAddress"],
                                 "telephone"=>$shippingAddress["shippingTelephone"],"image"=>MyAuth::getCurrentUser()->image);
                MyAuth::setLoginUser($newUser);
            }
            catch (Exception $e){
                $response["success"]=false;
                $response["message"] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }

    function success($orderNumber){
        $order = $this->order->get(MyAuth::getCurrentUser()->id,$orderNumber);
        if($order==null){
            redirect(site_url("shop/home/index"));
            return;
        }

        $this->layout->view("shop/shoppingcart/success",array("data"=>$order));
    }

    function failed(){
        $this->layout->view("shop/shoppingcart/failed",array());
    }
}
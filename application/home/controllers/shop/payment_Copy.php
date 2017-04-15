<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:26 PM
 */
require_once(APPPATH."/third_party/alipaymd5direct/alipayment.php");

class payment extends Shop_Controller
{
    private $apliPay;
    function __construct()
    {
        parent::__construct();

        $this->apliPay = new alipayment();
        $this->load->model("order_model","order");
    }

    function index($number)
    {
        if(!MyAuth::isLogin()){
            redirect("shop/home/index");
            return;
        }
        $data = $this->order->get(MyAuth::getCurrentUser()->id, $number);
        if(is_null($data)) {
            redirect("shop/home/index");
        }else {
            $desciption="";
            foreach ($data["items"] as $item){
                $desciption.="[商品名称:{$item["modalName"]} 数量:{$item["quantity"]} 尺寸:{$item["size"]} 重量:{$item["weight"]} 单价:{$item["price"]} 总价:{$item["totalPrice"]}]";
            }
            //$desciption.="收件人:{$data["shippingName"]}  收件人:{$data["shippingTelephone"]}  收件人:{$data["shippingAddress"]}";
            $subject = "云端商城订单{$data["number"]}";
            $desciption="云端商城订单总金额{$data["totalPrice"]}";
            $form = $this->apliPay->generateDirectForm(new paymentmodel($data["number"],$subject , $data["totalPrice"], $desciption,
                site_url("shop/payment/returnUrl/$number"), site_url("shop/payment/callback/$number")));

            echo $form;
        }
    }

    function callback($number)
    {
       $result = $this->apliPay->executeNotify(site_url("shop/payment/callback/$number"),site_url("shop/payment/returnUrl/$number"),function ($trade_no,$trade_status,$out_trade_no,$array){
           $this->order->changePaymentStatus($out_trade_no,$array);
       },function($array)
       {
           var_dump($array);
       });

       echo $result;
    }

    function returnUrl($number)
    {
        $result = $this->apliPay->executeReturnUrl(site_url("shop/payment/callback/$number"),site_url("shop/payment/returnUrl/$number"),function ($trade_no,$trade_status,$out_trade_no,$array){
            var_dump($array);
            $this->order->changePaymentStatus($out_trade_no,$array);
        },function($array)
        {

        });
        var_dump($_SERVER);
        echo "<br/>";
        var_dump($result);
        if($result)
        {
            redirect(site_url("shop/order/success/".$result["number"]));
        }else{
            //redirect(site_url("shop/order/success/$number"));
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:26 PM
 */
class payment extends Shop_Controller
{
    private $alipay_config;
    function __construct()
    {
        parent::__construct();

        $this->alipay_config=$this->config->item("alipay");
        $this->load->model("order_model","order");
        $this->load->helper("url");
    }

    function index($number)
    {
        require_once(APPPATH."/third_party/alipaymd5direct/lib/alipay_submit.class.php");
        if(!MyAuth::isLogin()){
            redirect("shop/home/index");
            return;
        }
        $data = $this->order->get(MyAuth::getCurrentUser()->id, $number);
        if(is_null($data)) {
            redirect("shop/home/index");
        }else {
            if((float)$data["totalPrice"]==0) {
                redirect(site_url("shop/order/success/{$data["number"]}"));
                return;
            }
            //构造要请求的参数数组，无需改动
            $desciption="";
            foreach ($data["items"] as $item){
                $desciption.="[商品名称:{$item["modalName"]} 数量:{$item["quantity"]} 尺寸:{$item["size"]} 重量:{$item["weight"]} 单价:{$item["price"]} 总价:{$item["totalPrice"]}]";
            }
            $this->alipay_config["notify_url"]=site_url("shop/payment/callback/$number");
            $this->alipay_config["return_url"]=site_url("shop/payment/returnUrl/$number");
            $parameter = array(
                "service"       => $this->alipay_config['service'],
                "partner"       => $this->alipay_config['partner'],
                "seller_id"  => $this->alipay_config['seller_id'],
                "payment_type"	=> $this->alipay_config['payment_type'],
                "notify_url"	=> $this->alipay_config['notify_url'],
                "return_url"	=> $this->alipay_config['return_url'],

                "anti_phishing_key"=>$this->alipay_config['anti_phishing_key'],
                "exter_invoke_ip"=>$this->alipay_config['exter_invoke_ip'],
                "out_trade_no"	=> $data["number"],
                "subject"	=> "云端订单:$number",
                "total_fee"	=> $data["totalPrice"],
                "body"	=> $desciption,
                "_input_charset"	=> trim(strtolower($this->alipay_config['input_charset']))
                //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
                //如"参数名"=>"参数值"
            );

//建立请求
            $alipaySubmit = new AlipaySubmit($this->alipay_config);
            $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
            echo ($html_text);
            return;
/*
            $desciption="";
            foreach ($data["items"] as $item){
                $desciption.="[商品名称:{$item["modalName"]} 数量:{$item["quantity"]} 尺寸:{$item["size"]} 重量:{$item["weight"]} 单价:{$item["price"]} 总价:{$item["totalPrice"]}]";
            }
            //$desciption.="收件人:{$data["shippingName"]}  收件人:{$data["shippingTelephone"]}  收件人:{$data["shippingAddress"]}";
            $subject = "云端商城订单{$data["number"]}";
            $desciption="云端商城订单总金额{$data["totalPrice"]}";
            $form = $this->apliPay->generateDirectForm(new paymentmodel($data["number"],$subject , $data["totalPrice"], $desciption,
                site_url("shop/payment/returnUrl/$number"), site_url("shop/payment/callback/$number")));

            echo $form;*/
        }
    }

    function callback($number)
    {
        require_once(APPPATH."/third_party/alipaymd5direct/lib/alipay_notify.class.php");
        $this->alipay_config["notify_url"]=site_url("shop/payment/callback/$number");
        $this->alipay_config["return_url"]=site_url("shop/payment/returnUrl/$number");

        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        var_dump($_GET);
        var_dump($_POST);
        if($verify_result) {//验证成功
            $out_trade_no = $_POST['out_trade_no'];
            $this->order->changePaymentStatus($out_trade_no,$_POST);
            echo "success";
        }else{
            echo "fail";
        }
    }

    function returnUrl($number)
    {
        require_once(APPPATH."/third_party/alipaymd5direct/lib/alipay_notify.class.php");
        $this->alipay_config["notify_url"]=site_url("shop/payment/callback/$number");
        $this->alipay_config["return_url"]=site_url("shop/payment/returnUrl/$number");

        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {//验证成功
            $out_trade_no = $_GET['out_trade_no'];
            $this->order->changePaymentStatus($out_trade_no,$_GET);
            redirect(site_url("shop/order/success/$out_trade_no"));
        }else{
            redirect(site_url("shop/order/failed/$number"));
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/21/2017
 * Time: 8:00 PM
 */
require_once(APPPATH."third_party/alipaymd5direct/alipay.config.php");
require_once(APPPATH."third_party/alipaymd5direct/models/paymentmodel.php");

class alipayment
{
    public function generateDirectForm(paymentmodel $model)
    {
        require_once(APPPATH."third_party/alipaymd5direct/lib/alipay_submit.class.php");

        $conf = new alipayConfig();
        $configValue = $conf->alipay_config;
        $parameter = array(
            "service"       => $configValue['service'],
            "partner"       => $configValue['partner'],
            "seller_id"  => $configValue['seller_id'],
            "payment_type"	=> $configValue['payment_type'],
            "notify_url"	=> $configValue['notify_url'],
            "return_url"	=> $configValue['return_url'],

            "anti_phishing_key"=>$configValue['anti_phishing_key'],
            "exter_invoke_ip"=>$configValue['exter_invoke_ip'],
            "out_trade_no"	=> $model->orderNumber,
            "subject"	=> $model->orderSubject,
            //"total_fee"	=> $model->orderFree,
            "total_fee"	=> 0.01,
            "body"	=> $model->orderDescription,
            "_input_charset"	=> trim(strtolower($configValue['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );

        //建立请求
        $alipaySubmit = new AlipaySubmit($configValue);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");

        return $html_text;
    }

    public function executeReturnUrl($successCallBack,$failedCallBack)
    {
        require_once(APPPATH."third_party/alipaymd5direct/lib/alipay_notify.class.php");
        $conf = new alipayConfig();
        $configValue = $conf->alipay_config;

        $alipayNotify = new AlipayNotify($configValue);
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号

            $out_trade_no = $_GET['out_trade_no'];

            //支付宝交易号

            $trade_no = $_GET['trade_no'];

            //交易状态
            $trade_status = $_GET['trade_status'];


            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                $successCallBack($trade_no,$trade_status,$out_trade_no,$_GET);
            }
            else {
                echo "trade_status=".$_GET['trade_status'];
            }

            //echo "验证成功<br />";
            return array("number"=>$trade_no,"status"=>$trade_status,"isSuccess"=>true);

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {

            $failedCallBack($_GET);

            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            //echo "验证失败";
            //return "验证失败";
            return false;
        }
    }

    public function executeNotify($successCallBack,$failedCallBack){
        require_once(APPPATH."third_party/alipaymd5direct/lib/alipay_notify.class.php");

        $conf = new alipayConfig();
        $configValue = $conf->alipay_config;

        //计算得出通知验证结果
        $alipayNotify = new AlipayNotify($configValue);
        $verify_result = $alipayNotify->verifyNotify();

        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代


            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

            //商户订单号

            $out_trade_no = $_POST['out_trade_no'];

            //支付宝交易号

            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //付款完成后，支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }

            $successCallBack($trade_no,$trade_status,$out_trade_no,$_POST);
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            //echo "success";		//请不要修改或删除
            return "success";

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            $failedCallBack($_POST);

            //验证失败
            //echo "fail";
            return "fail";
            //调试用，写文本函数记录程序运行情况是否正常
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }
}
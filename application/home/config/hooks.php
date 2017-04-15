<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook["pre_controller"]=array(
    "class"=>"My_Auth",
    "function"=>"before_action",
    "filename"=>"My_Auth.php",
    'filepath' => 'hooks'
);

$hook["post_controller_constructor"]=function (){
    $CI = &get_instance();

    /*
    $authUrls= array(
        site_url("shop/profile/index")
    );*/

        if(array_key_exists("PATH_INFO",$_SERVER)) {
            $pathInfo = $_SERVER["PATH_INFO"];
            if (!MyAuth::isLogin()) {
                if(array_key_exists("HTTP_X_REQUESTED_WITH",$_SERVER) && $_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest" ) {
                    return;
                }

                if (strpos($pathInfo, "profile") > 0 || strpos($pathInfo, "shoppingcart") > 0) {
                    if (strpos(current_url(), "shop/") > 0) {
                        header("Location:" . site_url("shop/home/index"));
                    } else {
                        header("Location:" . site_url("home/index"));
                    }

                    return;
                }
            }
        }
        /*
        if(strpos(current_url(),"shop/")>0)
        {
            header("Location:".site_url("shop/home/index"));
        }else{
            header("Location:".site_url("home/index"));
        }

        return;*/
};
$hook["post_controller"]=function (){
    $xx="sss";
};
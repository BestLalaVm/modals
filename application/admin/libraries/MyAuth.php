<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/4/2017
 * Time: 3:06 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class MyAuth
{
    public static function isLogin()
    {
        $ci = &get_instance();
        return !is_null($ci->session->backendUser);
    }

    public static function getCurrentUser()
    {
        $ci = &get_instance();
        $d =  $ci->session->backendUser;
        if($d==null)
        {
            return null;
        }

        $m = new LoginedUserModel();
        $m->id=$d["id"];
        $m->userName=$d["userName"];
        $m->isSuper = $d["isSuper"];

        return $m;
    }

    public static function setLoginUser($d)
    {
        $ci = &get_instance();

        $ci->session->backendUser=$d;
    }

    public static function isSuperUser(){
        if(MyAuth::isLogin()){
           return MyAuth::getCurrentUser()->isSuper==true;
        }

        return false;
    }

    public static function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata("backendUser");
    }
}
class LoginedUserModel
{
    public $id;
    public $userName;
    public $isSuper;
}
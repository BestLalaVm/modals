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
    public static function clearCachePages()
    {
        $CI =& get_instance();
        $cache_path = $CI->config->item('cache_path');
        if ($cache_path === '')
        {
            $cache_path = APPPATH.'cache/';
        }
        $files = scandir($cache_path);
        foreach ($files as $item){
            if($item!=".htaccess" && $item!="index.html" && !empty(str_replace(".","",$item))){
                $filePath = $cache_path.$item;
                if(file_exists($filePath)){
                    unlink($filePath);
                }
            }
        }
    }


    public static function isLogin()
    {
        $ci = &get_instance();
        return !is_null($ci->session->frontUser);
    }

    public static function getCurrentUser()
    {
        $ci = &get_instance();
        $d =  $ci->session->frontUser;
        if($d==null)
        {
            return null;
        }

        $m = new LoginedUserModel();
        $m->id=$d["id"];
        $m->email=$d["email"];
        $m->image=$d["image"];
        $m->telephone=$d["telephone"];
        $m->shippingName=$d["shippingName"];
        $m->shippingAddress=$d["shippingAddress"];
        $m->note=$d["note"];

        return $m;
    }

    public static function setLoginUser($d)
    {
        /*
        $m = new LoginedUserModel();
        $m->id=$d["id"];
        $m->email=$d["email"];
        $m->image=$d["image"];
        $m->telephone=$d["telephone"];
        $m->shippingName=$d["shippingName"];
        $m->shippingAddress=$d["shippingAddress"];
        $m->note=$d["note"];
*/
        $ci = &get_instance();
        $o = $ci->session->frontUser;
        if(is_null($o))
        {
            $o=array("id"=>$d["id"],"email"=>$d["email"]);
        }
        if(array_key_exists("image",$d)){
            $o["image"] = $d["image"];
        }
        if(array_key_exists("note",$d)){
            $o["note"] = $d["note"];
        }

        $o["telephone"] = $d["telephone"];
        $o["shippingName"] = $d["shippingName"];
        $o["shippingAddress"] = $d["shippingAddress"];

        MyAuth::clearCachePages();

        $ci->session->frontUser=$o;
    }

    public static function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata("frontUser");
        MyAuth::clearCachePages();
    }
}
class LoginedUserModel
{
    public $id;
    public $email;
    public $image;
    public $telephone;
    public $shippingName;
    public $shippingAddress;
    public $note;
}
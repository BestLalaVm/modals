<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/23/2017
 * Time: 8:20 PM
 */
class WebUtil
{
    public static $appRootDirName;
    function __construct()
    {
        $ci = &get_instance();
        WebUtil::$appRootDirName=$ci->config->item("appRootDirName");
    }

    public static function Url($path){
        return $path;
        $root = WebUtil::$appRootDirName;
        return "/{$root}/$path";
    }
}
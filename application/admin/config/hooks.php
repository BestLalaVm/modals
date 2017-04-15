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

  if(current_url()!=site_url("home/login"))
  {
      if(!MyAuth::isLogin())
      {
          header("Location:".site_url("home/login"),true,302);
          return;
      }else{
          if(!MyAuth::isSuperUser()) {
              $superMenus = array(site_url("administrator/index"), site_url("administrator/create"), site_url("administrator/edit"), site_url("administrator/delete"), site_url("dbSecurity/index"), site_url("settings/index"));
              if (in_array(current_url(), $superMenus)) {
                  header("Location:" . site_url("dashboard/index"), true, 302);
                  return;
              }
          }
      }
  }
};
$hook["post_controller"]=function (){
  $xx="sss";
};
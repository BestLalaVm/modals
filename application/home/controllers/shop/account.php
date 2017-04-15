<?php

/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:26 PM
 */
class account extends Shop_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("user_model", "user");
    }

    function register()
    {
        $data = array("success" => false);
        if (!array_key_exists("emailAddress", $_POST) ||
            !array_key_exists("password", $_POST) ||
            empty($_POST["emailAddress"]) || empty($_POST["password"])
        ) {
            $data["message"] = "操作无效!";
        } else {
            try {
                $this->user->register($_POST);
                $data["success"] = true;
            } catch (Exception $e) {
                $data["message"] = $e->getMessage();
            }
        }

        echo json_encode($data);
    }

    function login()
    {
        $data = array("success" => false);

        if (!array_key_exists("emailAddress", $_POST) ||
            !array_key_exists("password", $_POST) ||
            empty($_POST["emailAddress"]) ||
            empty($_POST["password"]))
        {
            $data["message"] = "操作无效!";
        } else {
            try {
                $user = $this->user->login($_POST);
                MyAuth::setLoginUser($user);

                $data["success"] = true;
            } catch (Exception $e) {
                $data["message"] = $e->getMessage();
            }
        }

        echo json_encode($data);
    }

    function logout()
    {
        MyAuth::logout();

        $url = site_url("shop/home/index");
        //echo "<script>window.location.href='$url';</script>";
        header("location:$url");
        //redirect(site_url("shop/home/index"));
    }

    function forget()
    {
        $data = $_POST;
        $data["error"]=null;
        $data["status"]=null;
        if($this->is_post())
        {
            try{
                $email = $_POST["emailAddress"];
                $data = $this->user->forgetPassword($email);
                $data["status"]=$email;
            }
            catch (Exception $e){
                $data["error"]=$e->getMessage();
            }
        }

        $this->layout->view("shop/account/forget",$data);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/11/2017
 * Time: 7:34 PM
 */
class help extends Shop_Controller
{
    public function index($id)
    {
        $this->load->model("help_model","help");
        $result = $this->help->get($id);
        if(is_null($result))
        {
            show_404();
            return;
        }
        $data = array("id"=>$result->id,"title"=>$result->title,"content"=>$result->content);
        if(help_model::INTRODUCATION==$id){
            $data["caption"]="用户指南";
        }else if(help_model::HELPCENTER==$id){
            $data["caption"]="帮助中心";
        }
        $this->layout->view("shop/help/index",$data);
    }
}
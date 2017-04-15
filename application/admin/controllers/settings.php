<?php
class settings extends My_Controller
{
	public function index(){
		if($this->is_post() && array_key_exists("clearFrontCache",$_POST)){
		    if($_POST["clearFrontCache"]==1){
		        $url=(is_https() ? 'https' : 'http').'://'.$_SERVER["HTTP_HOST"]."/index.php/ajax/clearCache";
                echo "<iframe src='$url' style='display:none;'></iframe>";
            }
        }
        $this->layout->view("settings/index");
	}
}
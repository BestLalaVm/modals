<?php
defined("BASEPATH") or exit("No direct script access allowed");
class My_UnAuthController extends CI_Controller
{
	public $layout_view="layout/login.php";
	function __construct()
	{
		parent::__construct();
		$this->loadLayout();
		$this->load->helper("url");
		$this->load->database();

		$this->loadResources();
	}

	protected function is_post(){
		return $this->input->server('REQUEST_METHOD') == 'POST';
	}

	protected function wrapviewdata($data)
	{
		if(!isset($data["pageNavTitle"]))
		{
			$data["pageNavTitle"]="管理员界面";
		}
		if(!isset($data["pageNavdescription"]))
		{
			$data["pageNavdescription"]="管理员界面";
		}
		if(!isset($data["pageName"]))
		{
			$data["pageName"]="管理员界面员界面";
		}

		return $data;
	}

	protected function loadLayout()
	{
		$this->load->library("layout");
	}

	protected function loadResources()
	{
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-1.10.1.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-migrate-1.2.1.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-ui-1.10.1.custom.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/bootstrap.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.slimscroll.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.blockui.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.cookie.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.uniform.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.validate.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/app.js"));

		$this->layout->css(WebUtil::Url("/assets/media/css/bootstrap.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/bootstrap-responsive.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/font-awesome.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style-metro.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style-responsive.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/default.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/uniform.default.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/login.css"));
		$this->layout->css(WebUtil::Url("/assets/css/login-app.css"));
	}

    protected function settmpCrossData($key,$value){
        $this->session->set_userdata(array($key=>$value));
    }

    protected function gettmpCrossData($key){
        $value = $this->session->userdata($key);
        $this->session->unset_userdata($key);

        return $value;
    }
}

class My_Controller extends My_UnAuthController
{
	function __construct()
	{
		parent::__construct();
	}
	
	protected function is_post(){
		return $this->input->server('REQUEST_METHOD') == 'POST';
	}
	
	protected function wrapviewdata($data)
	{
		if(!isset($data["pageNavTitle"]))
		{
			$data["pageNavTitle"]="管理员界面";
		}
		if(!isset($data["pageNavdescription"]))
		{
			$data["pageNavdescription"]="管理员界面";
		}
		if(!isset($data["pageName"]))
		{
			$data["pageName"]="管理员界面员界面";
		}
		
		return $data;
	}
	
	protected function loadLayout()
	{
		$this->layout_view="layout/default.php";
		$this->load->library("layout");
	}

	protected function loadResources()
	{
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-1.10.1.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/knockout-3.4.1.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-migrate-1.2.1.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery-ui-1.10.1.custom.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/bootstrap.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/excanvas.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/respond.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.slimscroll.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.blockui.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.cookie.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.uniform.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.flot.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.flot.resize.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.pulsate.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/date.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/daterangepicker.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.gritter.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/fullcalendar.min.js"));
		
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.easy-pie-chart.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.sparkline.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.validate.min.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.validate.unobtrusive.js"));


		//upload files
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.iframe-transport.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/jquery.fileupload.js"));
		
		$this->layout->js(WebUtil::Url("/assets/media/js/bootstrap-colorpicker.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/bootstrap-datepicker.js"));
		
		$this->layout->js(WebUtil::Url("/assets/media/js/select2.min.js"));
		
		$this->layout->js(WebUtil::Url("/assets/script/ckeditor/ckeditor.js"));
		$this->layout->js(WebUtil::Url("/assets/script/ckeditor/initializeEditor.js"));
		$this->layout->js(WebUtil::Url("/assets/media/js/app.js"));
		$this->layout->js(WebUtil::Url("/assets/script/custom.js"));
		
		
		$this->layout->css(WebUtil::Url("/assets/media/css/bootstrap.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/bootstrap-responsive.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/bootstrap-fileupload.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/colorpicker.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/datepicker.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/datetimepicker.css"));
		
		$this->layout->css(WebUtil::Url("/assets/media/css/font-awesome.min.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style-metro.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/style-responsive.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/default.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/uniform.default.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/jquery.gritter.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/daterangepicker.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/fullcalendar.css"));
		$this->layout->css(WebUtil::Url("/assets/media/css/jqvmap.css"));
		
		$this->layout->css(WebUtil::Url("/assets/media/css/select2_metro.css"));
		
		$this->layout->css(WebUtil::Url("/assets/media/css/jquery.easy-pie-chart.css"));
		$this->layout->css(WebUtil::Url("/assets/script/ckeditor/toolbarconfigurator/lib/codemirror/neo.css"));
		//$this->layout->css(base_url("/assets/script/summernote/summernote.css"));
		$this->layout->css(WebUtil::Url("/assets/css/app.css"));
	}
}
<?php
defined("BASEPATH") or exit("No direct script access allowed");
class My_UnAuthController extends CI_Controller
{
	public $layout_view="layout/login.php";
	function __construct()
	{
		parent::__construct();
        $this->load->library('minify');

		$this->loadLayout();
		$this->load->helper("url");
		$this->load->database();

		$this->loadResources();

		$this->cacheResource();

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
        $this->layout->js(WebUtil::Url("/assets/front/js/modal.js"));

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
        /*
        $cssArraies=array(
            WebUtil::Url("/assets/media/css/bootstrap.min.css"),
            WebUtil::Url("/assets/media/css/bootstrap-responsive.min.css"),
            WebUtil::Url("/assets/media/css/font-awesome.min.css"),
            WebUtil::Url("/assets/media/css/style-metro.css"),
            WebUtil::Url("/assets/media/css/style.css"),
            WebUtil::Url("/assets/media/css/style-responsive.css"),
            WebUtil::Url("/assets/media/css/default.css"),
            WebUtil::Url("/assets/media/css/uniform.default.css"),
            WebUtil::Url("/assets/media/css/login.css"),
            WebUtil::Url("/assets/css/login-app.css")
        );
        $jsArraies=array(
            WebUtil::Url("/assets/media/js/jquery-1.10.1.min.js"),
            WebUtil::Url("/assets/media/js/jquery-migrate-1.2.1.min.js"),
            WebUtil::Url("/assets/media/js/jquery-ui-1.10.1.custom.min.js"),
            WebUtil::Url("/assets/media/js/bootstrap.min.js"),
            WebUtil::Url("/assets/media/js/jquery.slimscroll.min.js"),
            WebUtil::Url("/assets/media/js/jquery.blockui.min.js"),
            WebUtil::Url("/assets/media/js/jquery.cookie.min.js"),
            WebUtil::Url("/assets/media/js/jquery.uniform.min.js"),
            WebUtil::Url("/assets/media/js/jquery.validate.min.js"),
            WebUtil::Url("/assets/media/js/app.js"),
            WebUtil::Url("/assets/front/js/modal.js")
        );
        $this->minify->css($cssArraies);
        $this->minify->js($jsArraies);

        $this->layout->js($this->minify->deploy_js(TRUE, 'auto'));
        $this->layout->css($this->minify->deploy_css(TRUE, 'auto'));
        $this->deployjsCss();*/
    }

    protected function cacheResource($cacheMinutes=10)
    {
        $this->output->cache(-20);
        return;
        $url = current_url();
        if(array_key_exists("HTTP_X_REQUESTED_WITH",$_SERVER) && $_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest" ) {
            return;
        }
        if(strpos($url,site_url("modal/detail"))===0 ||
           strpos($url,site_url("shop/modal/detail"))===0 ||
            strpos($url,site_url("shop/account"))===0 ||
            strpos($url,site_url("ajax/"))===0 ||
            strpos($url,site_url("shop/shoppingcart"))===0 ||
            strpos($url,site_url("shop/order"))===0 ||
            strpos($url,site_url("shop/payment"))===0 ||
            strpos($url,site_url("shop/account"))===0 ||
           strpos($url,site_url("shop/profile"))===0){
            return;
        }
        $this->output->cache($cacheMinutes);
    }

    public function deployjsCss()
    {
        $this->layout->js($this->minify->deploy_js(TRUE, 'auto'));
        $this->layout->css($this->minify->deploy_css(TRUE, 'auto'));
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

        $this->layout->css(WebUtil::Url("/assets/media/bootstrap-3.3.7/css/bootstrap.min.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/head.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/login.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/model.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/user.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/ui-dialog.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/common.css"));
        $this->layout->css(WebUtil::Url("/assets/front/theme/css/user_3.css"));
        $this->layout->css(WebUtil::Url("/assets/front/css/svwp_style.css"));
        $this->layout->css(WebUtil::Url("/assets/front/css/datepicker.css"));
        $this->layout->css(WebUtil::Url("/assets/front/css/app.css"));
        $this->layout->css(WebUtil::Url("/assets/front/css/zm.css"));

        $this->layout->js(WebUtil::Url("/assets/media/js/jquery-1.10.1.min.js"));
        $this->layout->js(WebUtil::Url("/assets/media/js/knockout-3.4.1.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/dialog-min.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/jquery.slideViewerPro.1.5.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/jquery.timers.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/bootstrap-datepicker.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/customer.js"));
        $this->layout->js(WebUtil::Url("/assets/front/js/modal.js"));

        /*
                $cssArraies=array(
                    WebUtil::Url("/assets/media/bootstrap-3.3.7/css/bootstrap.min.css"),
                    WebUtil::Url("/assets/front/theme/css/head.css"),
                    WebUtil::Url("/assets/front/theme/css/login.css"),
                    WebUtil::Url("/assets/front/theme/css/model.css"),
                    WebUtil::Url("/assets/front/theme/css/user.css"),
                    WebUtil::Url("/assets/front/theme/css/ui-dialog.css"),
                    WebUtil::Url("/assets/front/theme/css/common.css"),
                    WebUtil::Url("/assets/front/theme/css/user_3.css"),
                    WebUtil::Url("/assets/front/css/svwp_style.css"),
                    WebUtil::Url("/assets/front/css/datepicker.css"),
                    WebUtil::Url("/assets/front/css/app.css"),
                    WebUtil::Url("/assets/front/css/zm.css")
                );
                $jsArraies=array(
                    WebUtil::Url("/assets/media/js/jquery-1.10.1.min.js"),
                    WebUtil::Url("/assets/media/js/knockout-3.4.1.js"),
                    WebUtil::Url("/assets/front/js/dialog-min.js"),
                    WebUtil::Url("/assets/front/js/jquery.slideViewerPro.1.5.js"),
                    WebUtil::Url("/assets/front/js/jquery.timers.js"),
                    WebUtil::Url("/assets/front/js/bootstrap-datepicker.js"),
                    WebUtil::Url("/assets/front/js/customer.js"),
                    WebUtil::Url("/assets/front/js/modal.js"),
                );
                $this->minify->css($cssArraies);
                $this->minify->js($jsArraies);
                $this->deployjsCss();*/
            }

            protected function getCurrentUserId(){
                if(MyAuth::isLogin()){
                    return MyAuth::getCurrentUser()->id;
                }

                return null;
            }
        }

        class Shop_Controller extends My_Controller
        {
            protected function loadLayout()
            {
                $this->layout_view="shop/layout/default.php";
                $this->load->library("layout");
            }

            protected function loadResources()
            {

                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/jquery-ui/jquery-ui.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/bootstrap/css/bootstrap.min.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/font-awesome/css/font-awesome.min.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/selectbox/select_option1.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/rs-plugin/css/settings.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/plugins/owl-carousel/owl.carousel.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/css/style.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/options/animate.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/options/optionswitch.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/css/colors/default.css"));
                $this->layout->css(WebUtil::Url("/assets/front/shop/css/customize.css"));

                $this->layout->js(WebUtil::Url("/assets/front/shop/js/1.11.3/jquery.min.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/jquery-ui/jquery-ui.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/bootstrap/js/bootstrap.min.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/owl-carousel/owl.carousel.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/selectbox/jquery.selectbox-0.1.3.min.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/plugins/countdown/jquery.syotimer.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/options/optionswitcher.js"));
                $this->layout->js(WebUtil::Url("/assets/media/js/knockout-3.4.1.js"));
                $this->layout->js(WebUtil::Url("/assets/front/shop/js/custom.js"));
                $this->layout->js(WebUtil::Url("/assets/front/js/modal.js"));

                /*
        $cssArraies=array(
            WebUtil::Url("/assets/front/shop/plugins/jquery-ui/jquery-ui.css"),
            WebUtil::Url("/assets/front/shop/plugins/bootstrap/css/bootstrap.min.css"),
            WebUtil::Url("/assets/front/shop/plugins/font-awesome/css/font-awesome.min.css"),
            WebUtil::Url("/assets/front/shop/plugins/selectbox/select_option1.css"),
            WebUtil::Url("/assets/front/shop/plugins/rs-plugin/css/settings.css"),
            WebUtil::Url("/assets/front/shop/plugins/owl-carousel/owl.carousel.css"),
            WebUtil::Url("/assets/front/shop/css/style.css"),
            WebUtil::Url("/assets/front/shop/options/animate.css"),
            WebUtil::Url("/assets/front/shop/options/optionswitch.css"),
            WebUtil::Url("/assets/front/css/datepicker.css"),
            WebUtil::Url("/assets/front/shop/css/colors/default.css"),
            WebUtil::Url("/assets/front/shop/css/customize.css")
        );
        $jsArraies=array(
            WebUtil::Url("/assets/front/shop/js/1.11.3/jquery.min.js"),
            WebUtil::Url("/assets/front/shop/plugins/jquery-ui/jquery-ui.js"),
            WebUtil::Url("/assets/front/shop/plugins/bootstrap/js/bootstrap.min.js"),
            WebUtil::Url("/assets/front/shop/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"),
            WebUtil::Url("/assets/front/shop/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"),
            WebUtil::Url("/assets/front/shop/plugins/owl-carousel/owl.carousel.js"),
            WebUtil::Url("/assets/front/shop/plugins/selectbox/jquery.selectbox-0.1.3.min.js"),
            WebUtil::Url("/assets/front/shop/plugins/countdown/jquery.syotimer.js"),
            WebUtil::Url("/assets/front/shop/options/optionswitcher.js"),
            WebUtil::Url("/assets/media/js/knockout-3.4.1.js"),
            WebUtil::Url("/assets/front/shop/js/custom.js"),
            WebUtil::Url("/assets/front/js/modal.js")
        );
        $this->minify->css($cssArraies);
        $this->minify->js($jsArraies);
        $this->deployjsCss();*/
    }
}

class ShopAuth_Controller extends Shop_Controller
{

}
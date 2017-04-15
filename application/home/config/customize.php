<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 5:53 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$config["3dmodal-site"] = array(
    "headerMenu" => array(
        array("text" => "首页", "url" => "/","fullUrl"=>false),
        array("text" => "3D模型", "url" => "modal/index","fullUrl"=>false),
        array("text" => "模型新闻", "url" => "modalnews/index","fullUrl"=>false),
        array("text" => "云端打印", "url" => "shop/home/index","fullUrl"=>false)
    ),
    "footer" => "
            <ul class=\"clear\">
                <li><a href=\"#\" target=\"_blank\">关于我们 &nbsp;|</a></li>
                <li><a href=\"#\" target=\"_blank\">诚聘英才 &nbsp;|</a></li>
                <li><a href=\"#\" target=\"_blank\">法律条款 &nbsp;|</a></li>
                <li><a href=\"#\" target=\"_blank\">隐私政策 &nbsp;|</a></li>
                <li><a href=\"#\" target=\"_blank\">联系我们 </a></li>
            </ul>
            <p style=\"width:900px;\">
                Copyright@2016 3D打印 All Rights Reserve…
                厦门市3D创意设计与打印公共服务平台
            </p>",
    "home" => array(
        "topbanner" => array(
            array("url" => "http://www.163.com", "image" => "../assets/front/images/home/sd.jpg"),
            array("url" => "http://www.baidu.com", "image" => "../assets/front/images/home/banner.jpg"),
            array("url" => "http://xxx.com", "image" => "../assets/front/images/home/banner-zst.png"),
            array("url" => "modal/index", "image" => "../assets/front/images/home/05168303769018445.jpg")

        ),
        "secondbanner" => array(
            "title" => "精选推荐",
            "tip" => "<span id=\"tdown_count\">99213</span>个精选免费模型",
            "modalIds" => array("im10", "im12", "im33", "im51", "im57")
        ),
        "registerIntroducation" => "
                <div class=\"b_p1\">
                    <img width=\"40\" height=\"52\" alt=\"图标\" src=\"http://static.3deazer.com/images/model_index/icon_1.png\">
                    <div class=\"p1_b\">
                        <p class=\"p1_s\">寻找灵感</p>
                        <p class=\"p1_s1\">关注全球最新3D打印咨询，分享国内外最新鲜最有趣的图片。</p>
                    </div>
                </div>
                <!--1-->
                <div class=\"b_p1\">
                    <img width=\"45\" height=\"52\" alt=\"图标\" src=\"http://static.3deazer.com/images/model_index/icon_2.png\">
                    <div class=\"p1_b\">
                        <p class=\"p1_s\">在线互动</p>
                        <p class=\"p1_s1\">汇聚国内外上千名设计师及3D打印爱好者，一起交流互动。</p>
                    </div>
                </div>
                <!--2-->
                <div class=\"b_p1\">
                    <img width=\"45\" height=\"52\" alt=\"图标\" src=\"http://static.3deazer.com/images/model_index/icon_3.png\">
                    <div class=\"p1_b\">
                        <p class=\"p1_s\">在线下单</p>
                        <p class=\"p1_s1\">1500种材质，全球顶尖大型机器24小时打印，一小时快速制作。</p>
                    </div>
                </div>
                <!--3-->
                <div class=\"btn_zhuc_1\"><a href=\"/index.php/shop/home/login\" class=\"btn\">马上登入</a></div>"
    )
);
$config["3dmodal-shop"] = array(
    "footer" => "Copyright@2016-2020 All Rights Reserved 3D创意设计与3D打印服务",
    "home" => array(
        "topslider" => array(
            array("url" => "/index.php/shop/modal/index", "image" => "../assets/front/shop/img/home/banner-slider/05168343549210642.jpg","title"=>"盲僧",
                  "description"=>"<div class=\"anli-ms text-left\">
<p> 精品定制|你要盲僧，我们就做一个你的盲僧</p>
	    				<ul class=\"anli-msd\">
	    					<li><span class=\"cloud-btn\">最小精度</span>0.2 mm</li>
	    					<li><span class=\"cloud-btn\">尺寸大小</span>185 cm</li>
	    					<li><span class=\"cloud-btn\">使用材料</span>进口光敏树脂</li>
	    					<li><span class=\"cloud-btn\">生产工艺</span>SLA立体光刻</li>
	    					<li><span class=\"cloud-btn\">交工周期</span>8天</li>
	    				</ul>
						<a class=\"view_more cloud-btn\" href=\"http://www.mohou.com/success/3.html\">查看详情 ▶ </a></div>"),

            array("url" => "", "image" => "../assets/front/shop/img/home/banner-slider/05177434171586391.jpg",
                  "title"=>"3D打印外衣",
                   "description"=>"<div class=\"anli-ms text-left\">
	    				<p> 给你的机器人穿一件3D打印外衣</p>
	    				<ul class=\"anli-msd\">
	    					<li><span class=\"cloud-btn\">最小精度</span>0.2 mm</li>
	    					<li><span class=\"cloud-btn\">尺寸大小</span>80 cm</li>
	    					<li><span class=\"cloud-btn\">使用材料</span>PLA塑料</li>
	    					<li><span class=\"cloud-btn\">生产工艺</span>FDM(塑料熔融沉积)</li>
	    					<li><span class=\"cloud-btn\">交工周期</span>7天</li>
	    				</ul>
						<a class=\"view_more cloud-btn\" href=\"http://www.mohou.com/success/21.html\">查看详情 ▶ </a>
	    			</div>"),
            array("url" => "", "image" => "../assets/front/shop/img/home/banner-slider/05176110158647777.jpg",
                "title"=>"侏罗纪的模型",
                "description"=>"<div class=\"anli-ms text-left\"><p>3D打印带你“重返侏罗纪”</p><ul class=\"anli-msd\"><li><span class=\"cloud-btn\">最小精度</span>0.2 mm</li><li><span class=\"cloud-btn\">尺寸大小</span>40 cm</li><li><span class=\"cloud-btn\">使用材料</span>PLA塑料</li><li><span class=\"cloud-btn\">生产工艺</span>FDM(塑料熔融沉积)</li><li><span class=\"cloud-btn\">交工周期</span>4天</li></ul><a class=\"view_more cloud-btn\" href=\"/success/17.html\">查看详情 ▶ </a></div>"),
            array("url" => "", "image" => "../assets/front/shop/img/home/banner-slider/05169100000974070.jpg",
                  "title"=>"动卡模型",
                   "description"=>"<div class=\"anli-ms text-left\"><p>让梦想“印”进现实</p><ul class=\"anli-msd\"><li><span class=\"cloud-btn\">最小精度</span>0.05 mm</li><li><span class=\"cloud-btn\">尺寸大小</span>30 cm</li><li><span class=\"cloud-btn\">使用材料</span>进口光敏树脂</li><li><span class=\"cloud-btn\">生产工艺</span>SLA立体光刻</li><li><span class=\"cloud-btn\">交工周期</span>5天</li></ul><a class=\"view_more cloud-btn\" href=\"/success/6.html\">查看详情 ▶ </a></div>")

        )
    )
);
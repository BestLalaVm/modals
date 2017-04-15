<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:19 PM
 */

function printMenuClass($url)
{
   return trim(current_url(),"/")==trim(site_url($url),"/")?"active":"";
}
if(empty($siteName))
{
    $siteName="3dmodal-site";
}

?>
<div class="row-full head">
    <div class="row">
        <a href="<?=site_url("home/index");?>" class="logo2" style="float: left;">
            <img src="/assets/images/logo_model.png" style="width: 225px;">
        </a>
        <div class="nav" style="margin-left: -10px;">
            <?php foreach ($this->config->item("headerMenu", $siteName) as $item): ?>
                <div class="li <?=printMenuClass($item["url"]);?> ">
                    <a href="<?php echo($item["fullUrl"] ? $item["url"] : site_url($item["url"])); ?>" class="a"
                       name="n1"><?php echo $item["text"]; ?></a>
                    <div class="triangle"></div>
                </div>
            <?php endforeach; ?>

        </div>
        <!-- <form method="post" action="##" id="formsearch"> -->
        <form method="get" action="<?= site_url("home/advance"); ?>">
            <div class="nav-right">
                <div class="text-search">
                    <input class="icon-search" type="submit" value="">
                    <input type="text" class="input-search" value="<?php echo (array_key_exists("keyword",$_GET)?$_GET["keyword"]:"");?>" placeholder="关键字" name="keyword">
                </div>
                <!-- </form> -->
                <?php if(MyAuth::isLogin()):?>
                    <a href="<?=site_url("shop/profile/index");?>" style="margin-left: 10px;line-height: 40px;color: #fff;">
                        <?php echo MyAuth::getCurrentUser()->email;?>
                    </a>
                    <a href="<?=site_url("shop/account/logout")?>">退出</a>
                <?php else:?>
                    <a href="<?=site_url("shop/home/login");?>" class="login-btn" style="margin-left: 10px;">
                        登录/注册
                    </a>
                <?php endif;?>
            </div>
        </form>
    </div>
</div>

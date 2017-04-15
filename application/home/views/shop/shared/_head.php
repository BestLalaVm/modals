<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:13 PM
 */
function getmenuClass($url)
{
    if(current_url()==$url)
    {
        return "active";
    }

    return "";
}
?>
<div class="header clearfix">

    <!-- TOPBAR -->
    <div class="topBar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-sm hidden-xs">
                </div>
                <div class="col-md-6 col-xs-12">
                    <ul class="list-inline pull-right top-right">
                        <?php if (!MyAuth::isLogin()): ?>
                            <li class="account-login"><span><a data-toggle="modal" href='#login'>登入</a><small>或者</small><a
                                            data-toggle="modal" href='#signup'>注册新用户</a></span>
                            </li>
                            <?php else: ?>
                            <li class="account-login"><span><label class="user-title"><?php echo MyAuth::getCurrentUser()->email;?></label>
                                    <a data-toggle="modal" href='<?php echo site_url("shop/account/logout")?>'>退出</a></span>
                            </li>
                        <?php endif; ?>
                        <li class="searchBox">
                            <a href="#"><i class="fa fa-search"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                        <span class="input-group">
                            <?php echo form_open(site_url("home/advance"),array("method"=>"get"));?>
                          <input type="text" class="form-control" name="keyword" placeholder="关键字..." aria-describedby="basic-addon2">
                          <button type="submit" class="input-group-addon">搜索</button>
                            <?php echo form_close();?>
                        </span>
                                </li>
                            </ul>
                        </li>
                        <?php if(MyAuth::isLogin()):?>
                        <li class="dropdown cart-dropdown">
                            <?php echo $this->load->view("shop/shared/_shoppingCart",array(),true);?>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-main navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=site_url("shop/home/index")?>"><h2 style="font-weight: bold;"><img src="/assets/images/logo_model.png" style="width: 256px;"></h2></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown <?=getmenuClass(site_url("shop/home/index"));?>">
                        <a href="<?php echo site_url("shop/home/index"); ?>">首页</a>
                    </li>
                    <li class="dropdown megaDropMenu <?=getmenuClass(site_url("shop/modal/index"));?>">
                        <a href="<?php echo site_url("shop/modal/index"); ?>">云端模型</b></a>
                    </li>
                    <li class="dropdown <?=getmenuClass(site_url("shop/modal/cmindex"));?>">
                        <a href="<?php echo site_url("shop/modal/cmindex"); ?>">用户模型</a>
                    </li>
                    <li class="dropdown <?=getmenuClass(site_url("shop/help/index/introducation"));?>">
                        <a href="<?=site_url("shop/help/index/introducation");?>">用户指南</a>
                    </li>
                    <li class="dropdown <?=getmenuClass(site_url("shop/help/index/helpcenter"));?>">
                        <a href="<?=site_url("shop/help/index/helpcenter");?>">帮助中心</a>
                    </li>
                    <li class="dropdown <?=getmenuClass(site_url("home/index"));?>">
                        <a href="<?=site_url("home/index");?>">3D模型库</a>
                    </li>
                    <?php if(MyAuth::isLogin()):?>
                    <li class="dropdown <?=getmenuClass(site_url("shop/profile/index"));?>">
                        <a href="<?php echo site_url("shop/profile/index")?>">个人中心</a>

                    </li>
                    <?php endif;?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

</div>


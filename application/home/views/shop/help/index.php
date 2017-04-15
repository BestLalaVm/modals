<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                    <h2><?php echo $caption;?></h2>
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="<?=site_url("shop/home/index");?>">首页</a>
                    </li>
                    <li class="active"><?php echo $caption;?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="mainContent clearfix genricContent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2><?=$title;?></h2>
                <p><?php echo $content;?></p>
            </div>
        </div>
    </div>
</section>
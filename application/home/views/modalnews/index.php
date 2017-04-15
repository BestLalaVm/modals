<div class="container content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="section-box">
                <div class="section-nav">
                    <a href="<?=site_url("home/index");?>">首页</a>
                    &gt; <a href="#">模型新闻</a>
                </div>

                <?php foreach ($datas as $item):?>
                <div class="list-box clearfix">
                    <h1 class="text-overflow list-title">
                        <a href="<?=site_url("modalnews/detail")."/".$item->id; ?>"><?php echo $item->name;?></a>
                    </h1>
                    <div class="list-body justify"><?php echo $item->introducation;?></div>
                    <div class="grey14 " style="text-align: right;margin-top: 10px;">
                        <span class="glyphicon glyphicon-calendar"></span><?php echo (new DateTime($item->createdTime))->format("Y年m月d日");?>
                    </div>
                </div>
                <?php endforeach;?>
                <?php echo $this->load->view("shared/_pagination",array("url"=>"modalnews/index","pageIndex"=>$pageIndex,"pageSize"=>$pageSize,"totalCount"=>$totalCount),true);?>
            </div><!--section-box-->
        </div><!--col-md-9-->
    </div>
</div>
<div class="container content-body advance-list">
    <div class="col-md-12">
        <div class="section-box">
            <div class="section-nav">
                <a href="<?= site_url("home/index"); ?>">首页</a>
                &gt; <a href="#">全文检索</a>
            </div>
            <?php foreach ($datas as $item): ?>
                <div class="list-box clearfix <?php echo (!empty($item->modalId)?"modal-item":"news-item");?>">
                    <?php if (!empty($item->modalId)): ?>
                        <div class="col-sm-2">
                            <img style="max-width: 150px;max-height: 120px;" alt="灯罩"
                                 src="<?= $item->thumbImage; ?>">
                        </div>
                        <div class="col-sm-8">
                            <h1 class="text-overflow list-title">
                                <a href="<?= site_url("modal/detail/$item->id"); ?>"><?php echo $item->name; ?></a>
                            </h1>
                            <div class="list-body justify"><?php echo $item->modalIntroducation; ?></div>
                        </div>
                        <div class="col-sm-2">
                            <div class="control" style="margin-top: 16px;">
                                <?php if ($item->isDownloadable == 1 && !empty($item->attachment)): ?>
                                    <a class="btn btn-link" href="<?= $item->attachment; ?>" target="_blank">模型下载</a>
                                <?php else: ?>
                                    <span style="margin-left: 12px;">模型下载</span>
                                <?php endif; ?>
                            </div>
                            <div class="control">
                                <a class="btn btn-link"
                                   onclick="window.modalUtil.addAddWishList('<?php echo $item->id; ?>');">点击收藏</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <h1 class="text-overflow list-title">
                            <a href="<?= site_url("modalnews/detail/$item->id"); ?>"><?php echo $item->name; ?></a>
                        </h1>
                        <div class="list-body justify"><?php echo $item->introducation; ?></div>
                    <?php endif; ?>
                    <div class="grey14 " style="text-align: right;margin-top: 10px;">
                        <span class="glyphicon glyphicon-calendar"></span><?php echo (new DateTime($item->createdTime))->format("Y年m月d日"); ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php echo $this->load->view("shared/_pagination", array("url" => "home/advance".(array_key_exists("keyword",$_GET)?"?keyword=".$_GET["keyword"]:""), "pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), true); ?>
            <?php if(count($datas)==0):?>
                <div style="padding: 20px;">无任何数据!</div>
            <?php endif;?>
        </div><!--section-box-->
    </div><!--col-md-9-->

</div>
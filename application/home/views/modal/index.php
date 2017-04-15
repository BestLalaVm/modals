<div class="container content-body modal-list">
    <div class="col-md-12">
        <div class="section-box">
            <div class="section-nav">
                <a href="<?= site_url("home/index"); ?>">首页</a>
                &gt; <a href="#">3D模型列表</a>
            </div>
            <div class="filter-container">
                <?php echo form_open(site_url("modal/index"), array("method" => "get")); ?>
                <div class="control-group  col-md-2">
                    <label class="control-label col-md-4">采编人</label>
                    <div class="control col-md-8">
                        <input type="text" class="form-control" name="author" value="<?=(array_key_exists("author",$_GET)?$_GET["author"]:"");?>">
                    </div>
                </div>
                <div class="control-group  col-md-3">
                    <label class="control-label col-md-3">关键字</label>
                    <div class="control col-md-8">
                        <input type="text" class="form-control" name="keyword" value="<?=(array_key_exists("keyword",$_GET)?$_GET["keyword"]:"");?>">
                    </div>
                </div>
                <div class="control-group col-md-3">
                    <label class="control-label col-md-4">开始发布时间</label>
                    <div class="control col-md-7">
                        <input type="text" style="margin-left: 10px;" class="form-control datepicker" value="<?=(array_key_exists("dateFrom",$_GET)?$_GET["dateFrom"]:"");?>" data-date="<?=(array_key_exists("dateFrom",$_GET)?$_GET["dateFrom"]:"");?>" data-date-format="yyyy-mm-dd" name="dateFrom">
                    </div>
                </div>
                <div class="control-group col-md-4">
                    <label class="control-label col-md-3">结束发布时间</label>
                    <div class="control col-md-6">
                        <input type="text" style="margin-left: 10px;" class="form-control datepicker" value="<?=(array_key_exists("dateTo",$_GET)?$_GET["dateTo"]:"");?>" data-date="<?=(array_key_exists("dateTo",$_GET)?$_GET["dateTo"]:"");?>" data-date-format="yyyy-mm-dd" name="dateTo">

                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" style="margin-left: 2px;">搜索</button>
                    </div>

                </div>

                <?php echo form_close(); ?>
                <div class="clearfix"></div>
            </div>
            <?php foreach ($datas as $item): ?>
                <div class="list-box clearfix">
                    <div class="col-sm-2">
                        <img style="max-width: 150px;max-height: 120px;" alt="<?php echo $item->name;?>"
                             src="<?=$item->thumbImage;?>">
                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-overflow list-title">
                            <a href="<?= site_url("modal/detail") . "/" . $item->id; ?>"><?php echo $item->name; ?></a>
                        </h1>
                        <div class="list-body justify"><?php echo $item->introducation; ?></div>
                        <div class="grey14 ">
                            <?php if(!empty($item->author)):?>
                            <span>采编人: <?=$item->author; ?></span>
                            <?php endif;?>
                        </div>
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
                            <a class="btn btn-link" onclick="window.modalUtil.addAddWishList('<?php echo $item->id; ?>');">点击收藏</a>
                        </div>
                        <div class="grey14 time">
                            <span class="glyphicon glyphicon-calendar"></span><?php echo (new DateTime($item->createdTime))->format("Y年m月d日"); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php echo $this->load->view("shared/_pagination", array("url" => "modal/index?".$queryString, "pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), true); ?>
        </div><!--section-box-->
    </div><!--col-md-9-->
</div>
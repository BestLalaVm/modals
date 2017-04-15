<?php
$relativeTagIds = array();
foreach ($data["tags"] as $tagItem) {
    $relativeTagIds[] = $tagItem["id"];
}
?>

<div class="container content-body modal-detail" style="padding-top: 10px;">
    <div class="section-nav" style="border-width:0px; padding-top: 0px;">
        <a href="<?=site_url("home/index");?>">首页</a>
        &gt; <a href="#">3D模型列表</a>
    </div>
    <div class="col-sm-9">
        <div class="modal-container modal-clear">
            <div class="col-sm-8 left-content">
                <?php if ($data["shownType"] == "html"): ?>
                    <div class="control-group shown-content">
                        <?php echo $data["shownDescription"];?>
                    </div>
                <?php else: ?>
                    <?php if ($data["shownType"] == "vedio"): ?>
                        <video src="<?=$data["shownVedio"];?>" controls="controls" class="vjs-tech media-left"
                               style="width: 489px;height: 400px;border: 1px solid #ddd;margin-right: 10px;">
                            您的浏览器不之处视频播放
                        </video>
                    <?php else: ?>
                    <div class="control-group image-slider">
                        <?=$this->load->view("modal/_imageslider", array(), true);?>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-4">
                <div class="control-group panel panel-default" style="margin-bottom: 0px;">
                    <div class="panel-heading">
                        <h2 class="top-title control-group"><?php echo $data["name"] ?></h2>
                    </div>
                    <div class="panel-body modal-detail-block">
                        <div class="control-group">
                            <label>模型大小:</label><span><?php echo $data["attachmentSize"]; ?> k</span>
                        </div>
                        <div class="control-group">
                            <label>分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类:</label><span><?php echo $data["categoryName"]; ?></span>
                        </div>
                        <div class="control-group">
                            <label>适合材料:</label>
                            <span>
                            <?php foreach ($data["meterials"] as $mitem): ?>
                                <?php echo $mitem["name"] ?>&nbsp;
                            <?php endforeach; ?>
                            </span>
                        </div>
                        <div class="control-group" style="margin-top: 46px;">
                            <?php if ($data["isDownloadable"] == 1): ?>
                                <a class="btn btn-primary" href="<?php echo $data["attachment"]; ?>" target="_blank"
                                   style="width: 180px;height: 54px; line-height: 36px;">免费下载</a>
                            <?php else: ?>
                                <button class="btn btn-disabled" disabled="disabled" style="width: 180px;height: 60px;">
                                    免费下载
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="control-group" style="margin-top: 30px;"></div>

                        <div class="control-group" style="margin-top: 38px;margin-bottom: 54px;">
                            <div>
                                <?php if (empty($data["wishId"])): ?>
                                    <a class="btn btn-link" href="#"
                                       onclick="window.modalUtil.addAddWishList('<?php echo $data["id"]; ?>');">
                                        <img src="http://static.3deazer.com/images/model_index/gd11_1.png">
                                        <span>收藏</span>
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-link" href="#">
                                        <span>己收藏</span>
                                    </a>
                                <?php endif; ?>
                                <a class="btn btn-link" href="<?= site_url("shop/modal/detail") . "/{$data["id"]}" ?>">
                                    <span>一键报价</span>
                                </a>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 22px;">
                <label>热门标签:</label>
                <div class="tags" style="display: inline-block;">
                    <?php foreach ($data["tags"] as $tagItem): ?>
                        <span class="tag label label-primary"><?php echo $tagItem["name"]; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <div class="modal-container modal-block">
            <div class="col-sm-12 modal-title">
                <strong>模型简介</strong>
            </div>
            <div class="col-sm-12 modal-description">
                <?php echo $data["description"]; ?>
            </div>
            <div style="clear: left;"></div>
        </div>

        <div class="modal-container modal-block">
            <div class="col-sm-12 news modal-title">
                <strong>相关新闻</strong>
            </div>
            <?php echo $this->load->view("modalnews/_relativemodalnews", array("tags" => $relativeTagIds), true); ?>
            <div style="clear: left;"></div>
        </div>
    </div>
    <div class="col-sm-3">
        <div><h1 style="font-size: 28px;">相关模型</h1></div>
        <div class="relative" style="margin-top: 20px; border-top: 1px solid #ddd; padding-top: 10px;">
            <?php echo $this->load->view("modal/_relativeModals", array("tags" => $relativeTagIds, "excludeModalId" => $data["id"]), true); ?>
        </div>
    </div>
    <div class="row" style="display: none;">
        <div class="section-box">
            <div class="section-nav">
                <a href="/">首页</a>
                &gt; <a href="<?= site_url("modalnews/index") ?>">模型新闻</a> &gt;
                <a href="#"><?php echo "新闻详细"; ?></a></div>

            <div class="section-title">
                <h1 class="content_c_title text-center"><?php echo $data["name"]; ?></h1>
            </div>

            <div class="section-info">
                <p>
                </p>
                <div class="grey14">
                    <span class="glyphicon glyphicon-calendar"></span><?php echo (new DateTime($data["createdTime"]))->format("Y年m月d日"); ?>
                </div>
                <p></p>
            </div>
            <div class="section-body justify">
                <?php echo $data["description"]; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
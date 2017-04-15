<div class="container content-body modal-detail">
    <div class="col-sm-9">
        <div class="modal-container modal-clear">
            <div class="col-sm-8">
                <div class="control-group">
                    <img src="<?php echo $data["image"] ?>" style="max-width: 526px;max-height: 395px;">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="control-group panel panel-default">
                    <div class="panel-heading">
                        <h2 class="top-title control-group"><?php echo $data["name"] ?></h2>
                    </div>
                    <div class="panel-body modal-detail-block" style="margin-top: 20px; margin-bottom: 20px;">
                        <div class="control-group">
                            <label>模型大小:</label><span>5227k</span>
                        </div>
                        <div class="control-group">
                            <label>分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类:</label><span>5227k</span>
                        </div>
                        <div class="control-group">
                            <label>适合材料:</label><span>5227k</span>
                        </div>
                        <div class="control-group" style="margin-top: 46px;">
                            <button class="btn btn-primary" style="width: 180px;height: 60px;">免费下载</button>
                        </div>
                        <div class="control-group" style="margin-top: 30px;"></div>
                        <div class="control-group" style="margin-top: 38px;">
                            <button class="btn btn-primary" style="width: 80px;">一键报价</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-primary" style="width: 76px;">打印</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-8">
                <div class="image-container">
                    <img src="<?php echo $data["image"] ?>" style="max-width: 107px;max-height: 80px;">
                    <img src="<?php echo $data["image"] ?>" style="max-width: 107px;max-height: 80px;">
                    <img src="<?php echo $data["image"] ?>" style="max-width: 107px;max-height: 80px;">
                    <img src="<?php echo $data["image"] ?>" style="max-width: 107px;max-height: 80px;">
                </div>
            </div>
            <div class="col-sm-4" style="padding-top: 20px;">
                <button class="btn btn-primary" style="width: 80px;">收藏</button>
                <button class="btn btn-primary" style="width: 76px;">下载</button>
            </div>
            <div class="col-sm-12" style="margin-top: 22px;">
                <label>热门标签:</label>
                <div class="tags" style="display: inline-block;">
                    <span class="tag label label-primary">asdsad</span>
                    <span class="tag label label-primary">1234</span>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <div class="modal-container modal-block">
            <div class="col-sm-12 modal-description-title">
                <strong>模型简介</strong>
            </div>
            <div class="col-sm-12 modal-description">
                <?php echo $data["description"]; ?>
            </div>
            <div style="clear: left;"></div>
        </div>

        <div class="modal-container modal-block">
            <div class="col-sm-12 news">
                <strong>相关新闻</strong>
            </div>
            <div style="clear: left;"></div>
        </div>
    </div>
    <div class="col-sm-3">
        <div style="text-align: center;"><h1 style="font-size: 28px;">相关模型</h1></div>
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

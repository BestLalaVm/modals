<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:33 PM
 */
$homeitems = $this->config->item("home", "3dmodal-site");
$secordBlocks = $homeitems["secondbanner"];
?>
<div class="list_first">
    <div class="list_top">
        <div class="tuijian"><a href="#"><?php echo $secordBlocks["title"]; ?></a></div>
        <p class="model_zong"><?php echo $secordBlocks["tip"]; ?></p>
    </div>

    <div id="tdown_1120" class="main_list">
        <!-- 输出推荐模型开始 -->
        <?php foreach ($secondmodals as $item): ?>
            <div class="one_main" id="<?=$item["id"]?>">
                <a href="<?= site_url("modal/detail") . "/" . $item["id"]; ?>">
                    <img width="226px" height="168px" alt="<?php echo $item["name"]; ?>"
                         src="<?php echo $item["thumbImage"]; ?>">
                    <p class="main_p1"><?php echo $item["name"]; ?></p>
                    <div class="hover_bg"></div>
                </a>
                <div class="main_btn">
                    <div class="main_down <?= ($item["isDownloadable"] != 1) ? 'undownloadable' : '' ?>">
                        <?php if ($item["isDownloadable"] != 1): ?>
                            模型下载
                        <?php else: ?>
                            <a href="<?= $item["attachment"] ?>" target="_blank">模型下载</a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($item["wishId"])): ?>
                        <div class="main_shou-ex">已收藏</div>
                        <?php else: ?>
                        <div class="main_shou">
                            <a href="#"
                                                  onclick="window.modalUtil.addAddWishList('<?= $item["id"] ?>',function(){ $('#<?=$item["id"]?> .main_shou').html('已收藏').removeClass('main_shou').addClass('main_shou-ex');})" >收藏</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- 输出推荐模型结束 -->
    </div>
</div>
